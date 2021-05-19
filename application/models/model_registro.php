<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Registro extends CI_Model{

  function __construct(){
    parent::__construct();
  }

  public function RegistroUser($user=null,$pass=null,$correo=null,$genero=null,$fecha_nacimiento=null){

    //Falta hacer varias validaciones aun

    $sql= "INSERT INTO usuario(user,pass,correo,genero,fecha_nacimiento) VALUES ('$user','$pass','$correo','$genero','$fecha_nacimiento')";
    $query=$this->db->query($sql);
    

  }

}
