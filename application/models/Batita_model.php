<?php
class Batita_model extends CI_Model
{

	function getDataBatita()
	{
		$query = $this->db->get('mst_batita');
		return $query;
	}
	
	function getDataUji()
	{
		$this->db->where('tipe','Uji');
		$query = $this->db->get('mst_batita');
		return $query;
	}

	function getDataLaporan(){
		$this->db->where('tipe', 'Uji');
		$this->db->where('terdekat !=',0);
		$query = $this->db->get('mst_batita');
		return $query;
	}

	function countLaporan(){
		$this->db->from('mst_batita');
		$this->db->where('tipe', 'Uji');
		$this->db->where('usia_diagnosa IS NULL', null, false);

		$count = $this->db->count_all_results();
		return $count;
	}

	function getBatitaKlasifikasi(){
		$this->db->where('tipe', 'Uji');
		$this->db->where('terdekat',0);

		$count = $this->db->get('mst_batita');
		return $count;
	}

	public function getAllData()
	{
		return $this->db->get('mst_batita');
	}

	public function insert($data)
	{
		return $this->db->insert('mst_batita', $data);
	}

	public function get($id){
		$this->db->select('*');
		$this->db->from('mst_batita');
		$this->db->where('id',$id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function update($data, $id){
		$this->db->where('id',$id);
		$query = $this->db->update('mst_batita',$data);
		return $query;
	}

	public function delete($id){
		$this->db->where('id',$id);
		$query = $this->db->delete('mst_batita');
		return $query;
	}


	public function search($keyword)
	{
		$this->db->select('*');
		$this->db->from('mst_batita'); 
		$this->db->like('nama', $keyword);
		return $this->db->get()->result();
	}

	public function cari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from mst_batita where nama like '%$cari%' ");
		return $data->result();
	}

	public function reset()
	{
		$this->db->where('tipe','Uji');
		$query = $this->db->delete('mst_batita');
		return $query;
	}

}
