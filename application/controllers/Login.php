<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_login');
        }
        
        public function index()
        {
            $cek = $this->M_login->check();
            
            $result = array();

            while ($extraData = $cek) {
                $result[]=$extraData;
            }

            echo json_encode($result);
        }
    }
    