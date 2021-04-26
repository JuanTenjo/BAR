<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mostrar_productos extends CI_Model{

  function __construct(){
    parent::__construct();
  }
  public function MostrarCategorias(){
    $query = $this->db->query("SELECT * FROM categorias;");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }
  public function MostrarProductos(){
    $query = $this->db->query("SELECT * FROM productos;");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }
  public function MostrarZonas(){
    $query = $this->db->query("SELECT z.idzonas, z.nombre, count(m.idzonas) as numerodemesas FROM zonas as z, mesas as m where z.idzonas = m.idzonas Group by z.nombre;");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }
}
