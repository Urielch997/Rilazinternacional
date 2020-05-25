<?php
include "Credenciales.php";


class Conection
{
    private $con;
  
    public function setCon($var)
     {
         $this->con = $var;
     }

     public function getCon()
     {
         return $this->con;
     }
    public function conect()
    {
           
           $this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,DB);
         
           /*mysqli_query("SET NAMES 'utf8'");*/    
            if ($this->con->connect_errno) {
               
               
            }
            
           
      
    }
    public function close()
    {
            $this->con->close();
    }

    public function actualizarSession($id)
    {
        try{
            //instancia para conectar
            
            $conexion = new Conection();
            $conexion->conect();
            $conexion->getCon()->query("SET NAMES 'utf8'");
            $consultaSQL = "select nombre , idusuario,Perfil from usuarios where idusuario='".$id."';";
            $resultado = $conexion->getCon()->query($consultaSQL);
            $cant = mysqli_num_rows($resultado);//para saber cuantos registros trae una consulta
    
            if($cant == 1){
    
                while($fila = $resultado->fetch_assoc()){//es devolver la consulta en un arreglo asoociativo
                    $nombre = $fila["nombre"];//asigne a la variable nombre el nombre que viene de sql
                    $Perfil = $fila["Perfil"];//asigne a la variable nivel el numero de nivel de acceso de sql
                    $ID =  $fila["idusuario"];


                    
                }
                
    
                $_SESSION["user"]["nombre"]= $nombre;
                $_SESSION["user"]["Perfil"]= $Perfil;
                $_SESSION["user"]["ID"]= $ID;
                //header("location:../index.php");
                return $Perfil;
    
            }else{
              
               // header("location:../login.php?Fail");
            }
          
    
        }catch(Exeption $error){
    
        }
        return true;
    }


    public function seleccionar(){
        $dataTable=null;
        $this->conect();// select * from marca
        $sql="select publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tc.nombre as 'Tipo Contenido' ,m.nombre as 'Marca', ap.ruta
        from  publicacion
        inner join marca m on m.idMarca = publicacion.marca 
        inner JOIN tipocontenido tc on tc.idTipoContenido = publicacion.tipocontenido
        inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
        where ap.type='title';";
		$res= $this->getCon()->query($sql);
		$dataTable.="";
        while($fila=$res->fetch_assoc())
        {
            $dataTable.=
			"<div class='col-md-4 col-sm-6'>
				<div class='card video' style='height: 99%;'>
					<div class='card-title'>
							<img src='../img/".$fila['ruta']."' class='card-img-top img-title'  >
					</div>
					<div class='card-body'>
						<h5 class='card-title'>".$fila['titulo']."</h5>
						<p class='card-text'>".$fila['contenido']." </p>
						<p class='card-text'>".$fila['footer']."</p>
					</div>
					<div class='card-footer'>
						<a href='#' class='btn btn-primary'>Ir a Publicacion</a>
					</div>
				</div>
			</div>";
		}
        $dataTable.="";
        $this->close();
		return $dataTable;
    }


}
?>
		