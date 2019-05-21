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
            $this->output->set_output(json_encode($this->M_login->check1(), JSON_PRETTY_PRINT))->_display();
            exit;
        }
    }
    