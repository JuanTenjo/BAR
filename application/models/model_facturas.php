
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_facturas extends CI_Model {
  function __construct(){
    parent::__construct();
  }
  

  public function Mostrar_Detalle($num_pedido = null){
      $sql = "SELECT detallepedido.*, pedidos.mesa, pedidos.zona 
      FROM detallepedido LEFT JOIN pedidos ON detallepedido.num_pedido = pedidos.num_pedido
      WHERE detallepedido.num_pedido = '$num_pedido'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        return $query;
      }else{
        false;
      }
  }

  public function Facturar($num_pedido){
  
    $this->db->query("UPDATE pedidos SET pagado = 1 WHERE num_pedido = '$num_pedido'");

    $this->db->query("UPDATE mesas SET numpedido = 0 WHERE numpedido = '$num_pedido'");

  }

  public function MostrarHistorialDePedidos(){
    $sql = "SELECT * FROM pedidos where confirmado = 1 and pagado = 1";
    $query = $this->db->query($sql);
    return $query;
  }

  public function MostrarPedidosPendiente(){
    date_default_timezone_set('America/Bogota');
    $fecha_actual = Date("Y/m/d");
    $sql = "SELECT * FROM pedidos where confirmado = 1 and pagado = 0 and fecha < '$fecha_actual'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function MostrarConFiltro($sql = null){
    $query = $this->db->query($sql);
    return $query;
  }

  public function MostrarDatosFacturaRealizada($num_pedido = null){
    $sql = "SELECT num_pedido, mesero, mesa, zona, fecha FROM pedidos WHERE num_pedido = '$num_pedido'";
    $query=$this->db->query($sql);
    return $query->row();
  }

}
