<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Model_Inicio extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }
  public function Inicio($usuario = null, $contrasena = null)
  {

    $sql = "SELECT * FROM usuario WHERE USER='$usuario' or correo = '$usuario';";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {

      $result =  $query->row();
      $hash = $result->pass;
      if (password_verify($contrasena, $hash)) {

        return 1;

      } else {

        return 0;

      }
    } else {

      return 0;

    }
  }
  public function con_usuario($usuario = null)
  {
    $sql = "SELECT u.id, u.user,u.pass, r.nombre_rol FROM usuario u, roles r
    WHERE u.id_rol = r.id_rol
    AND USER='$usuario';";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function cambia_con($usuario = null)
  {
    $sql = "SELECT COUNT(*) cuenta FROM usuario WHERE USER='$usuario';";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function act_usuario($usuario = null, $nueva_con = null)
  {
    $this->db->where('user', $usuario);
    $this->db->update('usuario', array('pass' => $nueva_con));
    echo "Su contraseña ha sido actualizada correctamente";
    $this->load->view('view_iniciesesion');
  }
  public function MostrarUsuarios()
  {
    $sql = "SELECT u.id,u.correo,u.user,u.pass,r.nombre_rol,u.genero,u.fecha_nacimiento
   FROM usuario u, roles r 
   where u.id_rol=r.id_rol;";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }
  public function modificar($id = null)
  {
    $sql = "SELECT u.id,u.correo,u.user,u.pass,r.nombre_rol,u.id_rol,u.genero,u.fecha_nacimiento FROM usuario u, roles r where u.id_rol=r.id_rol and u.id='$id';";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function modificar_registro($id = null, $usuario = null, $correo = null, $contrasena = null, $rol = null, $genero = null, $fecha = null)
  {
    $sql = "UPDATE usuario SET user='$usuario',pass='$contrasena',genero='$genero',fecha_nacimiento='$fecha',id_rol='$rol',correo='$correo' WHERE id ='$id' ;";
    $query = $this->db->query($sql);
    redirect("" . base_url() . "index.php/inicie_sesion/carga_admin");
  }
  public function eliminar_registro($id = null)
  {
    $sql = "DELETE FROM usuario where id='$id'";
    $query = $this->db->query($sql);
    redirect("" . base_url() . "index.php/inicie_sesion/carga_admin");
  }
}
