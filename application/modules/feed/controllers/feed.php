<?php



class feed extends MX_Controller {


	public function listTitles($url=null){
		
		$this->load->database();
		$this->load->model('Feed_model');
		$this->load->model('Feed_item_model');

		$data=$this->Feed_model->getFEEDbyURL($url);
		
		$data['title']=$this->Feed_model->TITLE;
		$data['id']=$this->Feed_model->ID;
		foreach($this->Feed_model->ITEMS as &$item){
			$data['items'][$item->ORDEN]['title']=$item->TITLE; 
			$data['items'][$item->ORDEN]['link']=$item->LINK; 
			$data['items'][$item->ORDEN]['parent']=$item->FEEDID; 
			$data['items'][$item->ORDEN]['orden']=$item->ORDEN; 
		}
		
		//Load view
		$this->load->view('feedList', $data); 
	}	

	public function viewItem($var1,$var2){
	
		$this->load->database();
		$this->load->model('Feed_model');
		$this->load->model('Feed_item_model');	
	
		$Aitem= new Feed_item_model();
		$Aitem->getItem($var1,$var2);

		$data['ID']=$Aitem->ID; 
		$data['ORDER']=$Aitem->ORDEN;
		$data['FEEDID']=$Aitem->FEEDID;
		$data['TITLE']=$Aitem->TITLE;
		$data['DESCRIPTION']=$Aitem->DESCRIPTION;
		$data['LINK']=$Aitem->LINK;
		$data['GUID']=$Aitem->GUID;
		$data['PUBDATE']=$Aitem->PUBDATE;
		$data['MEDIA_THUMBNAIL1']=$Aitem->MEDIA_THUMBNAIL1;
		$data['MEDIA_THUMBNAIL2']=$Aitem->MEDIA_THUMBNAIL2;
		$data['MEDIA_CONTENT']=$Aitem->MEDIA_CONTENT;
		$data['MEDIA_CATEGORY']=$Aitem->MEDIA_CATEGORY;
		$data['LASTBUILDDATE']=$Aitem->LASTBUILDATE;
		$data['FEEDNAME']=$Aitem->FEEDNAME;		
		$data['numrows']=$Aitem->getNumElementsParent($var1);


		$this->load->view('item', $data);		

	}
	

	
}

