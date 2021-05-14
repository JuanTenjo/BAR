<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicie_Sesion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_inicio');
		$this->load->model('model_pedidos');
		$this->load->model('model_mostrar_productos');
	}
	public function index()
	{
		//header
		$this->load->view('view_iniciesesion');
	}

	public function Form(){

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$config = array(
			array(
					'field' => 'usuario',
					'label' => 'Usuario',
					'rules' => 'required',
					'errors' => array(
							'required' => 'Debes ingresar un  %s.',
					),
			),
			array(
					'field' => 'contrasena',
					'label' => 'Contraseña',
					'rules' => 'trim|required|min_length[8]',
					'errors' => array(
							'required' => 'Debes ingresar una  %s.',
							'min_length' => 'Debes ingresar minimo 8 caracteres en la %s',
					),
			)
	);

	$this->form_validation->set_rules($config);

	// 	$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|min_length[8]',
	// 			array(
	// 				'required' => 'Debes ingresar una  %s.',
	// 				'min_length' => 'Debes ingresar minimo 8 caracteres en la %s',
	// 			)	
	// 	);
		
		if ($this->form_validation->run() == FALSE)
		{
			$datos = array(
				'sms' => null
			); 
			$this->load->view('View_Inicio',$datos);
		}
		else
		{
				$this->load->view('formsuccess');
		}

	}

	public function Loggeo($str){

	}

	
	public function recarga_inicio(){
		$this->load->view('inicio');
	}
	public function modificar()
	{
		$id=$this->input->post('id');
		$act = $this->model_inicio->modificar($id);
			$datos = array(
				'id' => $act->id,
				'correo' =>$act->correo,
				'usuario' => $act->user,
				'genero' => $act->genero,
				'fecha_nacimiento' => $act->fecha_nacimiento,
				'contrasena' => $act->pass,
				'nombre_rol' => $act->nombre_rol,
				'id_rol' => $act->id_rol,
			);
		$this->load->view('view_editar_registro',$datos);
	}
	public function modificar_registro(){
		$id = $this->input->post("id");
		$usuario = $this->input->post("usuario");
		$correo = $this->input->post("correo");
		$genero = $this->input->post("genero");
		$fecha = $this->input->post("fecha");
		$contrasena = $this->input->post("contrasena");
		$rol = $this->input->post("rol");
		$mof = $this->model_inicio->modificar_registro($id,$usuario,$correo,$contrasena,$rol,$genero,$fecha);
	}
	public function eliminar_registro(){
		$id=$this->input->post("id");
		$eli = $this->model_inicio->eliminar_registro($id);
	}
	public function Carga_admin()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('VistasAdmin/View_Inicio');
			//$this->load->view('view_admin',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
	}
	public function Carga_mesero()
	{
		if ($this->session->userdata('is_logged_in')) {
			$datos = array(
				'zonas' => $this->model_pedidos->Mostrarzonas(),
				'mesas' => $this->model_pedidos->Mostrarmesas(),
				'pedidos' => $this->model_pedidos->MostrarPedidosAFacturar()
			);
			$this->load->view('VistasMesero/View_SeleccionarMesa',$datos);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
	}
	public function Carga_facturador()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'pedidos' => $this->model_pedidos->MostrarPedidosAFacturar()
			);
			$this->load->view('view_facturador',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
	}
	public function olvidar_contra()
	{
		$this->load->view('view_olvidar');
	}
	public function cambia_contra()
	{
		$usuario=$this->input->post('usuario');
		$nueva_con=$this->input->post('nueva_con');
		$con_contra=$this->input->post('con_contra');
		if ($nueva_con == $con_contra) {
			$re = $this->model_inicio->cambia_con($usuario);
			if($re->cuenta == 1){
				$result = $this->model_inicio->act_usuario($usuario,$nueva_con);
			}
		}
	}

	public function Inicio(){

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		//crypt ( string $str , string $salt = ? ) : string

		$config = array(
			array(
					'field' => 'usuario',
					'label' => 'Usuario',
					'rules' => 'required',
					'errors' => array(
							'required' => 'Debes ingresar un  %s.',
					),
			),
			array(
					'field' => 'contrasena',
					'label' => 'Contraseña',
					'rules' => 'trim|required|min_length[8]',
					'errors' => array(
							'required' => 'Debes ingresar una  %s.',
							'min_length' => 'Debes ingresar minimo 8 caracteres en la %s',
					),
			)
		);

		$this->form_validation->set_rules($config);

		// 	$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|min_length[8]',
		// 			array(
		// 				'required' => 'Debes ingresar una  %s.',
		// 				'min_length' => 'Debes ingresar minimo 8 caracteres en la %s',
		// 			)	
		// 	);
			
			if ($this->form_validation->run() == FALSE)
			{
				$datos = array(
					'sms' => null
				); 
				$this->load->view('View_Inicio',$datos);
			}
			else
			{
				$usuario=$this->input->post('usuario');
				$contrasena=$this->input->post('contrasena');
		
				$re = $this->model_inicio->inicio($usuario,$contrasena);
				if($re->cuenta == 1){
					$result = $this->model_inicio->con_usuario($usuario,$contrasena);
					//echo "correcto";
					$session = array(
						'ID' => $result->id,
						'USUARIO' => $result->user,
						'CONTRASENA' => $result->pass,
						'ROL' => $result->nombre_rol,
						'is_logged_in' => TRUE,
					);
					$this->session->set_userdata($session);
					if ($result->nombre_rol == "sinAsignar") {
							$datos = array(
								'sms' => "No tienes asignado ningun permiso"
							); 
							$this->load->view('View_Inicio',$datos);
					}
					elseif ($result->nombre_rol == "admin") {
						if ($this->session->userdata('is_logged_in')) {
							redirect("".base_url()."index.php/inicie_sesion/Carga_admin");
						}
					}elseif ($result->nombre_rol == "mesero") {
						if ($this->session->userdata('is_logged_in')) {
							redirect("".base_url()."index.php/inicie_sesion/Carga_mesero");
						}
					}elseif ($result->nombre_rol == "facturador") {
						if ($this->session->userdata('is_logged_in')) {
							redirect("".base_url()."index.php/inicie_sesion/Carga_facturador");
						}
					}
				}else{
					$datos = array(
						'sms' => "Contrasena o usuario incorrecto."
					); 
					$this->load->view('View_Inicio',$datos);
				}
			}
	}
}
