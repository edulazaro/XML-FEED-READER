<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




$CI =& get_instance();
$CI->load->database();



class Feed_item_model extends CI_Model{

	var $FEEDID = 0;
	var $TITLE  = '';	
	var $DESCRIPTION  = '';	
	var $LINK  = '';	
	var $GUID  = '';	
	var $PUBDATE  = '';
	var $AUTHOR  = '';		
	var $MEDIA_THUMBNAIL1  = '';	
	var $MEDIA_THUMBNAIL2  = '';	
	var $MEDIA_CONTENT  = '';	
	var $MEDIA_CATEGORY  = '';		
	var $ORDEN = 0;		
	var $LASTBUILDDATE = '';		

    function __construct($feedid=0,$title='',$description='',$link='',$guid='',$pubDate='',$author='',$media_thumbnail1='',$media_thumbnail2='',$media_content='',$media_category='',$orden=0,$last_buid_date='',$FEEDNAME=''){
		$this->ORDEN=$orden;	
		$this->FEEDID=$feedid;	
		$this->TITLE=$title;
		$this->DESCRIPTION=$description;
		$this->LINK=$link;
		$this->GUID=$guid;
		$this->PUBDATE=$pubDate;
		$this->AUTHOR=$author;
		$this->MEDIA_THUMBNAIL1=$media_thumbnail1;
		$this->MEDIA_THUMBNAIL2=$media_thumbnail2;
		$this->MEDIA_CONTENT=$media_content;
		$this->MEDIA_CATEGORY =$media_category;
		$this->LASTBUILDDATE =$last_buid_date;		
		$this->FEEDNAME =$FEEDNAME;		
			
    }
	
    function insertDatabase(){ 
		$sql = "INSERT INTO feeditem (FEEDID,TITLE,DESCRIPTION,LINK,GUID,PUBDATE,AUTHOR,MEDIA_THUMBNAIL1,MEDIA_THUMBNAIL2,MEDIA_CONTENT,MEDIA_CATEGORY,NUM,LASTBUILDDATE,FEEDNAME) VALUES ('".$this->FEEDID."','".mysql_real_escape_string($this->TITLE)."','".mysql_real_escape_string($this->DESCRIPTION)."','".$this->LINK."','".$this->GUID."','".$this->PUBDATE."','".mysql_real_escape_string($this->AUTHOR)."','".$this->MEDIA_THUMBNAIL1."','".$this->MEDIA_THUMBNAIL2."','".$this->MEDIA_CONTENT."','".$this->MEDIA_CATEGORY."','".$this->ORDEN."','".$this->LASTBUILDDATE."','".$this->FEEDNAME."');";		
		$query = $this->db->query($sql);
	}	
    function updateDatabase(){ 

		$sql = "DELETE FROM feeditem WHERE (FEEDID='".$this->FEEDID."' AND NUM='".$this->ORDEN."')";		
		$query = $this->db->query($sql);
		$sql = "INSERT INTO feeditem (FEEDID,`TITLE`,`DESCRIPTION`,LINK,GUID,PUBDATE,AUTHOR,`MEDIA_THUMBNAIL1`,`MEDIA_THUMBNAIL2`,`MEDIA_CONTENT`,`MEDIA_CATEGORY`,NUM,LASTBUILDDATE,FEEDNAME) VALUES ('".$this->FEEDID."','".mysql_real_escape_string($this->TITLE)."','".mysql_real_escape_string($this->DESCRIPTION)."','".$this->LINK."','".$this->GUID."','".$this->PUBDATE."','".$this->AUTHOR."','".mysql_real_escape_string($this->MEDIA_THUMBNAIL1)."','".mysql_real_escape_string($this->MEDIA_THUMBNAIL2)."','".$this->MEDIA_CONTENT."','".$this->MEDIA_CATEGORY."','".$this->ORDEN."','".$this->LASTBUILDDATE."','".$this->FEEDNAME."');";	
		$query = $this->db->query($sql);		

	}	
	function getTitle(){
		return($this->TITLE);
	}
	
	function getItem($parent,$order){

		$sql = "SELECT * FROM feeditem WHERE FEEDID='".$parent."' AND NUM='".$order."' ";
		$query = $this->db->query($sql);		
		if ( ($query->num_rows() > 0)  ){
			$rows=$query->result_array(); $row=$rows[0];
		
			$this->ID=$row['ID'];		
			$this->ORDEN=$row['NUM'];	
			$this->FEEDID=$row['FEEDID'];	
			$this->TITLE=$row['TITLE'];
			$this->DESCRIPTION=$row['DESCRIPTION'];
			$this->LINK=$row['LINK'];
			$this->GUID=$row['GUID'];
			$this->PUBDATE=$row['PUBDATE'];
			$this->AUTHOR=$row['AUTHOR'];
			$this->MEDIA_THUMBNAIL1=$row['MEDIA_THUMBNAIL1'];
			$this->MEDIA_THUMBNAIL2=$row['MEDIA_THUMBNAIL2'];
			$this->MEDIA_CONTENT=$row['MEDIA_CONTENT'];
			$this->MEDIA_CATEGORY =$row['MEDIA_CATEGORY']; 
			$this->LASTBUILDATE =$row['LASTBUILDDATE']; 
			$this->FEEDNAME =$row['FEEDNAME']; 			
		}
	
	}	
	
	
	public function getNumElementsParent($parent){	
	
		$sql="SELECT COUNT(ID) as value FROM feeditem WHERE FEEDID='".$parent."'";
		$query = $this->db->query($sql);
		$rows=$query->result_array(); 
		$row=$rows[0];  return($row['value']);
	

	}	


}


?>