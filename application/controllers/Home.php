<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('M_home');
	}
	public function index()
	{
		$data['user']=$this->M_home->getAllData();
		$this->load->view('home',$data);
	}
}
