<?php
    class User_model extends CI_Model 
    {
        public function ambil_data($id){
                    //memanggil username dari database
                    $this->db->where('username',$id);
                    //mengambil data dari tabel user
                    return $this->db->get('user')->row();
        }

        function ambil_id($id){
            
            $this->db->select('*');
            $this->db->from('user','user.id');
            $this->db->where('user.id', $id);      
            $query = $this->db->get();
            return $query;
         }

        public function getdatauser($where=""){
            $data = $this->db->query('select * from user'.$where);
            return $data->result_array();
        }

        public function tampil_data()
        {
            // memanggil usename dari database
            $this->db->order_by('username','ASC');

             return $this->db->get('user');
        }

        public function input_data($data)
        {
            // insert data ke tabel jurusan
             $this->db->insert('user',$data);
        }
        public function edit_data($where,$table)
            {
        // untuk menampilkan data dari tabel text, karena datanya sudah di input sebelumnya
            return $this->db->get_where($table,$where);
            }
        public function update_data($where,$data,$table)
            {
            $this->db->where($where);
            $this->db->update($table,$data);
            }
            public function hapus_data($where,$table)
            {
            $this->db->where($where);
            $this->db->delete($table);
            }
    }
    