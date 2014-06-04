<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


$CI =& get_instance();
$CI->load->database();




class Feed_model extends CI_Model{ 

	var $ID   = '';
	var $URL   = '';
	var $TITLE   = '';	 
    var $LINK   = '';
	var $DESCRIPTION   = '';
	var $LANGUAGE  = '';	
	var $PUBDATE = '';
    var $LASTBUILDDATE = '';
	var $LANGUAGECODE = '';
	var $COPYRIGHT = '';
	var $IMAGE_URL = '';
	var $IMAGE_TITLE = '';
	var $IMAGE_LINK = '';
	var $ITEMS = '';	
	
		
	
    function __construct(){

    }
	
	
    function getFEEDbyURL($url=''){ 
		if($url!=''){  $this->URL=$url;  } else{ return false; }
		
		$url=$this->URL;
		//action for subitmes in database (0 insert, 1 update, 2 none)
		$subItemsAction=2;
		//check if the file is in cache.
		$sql = "SELECT * FROM feed WHERE LINK='".$url."' ";
		$query = $this->db->query($sql);

			//If there's a file in cache
			if ( ($query->num_rows() > 0)  ){
				
				$row=$query->result_array();

				//checK cache life
				$cache_life = '900';
				$filemtime = @filemtime("cache/feed_results_".$row[0]['ID'].".json");
				// If file is more than 15 minutes old, reload cache
				if (time() - $filemtime >= $cache_life){ 
					
					$feed_content = simplexml_load_file($url, "SimpleXMLElement", LIBXML_NOCDATA); 
					//Feed to JSON
					$json_content = json_encode($feed_content, true); 			
					$array = json_decode($json_content, true); 							
					
					
					$filepath="cache/feed_results_".$row[0]['ID'].".json";
					$file = fopen($filepath, 'w');
					fwrite($file, $json_content);
					fclose($file);		
					
					$this->ID=$row[0]['ID'];
					$subItemsAction=1;
				}
				// If file is less than 15 minutes old, use cached file
				else{ 
					$json_content = file_get_contents("cache/feed_results_".$row[0]['ID'].".json");
	
					$array = json_decode($json_content, true);
					$this->ID=$row[0]['ID'];
					$subItemsAction=2;
				}
				
				
				
			}

			//If there's no file in cache
			else{  

				

				$feed_content = simplexml_load_file($url, "SimpleXMLElement", LIBXML_NOCDATA); 
				//Feed to JSON
				$json_content = json_encode($feed_content, true); 			
				$array = json_decode($json_content, true); 		
				//$feed_content = utf8_encode($feed_content);
				
				$sql = "INSERT INTO feed (LINK) VALUES ('".$url."');";
				$query = $this->db->query($sql);

				//The auto increment ID is part of the filename
				$id=mysql_insert_id();
				$this->ID=$id;
				$filepath="cache/feed_results_".$id.".json";
				$file = fopen($filepath, 'w');
				fwrite($file, $json_content);
				fclose($file);		
				
				//$this->$id;
				$subItemsAction=0;
			}
			

		
		//print_r($array);
		if(isset($array['channel']['title'])){ $this->TITLE=$array['channel']['title']; }
		if(isset($array['channel']['link'])){  $this->LINK =$array['channel']['link']; }	
		if(isset($array['channel']['description'])){  $this->DESCRIPTION =$array['channel']['description']; }	
		if(isset($array['channel']['language'])){  $this->LANGUAGE =$array['channel']['language']; }	
		if(isset($array['channel']['lastBuildDate'])){  $this->LASTBUILDDATE =$array['channel']['lastBuildDate']; }			
		if(isset($array['channel']['copyright'])){  $this->COPYRIGHT =$array['channel']['copyright']; }	
		if(isset($array['channel']['image']['url'])){  $this->IMAGE_URL =$array['channel']['image']['url']; }			
		if(isset($array['channel']['image']['title'])){  $this->IMAGE_TITLE =$array['channel']['image']['title']; }	
		if(isset($array['channel']['image']['link'])){  $this->IMAGE_LINK =$array['channel']['image']['link']; }			


		$order=0;
		$this->ITEMS = array();
		
		
		$fin = count($array['channel']['item']);
		for($i = 0; $i < $fin; $i++)	{	
			
		
			if (isset($array['channel']['item'][$i]['title'])){ $title=$array['channel']['item'][$i]['title'];  } else($title='');
			if (isset($array['channel']['item'][$i]['description'])){ $description= $array['channel']['item'][$i]['description'];  } else($description='');
			if (isset($array['channel']['item'][$i]['link'])){ $link=$array['channel']['item'][$i]['link'];  } else($link='');
			if (isset($array['channel']['item'][$i]['guid'])){ $guid=$array['channel']['item'][$i]['guid'];  } else($guid='');
			if (isset($array['channel']['item'][$i]['pubDate'])){ $pubDate=$array['channel']['item'][$i]['pubDate'];  } else($pubDate='');
			if (isset($array['channel']['item'][$i]['author'])){ $author=$array['channel']['item'][$i]['author'];  } else($author='');
			if (isset($array['channel']['item'][$i]['media_thumbnail1'])){ $media_thumbnail1=$array['channel']['item'][$i]['media_thumbnail1'];  } else($media_thumbnail1='');
			if (isset($array['channel']['item'][$i]['media_thumbnail2'])){ $media_thumbnail2=$array['channel']['item'][$i]['media_thumbnail2'];  } else($media_thumbnail2='');
			if (isset($array['channel']['item'][$i]['media_content'])){ $media_content=$array['channel']['item'][$i]['media_content'];  } else($media_content='');
			if (isset($array['channel']['item'][$i]['media_category'])){ $media_category=$array['channel']['item'][$i]['media_category'];  } else($media_category='');
			if (isset($array['channel']['item'][$i]['last_buid_date'])){ $last_buid_date=$array['channel']['item'][$i]['last_buid_date'];  } else($last_buid_date='');
			$FEEDNAME=$array['channel']['title'];		
			
			
			
			$this->ITEMS[$i]=new Feed_item_model($this->ID,$title,$description,$link,$guid,$pubDate,$author,$media_thumbnail1,$media_thumbnail2,$media_content,$media_category,$i,$last_buid_date,$FEEDNAME );
			if($subItemsAction==0){
				$this->ITEMS[$i]->insertDatabase(); 
			}		
			if($subItemsAction==1){
				$this->ITEMS[$i]->updateDatabase(); 
			}	
		}
		


    }
	
	
    function get_URL(){
		echo($this->URL); 
	}
}

 


?>