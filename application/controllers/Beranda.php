<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
* controller : Beranda
* parameter : prodi
* author : masbott
*/
class Beranda extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index() {
		//print_r($this->session->all_userdata());exit();
		$this->data['content'] = 'beranda/index';
		$this->load->view( 'layout/index' , $this->data );
	}
}