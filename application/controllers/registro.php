<?php
defined('BASEPATH') or exit('No direct script access allowed');

class registro extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_registro');
	}

	public function index()
	{
		$this->load->view('View_Inicio');
	}

	public function Registro()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'user',
				'label' => 'Usuario',
				'rules' => 'required|min_length[5]|max_length[15]|is_unique[usuario.user]',
				'errors' => array(
					'required' => 'Debes ingresar un  %s.',
					'min_length' => 'Debes ingresar minimo 5 caracteres en el %s',
					'is_unique' => 'El usuario que ingresaste no esta disponible',
				),
			),
			array(
				'field' => 'correo',
				'label' => 'Correo electronico',
				'rules' => 'required|valid_email|is_unique[usuario.correo]',
				'errors' => array(
					'required' => 'Debes ingresar una  %s.',
					'valid_email' => 'Debes ingresar un %s valido.',
					'is_unique' => 'El correo %s ya se encuentra registrado',
				),
			),
			array(
				'field' => 'pass',
				'label' => 'Contraseña',
				'rules' => 'required|min_length[8]|max_length[15]',
				'errors' => array(
					'required' => 'Debes ingresar una  %s.',
					'min_length' => 'Debes ingresar minimo 8 caracteres en la %s.',
				),
			),
			array(
				'field' => 'passconfirm',
				'label' => 'Confirma Contraseña',
				'rules' => 'required|matches[pass]',
				'errors' => array(
					'required' => 'Debes %s.',
					'matches' => 'Las contraseña no coinciden',
				),
			),
			array(
				'field' => 'genero',
				'label' => 'Genero',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Debes ingresar un %s.',
				),
			),
			array(
				'field' => 'fecha_nacimiento',
				'label' => 'Fecha de nacimiento',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Debes ingresar una %s.',
				),
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$datos = array(
				'sms' => null
			);
			$this->load->view('View_Inicio', $datos);
		} else {

			$user = $this->input->post('user');
			$pass = $this->input->post('pass');
			$correo = $this->input->post('correo');
			$genero = $this->input->post('genero');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');

			$hash =  password_hash($pass, PASSWORD_DEFAULT);

			$re = $this->model_registro->registroUser($user, $hash, $correo, $genero, $fecha_nacimiento);

			$datos = array(
				'sms' => "Registro exitoso, ingresa con tus datos."
			);
			
			$this->load->view('View_Inicio', $datos);
		}
	}
}
