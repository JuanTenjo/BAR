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

    public function index(){

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
                'Mesero' => $this->input->post('mesero'),
                'Fecha' =>  $fecha_actual
            ];

            $RegistrarPedido = $this->Model_pedidos->RegistrarPedido($array);

            $this->session->set_flashdata('Consecutivo', $ConcecutivoPedido);

            redirect("" . base_url() . "index.php/mesero/CargarPedido");
        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: RegistrarPedido. Error: ' . $e->getMessage();
        }
    }


    public function ModificarPedido()
    {
        try {
            
            $Consecutivo = $this->input->post("Consecutivo");

            $this->session->set_flashdata('Consecutivo', $Consecutivo);

            redirect("" . base_url() . "index.php/mesero/CargarPedido");


        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: ModificarPedido. Error: ' . $e->getMessage();
        }
    }


    public function CargarPedido()
    {
        try {

            if ($this->session->userdata('is_logged_in')) {

                $Consecutivo = $this->session->flashdata('Consecutivo');

                if($Consecutivo == null){
                    echo "El consecutivo esta nulo, al parecer la sesion caduco";
                }else{

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
                        'Estado' => $Pedido->confirmado,
                        'Pagado' => $Pedido->pagado,
                        'Fecha' => $Pedido->fecha
                    );
        
                    $this->load->view('VistasMesero/View_Productos', $data);
                }

            }else{	
                echo "Sesion Caducada por favor ingrese nuevamente";
            }


        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: CargarPedido. Error: ' . $e->getMessage();
        }
    }

    public function RegistrarDetallePedido()
    {
        try {
            
            $data = array(
                'NombreProduc' => $this->input->post("NombreProduc"),
                'Precio' => $this->input->post("Precio"),
                'Cantidad' => $this->input->post("Cantidad"),
                'Consecutivo' =>  $this->input->post("Consecutivo"),
                'Categoria' =>  $this->input->post("Categoria")
            );
   
            if ($data['Cantidad'] <= 0) {
                $data['Cantidad'] = 1;
            }

            $total = ($data['Precio'] * $data['Cantidad']);

            $DetaPedido = $this->Model_pedidos->RegistrarDetalle($data,$total);

            redirect("" . base_url() . "index.php/mesero/CargarPedido");

        } catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: RegistrarDetallePedido. Error: ' . $e->getMessage();
        }
    }

    public function ConfirmarPedido()
    {
        try{

            date_default_timezone_set('America/Bogota');

            $fecha_actual = date("Y/m/d H:i:s");

            $num_pedido = $this->input->post("Consecutivo");
            $mesa = $this->input->post("mesa");
            $idzona = $this->input->post("idzona");
            $MeseroModi = $this->input->post("MeseroModi");

            $ConfirmarPedido = $this->Model_pedidos->Confirmar_Pedido($num_pedido, $mesa, $idzona, $fecha_actual, $MeseroModi);

            if($ConfirmarPedido){
                redirect("" . base_url() . "index.php/inicie_sesion/Carga_mesero");
            }else{
                echo $ConfirmarPedido;
            }


    
        }catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: ConfirmarPedido. Error: ' . $e->getMessage();
        }


    }

    public function EliminarPedido()
    {
        try{

            $Consecutivo = $this->input->post("Consecutivo");

            $IdDetallePedido = $this->input->post("IdDetallePedido");

            $eli = $this->Model_pedidos->EliminarDetallePedido($IdDetallePedido, $Consecutivo);

            if($eli){
                redirect("" . base_url() . "index.php/mesero/CargarPedido");
            }else{
                echo $eli;
            }


        }catch (Exception $e) {
            echo 'Lo siento pero se ha presentado un error en el Controller Administrador en la funcion: EliminarPedido. Error: ' . $e->getMessage();
        }

    }

    public function Copias(){

        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        

    }


    public function Salir()
    {

        $this->session->sess_destroy();
        $datos = array(
            'sms' => null
        );
        $this->load->view('View_Inicio', $datos);
    }
}
