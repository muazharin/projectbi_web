<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kegiatan extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_kegiatan');
        }

        public function addData(){
            $this->M_kegiatan->addDataKegiatan();
        }

        public function addDataEvent(){
            $this->M_kegiatan->addDataUserEvent();
        }
    }