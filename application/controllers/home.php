<?php

class Home extends MX_Controller {

	public function view($var1 = null, $var2 = null){

		
		
		$data['language']="en";
		$data['title']="XML FEED READER";
		$data['description']="Just a PHP example with codeigniter";
		
		
		//include header
		$this->load->view('templates/header', $data);
		
		//include page
		$this->load->view('home', $data); 
		
		//include footer
		$this->load->view('templates/footer', $data);

	}
}