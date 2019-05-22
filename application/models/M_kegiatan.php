<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_Kegiatan extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function addDataKegiatan(){
            // menangkap variabel post
            $tabel = $this->input->post('tabel');
            $username = $this->input->post('username');

            // mengambil data user dari tabel user 
            $this->db->where('username',$username);
            $hasil=$this->db->get('user');
            // menjadikan data user sebagai array
            $row = $hasil->row_array();
            
            // mengurai data array
            $data=[
                'username' => $row['username'],
                'email' => $row['email'],
                'no_telp' => $row['no_telp']
            ];
            
            // mencari data user dari tabel $tabel
            $this->db->where('username',$username);
            $hasil2=$this->db->get($tabel);
            
            // mengecek data user pada tabel $tabel
            if($hasil2->num_rows() <= 0){
                // jika data belum ada, maka data user diinsert ke dalam tabel $tabel
                $this->db->insert($tabel,$data);
            }else{
                // jika data sudah ada, maka data user diupdate
                $this->db->where('username',$username);
                $this->db->update($tabel,$data);
            }
        }

        public function addDataUserEvent(){

            $data=[
                'id_user'=> $this->input->post('id_user'),
                'id_kegiatan'=> $this->input->post('id_kegiatan')
            ];

            $this->db->where('id_user', $id_user);
            $this->db->where('id_kegiatan', $id_kegiatan);
            $res=$this->db->get('relasi');

            if($res->num_rows() <= 0){
                $this->db->insert('relasi',$data);
            }else{
                $this->db->where('id_user', $id_user);
                $this->db->where('id_kegiatan', $id_kegiatan);
                $this->db->update('relasi',$data);
            }
        }

        public function getAllData($id_user){

            $query = $this->db->query(
                "SELECT k.id_kegiatan,k.nama_kegiatan,k.waktu_kegiatan 
                FROM kegiatan k, relasi r 
                WHERE r.id_user = '".$id_user."' 
                AND k.id_kegiatan = r.id_kegiatan
                ORDER BY k.id_kegiatan ASC");
            return $query->result();
        }

        public function getAllPesertaKegiatan($id_kegiatan){
            $query = $this->db->query(
                "SELECT u.nama_lengkap, u.email 
                FROM user u, relasi r 
                WHERE r.id_kegiatan = '".$id_kegiatan."'
                AND u.id = r.id_user ");
            return $query->result();
        }
    }