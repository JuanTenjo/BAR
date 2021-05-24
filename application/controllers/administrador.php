<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('Model_Admin');
    }

	public function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('VistasAdmin/View_Inicio');
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
    }

	public function Usuarios()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'Usuarios' => $this->Model_Admin->MostrarUsuario(),
				'Roles' => $this->Model_Admin->MostrarRoles()
			);	
			$this->load->view('VistasAdmin/View_Usuarios',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
    }
	
	public function Categorias()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'categorias' => $this->Model_Admin->MostrarCategorias()
			);	
			$this->load->view('VistasAdmin/View_Categoria',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
    }
	public function Productos()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'productos' => $this->Model_Admin->MostrarProductos(),
				'categorias' => $this->Model_Admin->MostrarCategorias()
			);	
			$this->load->view('VistasAdmin/View_Productos',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
    }
	public function Mesas()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'mesas' => $this->Model_Admin->MostrarMesas()
			);	
			$this->load->view('VistasAdmin/View_Mesas',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
    }

	public function TipoPagos(){
		if ($this->session->userdata('is_logged_in')) {
			$data = array(
				'TiposDePago' => $this->Model_Admin->MostrarTipoPagos()
			);	
			$this->load->view('VistasAdmin/View_TipoPago',$data);
		}else{	
			echo "Sesion Caducada por favor ingrese nuevamente";
		}
	}

	public function RegistrarTipoPago(){

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'NombreTipo',
				'label' => 'Nombre Tipo Pago',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Debes ingresar un  %s.',
				),
			),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'TiposDePago' => $this->Model_Admin->MostrarTipoPagos()
			);	
			$this->load->view('VistasAdmin/View_TipoPago',$data);
		}else{

			$array = [
				'NombreTipo' => $this->input->post('NombreTipo'),
				'NumCuenta' => $this->input->post('NumCuenta'),
			];
			
			$re = $this->Model_Admin->RegistrarTipoPago($array);

			if($re){	
				redirect("" . base_url() . "index.php/Administrador/TipoPagos");
			}

		}
	}
	

	public function ActualizarTipoPago(){

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'NombreTipo',
				'label' => 'Nombre Tipo Pago',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Debes ingresar un  %s.',
				),
			),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'TiposDePago' => $this->Model_Admin->MostrarTipoPagos()
			);	
			$this->load->view('VistasAdmin/View_TipoPago',$data);
		}else{

			$array = [
				'NombreTipo' => $this->input->post('NombreTipo'),
				'NumCuenta' => $this->input->post('NumCuenta'),
				'Habilitado' => $this->input->post('Habilitado'),
				'IdTiposPago' => $this->input->post('IdTiposPago'),
			];
			
			$re = $this->Model_Admin->ActualizarTipoPago($array);

			if($re){	
				redirect("" . base_url() . "index.php/Administrador/TipoPagos");
			}else{
				redirect("" . base_url() . "index.php/Administrador/TipoPagos");
			}

		}
	}

	public function RegistrarUsuario(){
		try{

			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
	
			$config = array(
				array(
					'field' => 'usuario',
					'label' => 'Usuario',
					'rules' => 'required|min_length[5]|max_length[15]|is_unique[usuario.user]',
					'errors' => array(
						'required' => 'Debes ingresar un  %s.',
						'min_length' => 'Debes ingresar minimo 5 caracteres en el %s',
						'is_unique' => 'El usuario que ingresaste no esta disponible',
					),
				),
				array(
					'field' => 'Email',
					'label' => 'Correo electronico',
					'rules' => 'required|valid_email|is_unique[usuario.correo]',
					'errors' => array(
						'required' => 'Debes ingresar una  %s.',
						'valid_email' => 'Debes ingresar un %s valido.',
						'is_unique' => 'El correo %s ya se encuentra registrado',
					),
				),
				array(
					'field' => 'password',
					'label' => 'Contraseña',
					'rules' => 'required|min_length[8]|max_length[15]',
					'errors' => array(
						'required' => 'Debes ingresar una  %s.',
						'min_length' => 'Debes ingresar minimo 8 caracteres en la %s.',
					),
				),
				array(
					'field' => 'Genero',
					'label' => 'Genero',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar un %s.',
					),
				),
				array(
					'field' => 'FechaNacimiento',
					'label' => 'Fecha de nacimiento',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar una %s.',
					),
				),
				array(
					'field' => 'ID_Rol',
					'label' => 'ID ROL',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar una %s.',
					),
				)
			);

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {

				$data = array(
					'Usuarios' => $this->Model_Admin->MostrarUsuario(),
					'Roles' => $this->Model_Admin->MostrarRoles()
				);	
				$this->load->view('VistasAdmin/View_Usuarios',$data);

			} else {

				$pass = $this->input->post('password');
	
				$hash =  password_hash($pass , PASSWORD_DEFAULT);
	
				$array = [
					'ID_Rol' => $this->input->post('ID_Rol'),
					'usuario' => $this->input->post('usuario'),
					'password' => $hash,
					'Email' => $this->input->post('Email'),
					'Genero' => $this->input->post('Genero'),
					'FechaNacimiento' => $this->input->post('FechaNacimiento')
				];
	
				$re = $this->Model_Admin->RegistraUsuario($array);

			}


		}catch(Exception $e){

			log_message('Error', $e->getMessage());
			return;
			
		}
	}
	public function ActualizarUsuario(){
		try{
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
	
			$config = array(
				array(
					'field' => 'usuarioAct',
					'label' => 'Usuario',
					'rules' => 'required|min_length[5]|max_length[15]',
					'errors' => array(
						'required' => 'Debes ingresar un  %s.',
						'min_length' => 'Debes ingresar minimo 5 caracteres en el %s'			
					),
				),
				array(
					'field' => 'EmailAct',
					'label' => 'Correo electronico',
					'rules' => 'required|valid_email',
					'errors' => array(
						'required' => 'Debes ingresar una  %s.',
						'valid_email' => 'Debes ingresar un %s valido.'
					),
				),
				array(
					'field' => 'GeneroAct',
					'label' => 'Genero',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar un %s.',
					),
				),
				array(
					'field' => 'FechaNacimientoAct',
					'label' => 'Fecha de nacimiento',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar una %s.',
					),
				),
				array(
					'field' => 'ID_RolAct',
					'label' => 'ID ROL',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar una %s.',
					),
				),
				array(
					'field' => 'ID_Usuario',
					'label' => 'ID usuario',
					'rules' => 'required',
					'errors' => array(
						'required' => 'Debes ingresar una %s.',
					),
				)
			);

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {

				$data = array(
					'Usuarios' => $this->Model_Admin->MostrarUsuario(),
					'Roles' => $this->Model_Admin->MostrarRoles()
				);	
				$this->load->view('VistasAdmin/View_Usuarios',$data);

			} else {
				$array = [
					'ID_Usuario' => $this->input->post('ID_Usuario'),
					'ID_Rol' => $this->input->post('ID_RolAct'),
					'usuario' => $this->input->post('usuarioAct'),
					'Email' => $this->input->post('EmailAct'),
					'Genero' => $this->input->post('GeneroAct'),
					'FechaNacimiento' => $this->input->post('FechaNacimientoAct')
				];
				
				$re = $this->Model_Admin->ActualizarUsuario($array);

			}


		}catch(Exception $e){

			log_message('Error', $e->getMessage());
			return;
			
		}
	}
	public function EliminarUsuario(){
        $ID_Usuario= $this->input->post('ID_Usuario');
        $re = $this->Model_Admin->EliminarUsuario($ID_Usuario);
    }


    public function RegistraProducto(){
        $categoriaProducto = $this->input->post('categoriaProducto');
        $nombreProducto = $this->input->post('nombreProducto');
        $precioProducto = $this->input->post('precioProducto');
		$ingredientesProducto = $this->input->post('ingredientesProducto');
		$cantidadProducto = $this->input->post('cantidadProducto');

        $re = $this->Model_Admin->RegistraProducto($categoriaProducto,$nombreProducto,$ingredientesProducto,$precioProducto,$cantidadProducto);

    }



	public function ModificarProducto(){
		try{
			
			$array = [
				'IDProducto' => $this->input->post('ID_Producto'),
				'IDCategoria' => $this->input->post('IDCategoria'),
				'NombreProduc' => $this->input->post('NombreProduc'),
				'Precio' => $this->input->post('Precio'),
				'Ingredientes' => $this->input->post('Ingredientes'),
				'Cantidad' => $this->input->post('Cantidad')
			];

			$re = $this->Model_Admin->ActualizarProducto($array);

		}catch(Exception $e){

			log_message('Error', $e->getMessage());
			return;
			
		}
	}
	public function EliminarProducto(){
        $ID_Producto = $this->input->post('ID_Producto');
        $re = $this->Model_Admin->EliminarProducto($ID_Producto);
    }




    public function RegistraCategoria(){
        $nombreCategoria = $this->input->post('nombreCategoria');
		$descripcionCategoria = $this->input->post('descripcionCategoria');
        $re = $this->Model_Admin->RegistraCategoria($nombreCategoria,$descripcionCategoria);
    } 
	public function ModificarCategoria(){
		try{
			$array = [
				'IDCategoria' => $this->input->post('ID_Categoria'),
				'NombreCate' => $this->input->post('NombreCate'),
				'Descripcion' => $this->input->post('Descripcion')
			];

			$re = $this->Model_Admin->ActualizarCategoria($array);

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
    public function EliminarCategoria(){
		try{

        $ID_Categoria = $this->input->post('ID_Categoria');

        $re = $this->Model_Admin->EliminarCategoria($ID_Categoria);


		}catch(Exception $e){
			echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: EliminarCategoria. Error: ' . $e->getMessage();
		}
    }




    public function RegistraZona(){
       $NombreZona = $this->input->post('NombreZona');
       $NumeroMesas = $this->input->post('NumeroMesas');
       $re = $this->Model_Admin->RegistrarZona($NombreZona,$NumeroMesas);
    }

	public function ModificarZona(){
		$array = [
			'IDZona' => $this->input->post('ID_Zonas'),
			'NombreZona' => $this->input->post('NombreZona'),
			'NumeroDeMesas' => $this->input->post('NumeroDeMesas')	
		];

		$re = $this->Model_Admin->ModificarZona($array);

	}


    public function EliminarZona(){
        $ID_Zonas = $this->input->post('ID_Zonas');
        $re = $this->Model_Admin->Eliminarzona($ID_Zonas);
    }


    public function Salir(){

		$this->session->sess_destroy();
		$datos = array(
			'sms' => null
		);
        $this->load->view('View_Inicio',$datos);

    }

}
