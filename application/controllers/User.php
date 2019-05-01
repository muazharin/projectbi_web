<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_user');
        }

        public function register(){
            $this->M_user->regist();
        }
    }