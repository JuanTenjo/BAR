<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nueva_tienda extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function crear_nueva_tienda(){
		$this->load->view('view_crear_nueva_tienda');
	}
}
