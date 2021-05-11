<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pedidos extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('welcome_message');
  }

  public function GenerarConsecutivo()
  {
    try {

      //traer consecuivo actual y sumarle uno

      $query  = $this->db->query("SELECT Prefijo, Numero FROM restaurantebar.consecutivos WHERE id_consecutivo = 1");

      $result = $query->row();

      $Prefijo = $result->Prefijo;
      $NumConse = $result->Numero;

      $NumConse += 1;

      $NumPedido = "$Prefijo" . $NumConse;

      //Si todo sale bien actualizamos el consecutivo

      $sql =  $this->db->query("UPDATE consecutivos SET Numero = ($NumConse) where id_consecutivo = 1");

      return $NumPedido;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function RegistrarPedido($array = null)
  {
    try {

      //Registramos el pedido

      $sql = "INSERT INTO pedidos(num_pedido,mesero,mesa,zona,fecha) VALUES ('$array[Consecutivo]','$array[Mesero]',($array[Mesa]),($array[IDzona]),'$array[Fecha]')";

      $query = $this->db->query($sql);

      //Ocupamos la mesa

      $sql2 = "UPDATE mesas SET numpedido = '$array[Consecutivo]' WHERE idzonas = ($array[IDzona]) and nummesa = ($array[Mesa])";

      $query2 = $this->db->query($sql2);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function RegistrarDetalle($array = null, $total = null){
    try {
      
      //Detalle del pedido

      $sql = "INSERT INTO detallepedido(num_pedido,producto,categoria,cantidad,precio,total) VALUES ('$array[Consecutivo]','$array[NombreProduc]','($array[Categoria])',($array[Cantidad]),$array[Precio],$total)";
      $query = $this->db->query($sql);

      

    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }

  public function MostrarCategorias()
  {
    try {
      $query = $this->db->query("SELECT * FROM categorias order by NombreCate	asc;");
      if ($query->num_rows() > 0) {
        return $query;
      } else {
        false;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function MostrarProductos()
  {
    try {
      $query = $this->db->query("SELECT * FROM producto order by NombreProducto asc;");
      if ($query->num_rows() > 0) {
        return $query;
      } else {
        false;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function MostrarCabeceraPedido($Consecutivo = null){
    try {

      $sql = "SELECT p.num_pedido, p.mesero, p.mesa, p.zona, z.nombre as nombreZona, p.fecha FROM pedidos as p, zonas as z
      WHERE p.num_pedido = '$Consecutivo' and p.zona = z.idzonas";

      $query=$this->db->query($sql);

      return $query->row();

    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }

  public function MostrarDetallePedido($Consecutivo = null){
    try {

      $sql = "SELECT * FROM detallepedido
      WHERE num_pedido = '$Consecutivo'";

      $query=$this->db->query($sql);

      if ($query->num_rows() > 0) {
        return $query;
      }else{
        return null;
      }
  

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  public function EliminarDetallePedido($IdDetallePedido = null, $Consecutivo = null)
  {
    try{
      
    $sql = "DELETE FROM detallepedido WHERE iddetalle_pedidos = '$IdDetallePedido' AND num_pedido='$Consecutivo';";


    $query = $this->db->query($sql);

    $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    if($bandera){
      return true;
    }else{
      return "No se pudo eliminar este producto del detalle del pedido";
    }

    }catch (Exception $e) {
      echo $e->getMessage();
    }

  }


    
  public function Confirmar_Pedido($Consecutivo = null, $mesa = null,  $idzona = null)
  {
    try{
      $bandera = FALSE;

      $sql = "UPDATE pedidos SET confirmado = true WHERE num_pedido = '$Consecutivo';";
      $query = $this->db->query($sql);
  
      $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  
  
      $query2 = $this->db->query("UPDATE mesas SET numpedido = '$Consecutivo' WHERE idzonas = '$idzona' AND nummesa = '$mesa' AND numpedido = 0;");
  
      $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  
      if($bandera == false){      
        return "Se presento un problema al confirmar el pedido";
      }else{    
        return true;
      }

    }catch (Exception $e) {
      echo $e->getMessage();
    }

  }

  public function MostrarPedidos()
  {
    $query = $this->db->query("SELECT * FROM pedidos_confirmados;");
    return $query;
  }
  public function MostrarPedidosAFacturar()
  {
    date_default_timezone_set('America/Bogota');
    $fecha_actual = Date("Y/m/d");
    $sql = "SELECT * FROM pedidos as p  WHERE p.fecha = '$fecha_actual' and p.confirmado = 1 and pagado = 0";
    $query = $this->db->query($sql);
    return $query;
  }





  public function Mostrarzonas()
  {

    $query = $this->db->query("SELECT * FROM zonas WHERE Habilitada = 1 order by nombre asc ;");
    return $query;
  }

  public function Mostrarmesas()
  {
    $query = $this->db->query("SELECT * FROM mesas;");
    return $query;
  }



}
