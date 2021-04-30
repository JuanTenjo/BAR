<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_registro');
        $this->load->model('model_mostrar_productos');
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

	public function RegistrarUsuario(){
		try{
			
			$array = [
				'ID_Rol' => $this->input->post('ID_Rol'),
				'usuario' => $this->input->post('usuario'),
				'password' => $this->input->post('password'),
				'Email' => $this->input->post('Email'),
				'Genero' => $this->input->post('Genero'),
				'FechaNacimiento' => $this->input->post('FechaNacimiento')
			];

			$re = $this->Model_Admin->RegistraUsuario($array);

		}catch(Exception $e){

			log_message('Error', $e->getMessage());
			return;
			
		}
	}
	public function ActualizarUsuario(){
		try{
			
			$array = [
				'ID_Usuario' => $this->input->post('ID_Usuario'),
				'ID_Rol' => $this->input->post('ID_Rol'),
				'usuario' => $this->input->post('usuario'),
				'Email' => $this->input->post('Email'),
				'Genero' => $this->input->post('Genero'),
				'FechaNacimiento' => $this->input->post('FechaNacimiento')
			];

			$re = $this->Model_Admin->ActualizarUsuario($array);

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
        $this->load->view('View_Inicio');

    }

}
