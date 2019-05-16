<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Roles extends CI_Model {
  function __construct(){
    parent::__construct();
  }
  public function rol($usuario = null, $contrasena=null){
    session_start();
    if (isset($_SESSION["usuario"])) {
      if ($_SESSION["rol"]=="admin") {
        	$this->load->view('inicio');
      }
    }
  }
}
