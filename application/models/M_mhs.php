<?php 


/**
* 
*/
class M_mhs extends CI_Model
{

	var $table = 'mhs';
	var $column_order = array(null, 'nim','nama','alamat');
	var $column_search = array('nim','nama','alamat');
	var $order = array('id' => 'asc');
	
	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query( $prodi ) {
		$this->db->from($this->table);
		$this->db->where($this->table.'.prodi',$prodi);
		$i = 0;
	
		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {
				if($i===0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) $this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}  else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables( $prodi ) {
		$this->_get_datatables_query( $prodi );
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered( $prodi ) {
		$this->_get_datatables_query( $prodi );
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all( $prodi ) {
		$this->db->from($this->table);
		$this->db->where('prodi' , $prodi );
		return $this->db->count_all_results();
	}


}