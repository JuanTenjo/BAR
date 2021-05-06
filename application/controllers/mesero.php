<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mesero extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pedidos');
        $this->load->model('model_mostrar_productos');

    }


    public function RegistrarPedido()
    {
        try {

            date_default_timezone_set('America/Bogota');

            $fecha_actual = date("Y/m/d H:i:s");

            $ConcecutivoPedido = $this->Model_pedidos->GenerarConsecutivo();

            $array = [
                'IDzona' => $this->input->post('idzona'),
                'NombreZona' => $this->input->post('zona'),
                'Mesa' => $this->input->post('mesa'),
                'Consecutivo' => $ConcecutivoPedido,
                'Mesero' =>  $this->session->userdata('USUARIO'),
                'Fecha' =>  $fecha_actual
            ];

            $RegistrarPedido = $this->Model_pedidos->RegistrarPedido($array);

            $this->session->set_flashdata('Consecutivo', $ConcecutivoPedido);

            redirect("".base_url()."index.php/mesero/CargarPedido");

           
        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: RegistrarPedido. Error: ' . $e->getMessage();
        }
    }


    public function ModificarPedido()
    {

        try {
            $zona = $this->input->post("zona");
            $idzona = $this->input->post("idzona");
            $mesa = $this->input->post("mesa");
            $num_pedido = $this->input->post("pedido");
            $mesero = $this->session->userdata('USUARIO');
            date_default_timezone_set('America/Bogota');
            $fecha_actual = date("Y/m/d");

        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: ModificarPedido. Error: ' . $e->getMessage();
        }
    }


    public function CargarPedido()
    {
    
        $Consecutivo = $this->session->flashdata('Consecutivo');

        $Pedido = $this->Model_pedidos->MostrarCabeceraPedido($Consecutivo);

        $data = array(
            'Categorias' => $this->Model_pedidos->MostrarCategorias(),
            'Productos' => $this->Model_pedidos->MostrarProductos(),
            'DetallePedido' => $this->Model_pedidos->MostrarDetallePedido($Consecutivo),
            'Consecutivo' => $Pedido->num_pedido,
            'Mesero' => $Pedido->mesero,
            'Mesa' => $Pedido->mesa,
            'Idzona' => $Pedido->zona,
            'NombreZona' => $Pedido->nombreZona,
            'Fecha' => $Pedido->fecha
        );

        $this->load->view('VistasMesero/View_Productos', $data);

    }

    public function confirmarPedido()
    {

        $num_pedido = $this->input->post("num_pedido");
        $mesa = $this->input->post("mesa");
        $idzona = $this->input->post("idzona");

        if ($num_pedido <> 0 or $mesa <> 0 or $idzona <> 0) {
            echo '<script type="text/javascript">
        alert("Pedido confirmado correctamente");
        </script>';

            $ConfirmarPedido = $this->model_pedidos->Confirmar_Pedido($num_pedido, $mesa, $idzona);
        } else {
            echo '<script type="text/javascript">
        alert("Error Fatal: Numero de pedido, zona o mesa vacio");
        </script>';
        }
    }
    public function pedido()
    {
        $producto = $this->input->post("producto");
        $precio = $this->input->post("precio");
        $cantidad = $this->input->post("cantidad");
        $num_factura = $this->input->post("num_factura");
        $categoria = $this->input->post("categoria");
        if ($cantidad == 0) {
            $cantidad = 1;
        }
        $total = ($precio * $cantidad);

        $registro = $this->model_pedidos->registro_Detalle_Pedidos($producto, $precio, $cantidad, $num_factura, $categoria, $total);
    }

    public function eliminarPedido()
    {
        $num_pedido = $this->session->userdata('pedido');
        $id = $this->input->post("id");
        $eli = $this->model_pedidos->eliminar_pedido($id, $num_pedido);
    }


    public function salir()
    {

        $this->session->sess_destroy();
        $datos = array(
            'sms' => null
        );
        $this->load->view('View_Inicio', $datos);
    }
}
