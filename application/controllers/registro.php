<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registro extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('model_registro');
  }

	public function index()
	{
		$this->load->view('View_Inicio');
	}
  public function Registro(){
    $user=$this->input->post('user');
    $pass=$this->input->post('pass');
    $correo=$this->input->post('correo');
    $genero=$this->input->post('genero');
    $fecha_nacimiento=$this->input->post('fecha_nacimiento');
    $re = $this->model_registro->registroUser($user,$pass,$correo,$genero,$fecha_nacimiento);
  }
}
