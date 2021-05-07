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

  public function RegistrarDetalle($array = null,$total){
    try {
      
      //Detalle del pedido

      $sql = "INSERT INTO detallepedido(num_pedido,producto,categoria,cantidad,precio,total) VALUES ('$array[Consecutivo]','$array[Mesero]',($array[Mesa]),($array[IDzona]),'$array[Fecha]')";

      $query = $this->db->query($sql);

    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }

  public function MostrarCategorias()
  {
    try {
      $query = $this->db->query("SELECT * FROM categorias;");
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
      $query = $this->db->query("SELECT * FROM producto;");
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


  public function registro_Detalle_Pedidos($producto = null, $precio = null, $cantidad = null, $num_factura = null, $categoria = null, $total = null)
  {
    $sql = "INSERT INTO detalle_pedidos(num_pedido,producto,tipo,cantidad,precio,total) VALUES ('$num_factura','$producto','$categoria','$cantidad','$precio','$total')";
    $query = $this->db->query($sql);
    redirect("" . base_url() . "index.php/mesero/recargar");
  }

  public function MostrarPedido($num_pedido = null)
  {
    $query = $this->db->query("SELECT * FROM detalle_pedidos as dp where dp.num_pedido=('$num_pedido')");
    if ($query->num_rows() > 0) {
      return $query;
    } else {
      false;
    }
  }
  public function eliminar_pedido($id = null, $num_pedido = null)
  {
    $sql = "DELETE FROM detalle_pedidos WHERE iddetalle_pedidos = '$id' AND num_pedido='$num_pedido';";
    $query = $this->db->query($sql);
    redirect("" . base_url() . "index.php/mesero/recargar");
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

    $query = $this->db->query("SELECT * FROM zonas;");
    return $query;
  }

  public function Mostrarmesas()
  {
    $query = $this->db->query("SELECT * FROM mesas;");
    return $query;
  }
  public function Confirmar_Pedido($num_pedido = null, $mesa = null,  $idzona = null)
  {
    $bandera = FALSE;

    $sql = "UPDATE pedidos SET confirmado = true WHERE num_pedido = '$num_pedido';";
    $query = $this->db->query($sql);
    $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;


    $query2 = $this->db->query("UPDATE mesas SET numpedido = '$num_pedido' WHERE idzonas = '$idzona' AND nummesa = '$mesa';");
    $bandera = ($this->db->affected_rows() > 0) ? TRUE : FALSE;

    if ($bandera == true) {
      redirect("" . base_url() . "index.php/inicie_sesion/carga_mesero");
    } else {
      redirect("" . base_url() . "index.php/inicie_sesion/carga_mesero");
    }
  }
}
