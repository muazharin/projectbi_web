<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_Login extends CI_Model{
        
        public function check1()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query = $this->db->get('user',1);
            return $query;
        }

        public function check()
        {
            return $this->db->get('user')->result_array();
        }
    }
    