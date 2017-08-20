<?php  defined('BASEPATH') OR exit('No direct script access allowed');


/**
* Controller : Sign
* Param : Username , Password
* author : masbott
*/
class Sign extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	function index() {
		$this->load->view( 'sign/index' );
	}

	function check_sign() {
		$this->load->model( 'm_sign' , 'sign' );
		$username = $this->input->post('uname');
		$password = $this->input->post('upass');

		$check = $this->sign->check_sign( $username , $password );

		if ( $check == TRUE ) {
			$getdata = $this->sign->sign->getdata_sign( $username , $password );
			if ( $getdata != FALSE ) {
				$this->session->set_userdata($getdata);
				$this->session->set_userdata("sign",true);
				redirect('beranda');
			}
		} else {
			//if not available on db
			$this->session->set_flashdata( 'failed', 'Username atau password Anda salah.');
			redirect( 'sign/index' );
		}
	}

	function out() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('sign');
		$this->session->sess_destroy();
		redirect('sign/index');
	}

}