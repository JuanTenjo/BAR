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

    public function RegistraProducto(){
        $categoriaProducto = $this->input->post('categoriaProducto');
        $nombreProducto = $this->input->post('nombreProducto');
        $precioProducto = $this->input->post('precioProducto');
		$ingredientesProducto = $this->input->post('ingredientesProducto');
		$cantidadProducto = $this->input->post('cantidadProducto');

        $re = $this->Model_Admin->RegistraProducto($categoriaProducto,$nombreProducto,$ingredientesProducto,$precioProducto,$cantidadProducto);

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

    public function EliminarCategoria(){
        $ID_Categoria = $this->input->post('ID_Categoria');
        $re = $this->Model_Admin->EliminarCategoria($ID_Categoria);
    }


    public function RegistraZona(){
       $NombreZona = $this->input->post('NombreZona');
       $NumeroMesas = $this->input->post('NumeroMesas');
       $re = $this->Model_Admin->RegistrarZona($NombreZona,$NumeroMesas);
    }

    public function EliminarZona(){
        $ID_Zonas = $this->input->post('ID_Zonas');
        $re = $this->Model_Admin->Eliminarzona($ID_Zonas);
    }

    public function Salir(){

		$this->session->sess_destroy();
        $this->load->view('inicio');

    }

}
