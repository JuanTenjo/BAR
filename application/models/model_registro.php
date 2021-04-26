<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Registro extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function registro($user=null,$pass=null,$correo=null,$genero=null,$fecha_nacimiento=null){
    $sql= "INSERT INTO usuario(user,pass,correo,genero,fecha_nacimiento) VALUES ('$user','$pass','$correo','$genero','$fecha_nacimiento')";
    $query=$this->db->query($sql);
    $this->load->view('inicio');
  }
  public function registrar_productos($tipo=null,$nombre=null,$precio=null){
    $sql = "INSERT INTO productos(tipo,nombre,precio) VALUES ('$tipo','$nombre','$precio')";
    $query=$this->db->query($sql);
    redirect("".base_url()."index.php/inicie_sesion/carga_admin");
  }
  public function registrar_categoria($nombre=null){
    $sql = "INSERT INTO categorias(nombre) VALUES ('$nombre')";
    $query=$this->db->query($sql);
    redirect("".base_url()."index.php/inicie_sesion/carga_admin");
  }
  public function eliminarcategoria($id=null){
    $sql = "DELETE FROM categorias where idcategorias = '$id'";
    $query=$this->db->query($sql);
    redirect("".base_url()."index.php/inicie_sesion/carga_admin");
  }
  public function eliminarproducto($id=null){
    $sql = "DELETE FROM productos where id = '$id'";
    $query=$this->db->query($sql);
    redirect("".base_url()."index.php/inicie_sesion/carga_admin");
  }


  public function agregarzona($nombre=null,$mesas=null,$id_zona=null){

    $bandera = 0;

    $sql = "INSERT INTO zonas(idzonas,nombre) VALUES ('$id_zona','$nombre')";
    $query=$this->db->query($sql);

    $bandera = 1;

    if ($bandera == 1){
      $i = 0;
      for($i = 1; $i <= $mesas; $i++){
        $sql = "INSERT INTO mesas(idzonas,nummesa) VALUES ('$id_zona','$i')";
        $query=$this->db->query($sql);  
      }
      redirect("".base_url()."index.php/inicie_sesion/carga_admin");
    }
   
  }


  public function editarzonas($idzonas=null,$mesas=null){


    
    $bandera = FALSE;

    $this->db->query("DELETE FROM mesas WHERE idzonas = '$idzonas' AND numpedido = 0;");

    $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    if ($bandera == TRUE){

  
      for($i = 1; $i <= $mesas; $i++){
        $this->db->query("INSERT INTO mesas(idzonas,nummesa) VALUES ('$idzonas','$i')");
      }
    
      redirect("".base_url()."index.php/inicie_sesion/carga_admin");
    }else{
      echo '<script language="javascript">alert("ERROR: El programa detecta que alguna de sus mesas de esta zona esta cargada una factura pendiente y por esta razon no se puede modificar.");</script>';
    }

  }

  public function eliminarzona($idzonas=null){

    
    $bandera = FALSE;

    $this->db->query("DELETE FROM mesas WHERE idzonas = '$idzonas' AND numpedido = 0;");

    $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    if ($bandera == TRUE){

      $this->db->query("DELETE FROM zonas WHERE idzonas = '$idzonas'");
      
      redirect("".base_url()."index.php/inicie_sesion/carga_admin");
    }else{

      echo '<script language="javascript">alert("ERROR: El programa detecta que alguna de sus mesas de esta zona esta cargada una factura pendiente y por esta razon no se puede modificar.");</script>';

    }

  }
  
}
