<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$datos = array(
			'sms' => null
		);
		$this->load->view('View_Inicio',$datos);
	}
}
