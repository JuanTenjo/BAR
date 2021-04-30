<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		//$this->load->view('nav_view');
		//$this->load->view('VistasAdmin/View_Inicio');
		$this->load->view('View_Inicio');
	}
}
