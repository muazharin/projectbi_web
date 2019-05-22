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

        public function getData(){
            $id_user = $this->uri->segment(3);
            $mod = $this->M_kegiatan->getAllData($id_user);
            $this->output->set_output(json_encode($mod, JSON_PRETTY_PRINT))->_display();
            exit;
        }

        public function getPesertaKegiatan(){
            $id_kegiatan = $this->uri->segment(3);
            $mod2 = $this->M_kegiatan->getAllPesertaKegiatan($id_kegiatan);
            $this->output->set_output(json_encode($mod2, JSON_PRETTY_PRINT))->_display();
            exit;
        }
    }