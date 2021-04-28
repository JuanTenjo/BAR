<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('model_facturas');
        $this->load->model('model_pedidos');
    }
	public function index()
	{
		$this->load->view('welcome_message');
    }

    public function MostrarVistaFacturador(){
        $datos = array(
            'pedidos' => $this->model_pedidos->MostrarPedidosAFacturar(),
        );
        $this->load->view('view_facturador',$datos);
    }

    public function facturar(){
        $num_pedido = $this->input->post('num_pedido');
        $bandera = 0;
        $facturar = $this->model_facturas->facturar($num_pedido);
        $bandera = 1;
/*if ($bandera == 1){
            $result = $this->model_facturas->MostrarDatosFacturaRealizada($num_pedido);
            $datos = array(
                'num_pedido' => $result->num_pedido,
                'mesero' => $result->mesero,
                'mesa' => $result->mesa,
                'zona' => $result->zona,
                'fecha' => $result->fecha,
                'detallePedidos' => $this->model_facturas->MostrarDatosFacturaRealizada($num_pedido),       
            );
            $this->load->view('impresion',$datos);
        }*/

        

        redirect("".base_url()."index.php/facturacion/MostrarDetalle");

    }

    public function facturarFacturasPendientes(){
        $num_pedido = $this->input->post('num_pedido');
        $facturar = $this->model_facturas->facturar($num_pedido);
        redirect("".base_url()."index.php/facturacion/MostrarDetallePedidosPendientes");
    }

    public function MostrarDetalle(){
        $num_pedido = $this->input->post('num_pedido');
        $datos = array(
            'detallePedidos' => $this->model_facturas->Mostrar_Detalle($num_pedido),
            'pedidos' => $this->model_pedidos->MostrarPedidosAFacturar(),
        );
        $this->load->view('view_facturador',$datos);
    }
    
    public function MostrarDetallePedidosPendientes(){
        $num_pedido = $this->input->post('num_pedido');
        $datos = array(
            'detallePedidos' => $this->model_facturas->Mostrar_Detalle($num_pedido),
            'pendientes' => $this->model_facturas->MostrarPedidosPendiente(),
        );
        $this->load->view('view_pendientes',$datos);
    }

    public function MostrarDetalleHistorial(){
        $num_pedido = $this->input->post('num_pedido');
        $datos = array(
            'detallePedidos' => $this->model_facturas->Mostrar_Detalle($num_pedido),
            'pedidos' => $this->model_facturas->MostrarHistorialDePedidos(),
        );
        $this->load->view('view_historial',$datos);
    }
    
    
    public function historial(){
        $data = array(
            'pedidos' => $this->model_facturas->MostrarHistorialDePedidos(),
        );
        $this->load->view('view_historial', $data);
    }

    public function pendientes(){
        $data = array(
            'pendientes' => $this->model_facturas->MostrarPedidosPendiente(),
        );
        $this->load->view('view_pendientes', $data);
    }

    public function Filtros(){

        $TipoFiltro = $this->input->post('tipodefiltro');
        
        switch($TipoFiltro){
            case 1:
                $num_pedido = $this->input->post('numpedido');
                $sql = "SELECT * FROM pedidos WHERE num_pedido = '$num_pedido' AND confirmado = 1 and pagado = 1";
                $data = array(
                    'pedidos' => $this->model_facturas->MostrarConFiltro($sql),
                );
                $this->load->view('view_historial', $data);
            break;
            case 2:
                $FechaIncial = $this->input->post('fechainicial');
                $FechaFinal = $this->input->post('fechafinal');
                $sql = "SELECT * FROM pedidos WHERE fecha >= '$FechaIncial' AND fecha <= '$FechaFinal' AND confirmado = 1 and pagado = 1";
                $data = array(
                    'pedidos' => $this->model_facturas->MostrarConFiltro($sql),
                );
                $this->load->view('view_historial', $data);
            break;
        }

       /* $data = array(
            'pendientes' => $this->model_facturas->MostrarPedidosPendiente(),
        );

        $this->load->view('view_pendientes', $data);*/
    }



    public function Salir(){
        $this->load->view('view_iniciesesion');
    }
}