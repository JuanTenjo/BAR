<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Admin extends CI_Model{

  function __construct(){
    parent::__construct();
  }

	//PRODUCTOS 


  public function MostrarProductos(){
    $query = $this->db->query("SELECT p.ID_Producto, p.ID_Categoria, c.NombreCate, p.NombreProducto, p.Ingredientes, p.Cantidad, p.Precio
															FROM producto as p, categorias as c
															WHERE p.ID_Categoria = c.ID_Categoria
															ORDER BY NombreProducto asc");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }

	public function RegistraProducto($categoriaProducto = null,$nombreProducto = null,$ingredientesProducto = null,$precioProducto = null,$cantidadProducto = null){

		$sql= "INSERT INTO producto(ID_Categoria,NombreProducto,Ingredientes,Cantidad,Precio) VALUES ('$categoriaProducto','$nombreProducto','$ingredientesProducto','$cantidadProducto','$precioProducto')";
		$query=$this->db->query($sql);

		redirect("".base_url()."index.php/Administrador/Productos");

	}

	public function ActualizarProducto($array = null){

		$sql = "UPDATE producto SET ID_Categoria = ($array[IDCategoria]) ,NombreProducto = ('$array[NombreProduc]'),Ingredientes = ('$array[Ingredientes]'),Cantidad = ('$array[Cantidad]'),Precio = ($array[Precio]) WHERE ID_Producto = ($array[IDProducto])";

		$query = $this->db->query($sql);

		redirect("".base_url()."index.php/Administrador/Productos");
		
	}

	public function EliminarProducto($ID_Producto = null){

		$sql= "DELETE FROM producto WHERE ID_Producto = ('$ID_Producto') ";
		$query=$this->db->query($sql);

		redirect("".base_url()."index.php/Administrador/Productos");
	}


	public function MostrarCategorias(){
    $query = $this->db->query("SELECT ID_Categoria, NombreCate, DescripcionCate  FROM categorias ORDER BY NombreCate ASC");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }

	
	public function RegistraCategoria($nombreCategoria = null,$descripcionCategoria = null){

		$sql= "INSERT INTO categorias(NombreCate,DescripcionCate) VALUES ('$nombreCategoria','$descripcionCategoria')";
		$query=$this->db->query($sql);

		redirect("".base_url()."index.php/Administrador/Categorias");
	}

  public function ActualizarCategoria($array = null){
    try{

      $sql = "UPDATE categorias SET NombreCate = ('$array[NombreCate]'), DescripcionCate = ('$array[Descripcion]') WHERE ID_Categoria = ($array[IDCategoria])";

      $query = $this->db->query($sql);
  
      redirect("".base_url()."index.php/Administrador/Categorias");
      
		}catch(Exception $e){ 
      echo $e->getMessage();
		}
  }

	
	public function EliminarCategoria($ID_Categoria = null){
    try{
      
      $ValProduc = "SELECT COUNT(ID_Producto) as CantidadProduc FROM categorias AS C, producto AS P WHERE C.ID_Categoria = P.ID_Categoria AND C.ID_Categoria  = ('$ID_Categoria')";

      $Val1 = $this->db->query($ValProduc);
  
      $result = $Val1->row();
  
      $CantidadProductos = $result->CantidadProduc;
  
      if($CantidadProductos > 0){
          echo "Lo siento pero esta categoria tiene " . $CantidadProductos . " productos registrados, por lo tanto no se puede eliminar.";
          echo "<br>";
          echo "Primero elimine los productos asociados a esta categoria.";
      }else{
  
        $sql= "DELETE FROM categorias WHERE ID_Categoria = ('$ID_Categoria') ";
        $query=$this->db->query($sql);
        redirect("".base_url()."index.php/administrador/Categorias");
      }
    }catch(Exception $e){ 
			echo $e->getMessage();
		}
	}

	
  public function MostrarMesas(){
    $query = $this->db->query("SELECT z.idzonas, z.nombre, z.numMesas FROM zonas as z WHERE Habilitada = 1 order by z.nombre asc");
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      false;
    }
  }

	public function RegistrarZona($NombreZona=null,$NumeroMesas=null,$id_zona=null){

    $bandera = 0;

    $sql = "INSERT INTO zonas(nombre,numMesas) VALUES ('$NombreZona','$NumeroMesas')";

    $query=$this->db->query($sql);

		$sql2 = "SELECT idzonas, numMesas FROM zonas WHERE nombre = ('$NombreZona')";
    $query2=$this->db->query($sql2);
		$result = $query2->row();

		$IdZona = $result->idzonas;

    $bandera = 1;

   	if ($bandera == 1){
      $i = 0;
      for($i = 1; $i <= $NumeroMesas; $i++){
        $sql = "INSERT INTO mesas(idzonas,nummesa) VALUES ('$IdZona','$i')";
        $query=$this->db->query($sql);  
      }
      redirect("".base_url()."index.php/administrador/Mesas");
    }   
  }

	public function Eliminarzona($ID_Zonas = null){
    try{

      //En la tabla de mesas se eliminaran automaticamente por que tiene una llave foranea en cascada
      $Val =  $this->db->query("SELECT count(m.idzonas) as MesasOcupadas
                                FROM zonas AS z, mesas AS m 
                                WHERE z.idzonas = m.idzonas AND m.idzonas = ($ID_Zonas) and m.numpedido <> 0");

      $result = $Val->row();
      
      $MesasOcupada = $result->MesasOcupadas;

      if($MesasOcupada > 0){
        echo "No puedes anular esta zona porque una de sus mesas tiene un pedido pendiente";
      }else{

        $query = $this->db->query("UPDATE zonas SET Habilitada = false where idzonas = ('$ID_Zonas')");

        $query4 = $this->db->query("DELETE FROM mesas where idzonas = ('$ID_Zonas') and numpedido = 0");

        redirect("".base_url()."index.php/administrador/Mesas");
      }

    }catch(Exception $e){ 

			echo $e->getMessage();

		}

  }







}
