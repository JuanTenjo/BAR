<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Model_facturas');
        $this->load->model('Model_pedidos');
    }


    public function Facturador(){

        $datos = array(
            'pedidos' => $this->Model_pedidos->MostrarPedidosAFacturar(),
        );
        $this->load->view('VistasFacturador/View_facturador',$datos);

    }
    
    public function Pendientes(){

        $data = array(
            'pendientes' => $this->Model_facturas->MostrarPedidosPendiente(),
        );
        $this->load->view('VistasFacturador/View_historial', $data);

    }

        
    public function Historial(){
        $data = array(
            'pedidos' => $this->Model_facturas->MostrarHistorialDePedidos(),
        );
        $this->load->view('VistasFacturador/View_pendientes', $data);
    }

    
    public function MostrarDetalle(){
        $num_pedido = $this->input->post('num_pedido');
        $datos = array(
            'detallePedidos' => $this->Model_facturas->Mostrar_Detalle($num_pedido),
            'pedidos' => $this->Model_pedidos->MostrarPedidosAFacturar(),
        );
        $this->load->view('VistasFacturador/View_facturador',$datos);
    }





    public function facturar(){

        $num_pedido = $this->input->post('num_pedido');
        $bandera = 0;
        $facturar = $this->Model_facturas->Facturar($num_pedido);
        $bandera = 1;

        redirect("".base_url()."index.php/facturacion/MostrarDetalle");

    }

    public function facturarFacturasPendientes(){
        $num_pedido = $this->input->post('num_pedido');
        $facturar = $this->model_facturas->facturar($num_pedido);
        redirect("".base_url()."index.php/facturacion/MostrarDetallePedidosPendientes");
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

        $this->session->sess_destroy();
        $datos = array(
            'sms' => null
        );
        $this->load->view('View_Inicio', $datos);

    }
}
