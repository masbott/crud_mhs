<?php 

/**
* 
*/
class Mahasiswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ( $this->session->userdata('sign') != TRUE  ) {
			redirect( 'sign' );
		}
	}

	function index() {
		$this->data['content'] = 'mahasiswa/index';
		$this->load->view( 'layout/index', $this->data );
	}

	function add() {
		if ( $this->input->post('tambah') ) {
			$insert = array(
							'nim' 		=> $this->input->post('nim'),
							'nama'		=> $this->input->post('nama'),
							'alamat'	=> $this->input->post('alamat'),
							'prodi'		=> $this->session->userdata('prodi')
							);
			$this->db->insert( 'mhs', $insert);
			$this->session->set_flashdata( 'success', 'Berhasil menginputkan data.');
			redirect( 'mahasiswa/index' );
		}

		$this->data['content'] = 'mahasiswa/add';
		$this->load->view( 'layout/index', $this->data );
	}

	function list() {
		$this->load->model( 'm_mhs' , 'mhs' );
		$prodi = $this->session->userdata('prodi');
		$list = $this->mhs->get_datatables( $prodi );
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $mahasiswas) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $mahasiswas->nim;
			$row[] = $mahasiswas->nama;
			$row[] = $mahasiswas->alamat;
			$row[] = '<a href="'.site_url('mahasiswa/updated/'.$mahasiswas->nim).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a> <a href="'.site_url('mahasiswa/deleted/'.$mahasiswas->nim).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhs->count_all( $prodi ),
						"recordsFiltered" => $this->mhs->count_filtered( $prodi ),
						"data" => $data,
				);
		echo json_encode($output);
	}

	function deleted( $id ) {
		if ( $id != '' ) {
			$this->db->where( 'mhs.nim', $id)->delete( 'mhs' );
			$this->session->set_flashdata( 'success', 'Berhasil menghapus data.');
			redirect( 'mahasiswa/index' );
		}
	}

	function updated( $id ) {
		if ( $id != '' ) {
			$this->data['getone'] = $this->db->get_where( 'mhs' , array( 'nim' => $id , 'prodi' => $this->session->userdata('prodi') ) );
		}

		if ( $this->input->post('edit') ) {
			$u = array(	
						'nim' 		=> $this->input->post('nim'),
						'nama' 		=> $this->input->post('nama'),
						'alamat' 	=> $this->input->post('alamat')
						);
			$this->db->where( 'mhs.nim', $id )->update( 'mhs' , $u );
			$this->session->set_flashdata( 'success', 'Berhasil mengubah data.');
			redirect( 'mahasiswa/index' );
		}
		

	$this->data['content'] = 'mahasiswa/edit';
	$this->load->view( 'layout/index' , $this->data );
	}
}