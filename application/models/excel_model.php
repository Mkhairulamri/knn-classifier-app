<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {

public function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

// Listing
    public function listing() {
    $this->db->select('*');
    $this->db->from('mst_batita');
    $query = $this->db->get();
    return $query->result();
    }

    public function insert($data){
		$insert = $this->db->insert_batch('mst_batita', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('data_latih')->result_array();
	}

	public function penghitungan(){
		$this->db->where('id',1);
		return $this->db->get('hasil_penghitungan');
	}

	function update_akurasi($data){
		$this->db->where('id',1);
		return $this->db->update('hasil_penghitungan',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
