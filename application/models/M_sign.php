<?php 


/**
* controller : M_sign
* param : password , username
* author : masbott
*/
class M_sign extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function check_sign( $username , $password ) {
		$check = $this->db->get_where( 'pengguna' , array('username' => $username , 'password' => md5( $password ) ) );

		if ( $check->num_rows() > 0 ) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	function getdata_sign( $username , $password ) {
		$get = $this->db->get_where( 'pengguna' , array('username' => $username , 'password' => md5($password)  ) );
		$data_sess = array();
		if ( $get->num_rows()  == 1 ) {
			$data_sess = array( 
								'username' => $get->row()->username ,  
								'kategori_pengguna' => $get->row()->id_kat_pengguna,
								'prodi' => $get->row()->prodi 
							);
			return  $data_sess;
		} else {
			return $data_sess;
		}
	}

}