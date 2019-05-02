<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_User extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function regist(){
            $data=[
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $this->db->insert('user',$data);
        }
    }