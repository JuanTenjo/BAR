<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Mesero extends CI_Controller {
	public function mesa()
	{
        $mesa = $this->input->get('mesa');
        $mesa = array(
            'mesa' => $mesa,
        );
        $this->load->view('view_producto',$mesa);
    }
    public function burger(){ 
        $hamburgesa = $this->input->post('burger');
        $perro = $this->input->post('perros');
        $cubano = $this->input->post('cubano');
        $otro = $this->input->post('otros');    
        $cantidad = $this->input->post('cantidad');   
        if($cantidad>0){
        if($hamburgesa==true){
            echo "<script language='javascript'> alert('hamburgesa Guardado'); </script>"; 
            $this->load->view('view_mesero');
        }elseif($perro==true){
            echo "<script language='javascript'> alert('perro Guardado'); </script>"; 
            $this->load->view('view_mesero');
        }elseif($cubano==true){
            echo "<script language='javascript'> alert('cubano Guardado'); </script>"; 
            $this->load->view('view_mesero');
        }elseif($otro==true){
            echo "<script language='javascript'> alert('otro Guardado'); </script>"; 
            $this->load->view('view_mesero');
        }else{
            echo "<script language='javascript'> alert('Por favor digite un producto'); </script>"; 
            $this->load->view('view_mesero');
        }
    }else{
        echo "<script language='javascript'> alert('Por favor digite una cantidad'); </script>"; 
        $this->load->view('view_mesero');
    }
}
    
    public function bebidas(){
        $limonada = $this->input->post('limonadas');
        $malteada = $this->input->post('malteadas');
        $cantidad = $this->input->post('mcantidad');
    }
    public function cervesa(){
        $cervesa = $this->input->post('cervesa');
        $cantidad = $this->input->post('mcantidad');
        echo $cervesa;
    }
}
?>