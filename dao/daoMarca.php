<?php
require_once "../controles/Connection.php";
include "../Models/Marca.php";
class daoMarca
{
  public function modificar($mar){
    $conecMarca=conexion();
		$sql="update marca set nombre='".$mar->getNombreMarca()."' where idMarca=".$mar->getIdMarca().";";
    $resultado = $conecMarca->prepare($sql);
		if ($resultado->execute()) {

			//echo "Ocurrio un error(".$this->con->error.")";
			return false;
		}else{

			return true;
		}


  }

  public function eliminar($mar){
    $conecMarca=conexion();
		$sql="delete from marca where idMarca=".$mar->getIdMarca().";";
    $resultado=$conecMarca->prepare($sql);
		if ($resultado->execute()) {
			return false;
		}else{

			return true;
		}


  }


	public function insertar($mar){
    $conecMarca =conexion();
		$sql="INSERT into marca (nombre) VALUES ('".$mar->getNombreMarca()."');";
    $resultado=$conecMarca->prepare($sql);
		if ($resultado->execute()) {

			//echo "Ocurrio un error(".$this->con->error.")";
			return false;
		}else{

			return true;
		}



	}
        public function listarMarcas()

        {
            $conecMarca =conexion();
            $sql="select idMarca,nombre from marca;";
            $resultadoRes = $conecMarca->prepare($sql);
            $resultadoRes->execute();
            $returData = null;
              $returData .= "
                <center><h5>Listado de marcas Registradas</h5></center>
              <table class='table table-responsive table-hover col-md-12'>
                <tr class='text-info'>
                  <th class='col-md-2'>ID de Marca</th>
                  <th class='col-md-5'>Nombre</th>
                  <th class='col-md-5'>Opciones</th>
                </tr>";
            while($datosMarca = $resultadoRes->fetch(PDO::FETCH_ASSOC))
            {
                $returData.= "<tr'>
                <td>".$datosMarca['idMarca']."</td>
                <td>".$datosMarca['nombre']."</td>
                <td>
                  <a href=\"javascript:cargar('".$datosMarca['idMarca']."','".$datosMarca['nombre']."');\">
                    <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#Seleccionar'>
                      Seleccionar
                    </button>
                  </a>
                </td>
                </tr>";
            }
            $returData.="</table>";



            return $returData;
        }

        public function getMarcaSelect(){
          try{
            $cn=conexion();
            $stm = $cn->prepare("SELECT * FROM marca");
            $stm->execute();
            $op = "";
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
              $op .="<option value=".$row['idMarca'].">".$row['nombre']."</option>";
            }

            echo $op;
          }catch(PDOException $e){

          }
        }

}



?>
