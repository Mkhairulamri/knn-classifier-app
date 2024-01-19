<?php

	class LatihModel extends CI_Model{
		
		public function getAll(){
			$this->db->where('tipe','Latih');
			return $this->db->get('mst_batita');
		}

		public function countData(){
			$this->db->where('tipe','Latih');
			return $this->db->count_all('mst_batita');
		}

		public function insert($data){
			return $this->db->insert('mst_batita',$data);
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

		public function insert_batch($data){
			return $this->db->insert_batch('mst_batita',$data);
		}

		public function deleteAll(){
			$this->db->where('tipe','Latih');
			return $this->db->delete('mst_batita');
		}
	}

?>
