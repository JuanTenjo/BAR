<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Registro extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function registro($user=null,$pass=null){
    $sql= "INSERT INTO usuario(user,pass) VALUES ('$user','$pass')";
    $query=$this->db->query($sql);
    echo "Su registro esta completo, Ya puedes iniciar Sesion";
  }
}
