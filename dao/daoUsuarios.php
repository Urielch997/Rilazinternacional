<?php
require_once "../controles/Connection.php";
include "../Models/Usuarios.php";
class daoUsuarios
{

    public function acess($username,$contra)
    {
        try{
            //instancia para conecta
            $db=conexion();
            $query = "SELECT * FROM usuarios WHERE username=:usuario or pass=:contra;";
            $consultar = $db->prepare($query);
            $consultar->execute(array(':usuario' =>$username, ':contra' => $contra));
            $row = $consultar->fetch(PDO::FETCH_ASSOC);

            $count=$consultar->rowCount();//para saber cuantos registros trae una consulta

            if($count==1){
              if($username == $row["username"] && $contra == $row["pass"]){
                //es devolver la consulta en un arreglo asoociativo
                    $nombre = $row["nombre"];//asigne a la variable nombre el nombre que viene de sql
                    $Perfil = $row["Perfil"];//asigne a la variable nivel el numero de nivel de acceso de sql
                    $ID =  $row["idusuario"];
                    $estado = $row["estado"];
                    if($estado == "ACTIVO"){
                    date_default_timezone_set('America/El_Salvador');
                    $dateInssert= date("Y-m-d h:i:s ", time());
                    $conexionInsert=conexion();
                    $consultaSQLI = "INSERT INTO hingreso (idusuario, fechaIngreso) VALUES (".$ID.", '".$dateInssert."')";
                    $stm = $conexionInsert->prepare($consultaSQLI);
                    $resultadoI= $stm->execute();



                    $_SESSION["user"]["nombre"]= $nombre;
                    $_SESSION["user"]["Perfil"]= $Perfil;
                    $_SESSION["user"]["ID"]= $ID;
                    //header("location:../index.php");
                    $msj = Array("mensaje" => "ok");
                  }else{
                    $msj = Array("mensaje" => "usuario inactivo");
                  }
                }else{
                   $msj = Array("mensaje" => "usuario o contraseña incorrecto");
                }

            }else{
              $msj = Array("mensaje" => "usuario no registrado");

            }

            echo json_encode($msj,JSON_FORCE_OBJECT);
        }catch(PDOException $error){
              echo "Error" .$error->getMessage();
        }
        return true;
    }


    public function listUsuariosMostrartext ($id)
    {
        try{
            $conexion =conexion();
            $consultaSQL = "SELECT usuarios.idusuario,usuarios.Perfil,usuarios.nombre,usuarios.username,usuarios.pass,
            usuarios.direccion,usuarios.numeroTelefono,usuarios.correoElectronico, p.idPerfil,p.nombre as perfilU
            from usuarios
            inner join Perfil p on p.idPerfil = usuarios.Perfil
            where usuarios.idusuario=  '".$id."'";
            $resultado = $conexion->prepare($consultaSQL);
            $resultado->execute();
            $cant = $resultado->rowCount();//para saber cuantos registros trae una consulta
            $dataUsu[]=null;
            $datahtmlusu = "";
            if($cant == 1){
                while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){//es devolver la consulta en un arreglo asoociativo

                    $datahtmlusu.="
                    <div id='textUsu' class='row'>
                      <div class='col-md-10'>
                          <label class='bmd-label-floating'>Nombre : <h4>".$fila['nombre']."</h4></label>
                          <input type='hidden' name='txtidUPro'  value='".$fila['idusuario']."' class='form-control' >
                      </div>
                      <div class='col-md-6'>
                          <label class='bmd-label-floating'>Username: <h4>".$fila['username']."</h4></label>
                      </div>
                      <div class='col-md-6'>
                          <label class='bmd-label-floating'>Pass: <h4>".$fila['pass']."</h4></label>
                      </div>
                      <div class='col-md-6'>
                        <label class='bmd-label-floating'>Direcci&oacute;n: <h4>".$fila['direccion']."</h4></label>
                      </div>
                      <div class='col-md-6'>
                        <label class='bmd-label-floating'>Telefono: <h4>".$fila['numeroTelefono']."</h4></label>
                      </div>
                      <div class='col-md-6'>
                        <label class='bmd-label-floating'>Correo Electronico: <h4>".$fila['correoElectronico']."</h4></label>
                      </div>
                      <div class='col-md-6'>
                        <label class='bmd-label-floating'>Perfil: <h4>".$fila['perfilU']."</h4></label>
                      </div>
                      </div>
                  </div>
                 ";

                }

            }else{}
        }catch(Exeption $error){}
        return $datahtmlusu;
    }

    public function listUsuariosTable()
    {
        try{
            $conexion=conexion();
            $consultaSQL = "SELECT usuarios.idusuario,usuarios.Perfil,usuarios.estado,usuarios.nombre,usuarios.username,usuarios.pass,
            usuarios.direccion,usuarios.numeroTelefono,usuarios.correoElectronico, p.idPerfil,p.nombre as perfilU
            from usuarios
            inner join Perfil p on p.idPerfil = usuarios.Perfil ;";
            $resultado = $conexion->prepare($consultaSQL);
            $resultado->execute();
            $cant = $resultado->rowCount();//para saber cuantos registros trae una consulta

            $returData = null;
              $returData .= "
              <center>
              <table class='table table-responsive table-hover'>
              <tr class='text-info'>
              <center><h5>Listado de Usuarios Registrados</h5></center>
              </tr>
                <tr class='text-info'>

                  <th>Nombre</th>
                  <th>Username</th>
                  <th>Passs</th>
                  <th>Numero Telefono</th>
                  <th>Direcci&oacute;n</th>
                  <th>Correo Electronico</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>";

                while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){//es devolver la consulta en un arreglo asoociativo
                  $returData.= "
                  <tr>

                  <td>".$fila['nombre']."</td>
                  <td>".$fila['username']."</td>
                  <td>". md5( $fila['pass'])."</td>
                  <td>".$fila['numeroTelefono']."</td>
                  <td>".$fila['direccion']."</td>
                  <td>".$fila['correoElectronico']."</td>
                  <td>".$fila['perfilU']."</td>";
                  if($fila['estado'] == "INACTIVO")
                  {
                    $returData.= "
                  <td  style='color: black';>
                  <a href=\"javascript:cargarActivar(
                    '".$fila['idusuario']."'
                    ,'".$fila['nombre']."'


                  );\">
                  <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#SeleccionarActivar'>
                  ".$fila['estado']."
                  </button>
                  </a>
                  </td>";
                  }else if($fila['estado'] == "ADMIN")
                  {
                    $returData.= " <td class='alert-primary'>ADMIN</td>";
                  }else{
                    $returData.= " <td >ACTIVO</td>";
                  }

                  $returData.= "

                  <td>
                    <a href=\"javascript:cargarAdmin(
                      '".$fila['idusuario']."'
                      ,'".$fila['nombre']."'
                      ,'".$fila['username']."'
                      ,'".$fila['numeroTelefono']."'
                      ,'".$fila['direccion']."'
                      ,'".$fila['correoElectronico']."'
                      ,'".$fila['idPerfil']."'

                    );\">
                      <button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#Seleccionar'>
                        Editar
                      </button>
                    </a>
                  </td>";
                }
                $returData.="
                </table>
                 </center>";


        }catch(Exeption $error){}
        return $returData;
    }
    public function listUsuarios($id)
    {
        try{
            $conexion =conexion();
            $consultaSQL = "SELECT usuarios.idusuario,usuarios.Perfil,usuarios.nombre,usuarios.username,usuarios.pass,
            usuarios.direccion,usuarios.numeroTelefono,usuarios.correoElectronico, p.idPerfil,p.nombre as perfilU
            from usuarios
            inner join Perfil p on p.idPerfil = usuarios.Perfil
            where usuarios.idusuario=  '".$id."'";
            $resultado = $conexion->prepare($consultaSQL);
            $resultado->execute();
            $cant = $resultado->rowCount();//para saber cuantos registros trae una consulta
            $dataUsu[]=null;
            $datahtmlusu = "";
            if($cant == 1){
                while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){//es devolver la consulta en un arreglo asoociativo

                    $datahtmlusu.="
                    <div class='row'>
                    <div class='col-md-10'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Nombre</label>
                        <input type='text' name='txtnombre'  value='".$fila['nombre']."' class='form-control'>
                        <input type='hidden' name='txtidUPro'  value='".$fila['idusuario']."' class='form-control' >


                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Username</label>
                        <input type='text' name='txtusername'  value='".$fila['username']."' class='form-control'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Password</label>
                        <input type='password' name='txtpass'  value='".$fila['pass']."' class='form-control'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Direccion</label>
                        <input type='text' name='txtdireccion'  value='".$fila['direccion']."' class='form-control'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Telefono</label>
                        <input type='text' name='txtnumtelefono'  value='".$fila['numeroTelefono']."' class='form-control'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='bmd-label-floating'>Correo Electronico</label>
                        <input type='text' name='txtcoreeo'  value='".$fila['correoElectronico']."' class='form-control'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <div class='form-group'>

                        <input type='hidden' name='txtPerfilU'  value='".$fila['Perfil']."' class='form-control'>
                      </div>
                    </div>

                    </div>
                  </div>
                 ";

                }

            }else{}
        }catch(Exeption $error){}
        return $datahtmlusu;
    }


    public function listarPerfil()
        {
            $conecPerfil =conexion();
            $sql="select idPerfil,nombre from perfil;";
            $resultadoRes = $conecPerfil->prepare($sql);
            $resultadoRes->execute();
            $returData = null;
              $returData = "<select name='selPerfil' class='form-control'>";
            while($datosMarca = $resultadoRes->fetch(PDO::FETCH_ASSOC))
            {
                $returData.= "<option class='dropdown-item'  value='".$datosMarca['idPerfil']."'>".$datosMarca['nombre']."</option>";
            }

            $returData .="</select>";

            return $returData;
        }

        public function listPerfil($id)
        {
            try{
                //instancia para conectar

                $conexion =conexion();
                $consultaSQL = "SELECT usuarios.idusuario,usuarios.nombre,usuarios.correoElectronico , p.nombre as perfil  FROM `usuarios`
                inner join  Perfil p on p.idPerfil = usuarios.Perfil
                WHERE idusuario ='".$id."'";
                $resultado = $conexion->prepare($consultaSQL);
                $r = $stm->execute();
                $cant = $resultado->rowCount();//para saber cuantos registros trae una consulta
                $dataUsu[]=null;
                $datahtmlusu = "";
                if($cant == 1){

                    while($fila = $r->fetch(PDO::FETCH_ASSOC)){//es devolver la consulta en un arreglo asoociativo



                        $datahtmlusu.="
                        <div class='card card-profile'>
                        <div class='card-body'>
                          <h6 class='card-category text-gray'>id: ".$fila['idusuario']."</h6>
                          <h4 class='card-title'>".$fila['nombre']."</h4>
                          <p class=''>
                          ".$fila['correoElectronico']."
                          </p>
                          <h5>perfil:</h5>
                          <hr>
                          <p class='btn btn-primary btn-round'>".$fila['perfil']."</p>
                        </div>
                      </div>";

                    }



                    //header("location:../index.php");


                }else{

                   // header("location:../login.php?Fail");
                }
            }catch(Exeption $error){

            }
            return $datahtmlusu;
        }


        public function modificar($usu){
          $conexion =conexion();
            $sql="UPDATE usuarios
            SET nombre = '".$usu->getNombreusuario()."', username = '".$usu->getUsername()."',
            pass = '".$usu->getPass()."', direccion = '".$usu->getDireccion()."',
            numeroTelefono = '".$usu->getNumTelefono()."',correoElectronico = '".$usu->getCorreoElectronico()."' ,
            Perfil= ".$usu->getperfil()."  WHERE usuarios.idusuario = ".$usu->getIdUsuario().";";
              $stm= $conexion->prepare($sql);
              $stm->execute();
        }
        public function modificarnoPass($usu){
          $conexion =conexion();
            $sql="UPDATE usuarios
            SET nombre = '".$usu->getNombreusuario()."', username = '".$usu->getUsername()."',
            direccion = '".$usu->getDireccion()."',
            numeroTelefono = '".$usu->getNumTelefono()."',correoElectronico = '".$usu->getCorreoElectronico()."' ,
            Perfil= ".$usu->getperfil()."  WHERE usuarios.idusuario = ".$usu->getIdUsuario().";";
            $stm =  $conexion->prepare($sql);
            $stm->execute();

        }

        public function eliminarUsu($usu){

            $conexion =conexion();
            $sql="UPDATE usuarios SET estado = 'INACTIVO' WHERE usuarios.idusuario= ".$usu->getIdUsuario()." AND estado !='ADMIN';";
            $stm =$conexion->prepare($sql);
            $stm->execute();
        }
        public function activarUsu($usu){

          $conexion =conexion();
          $sql="UPDATE usuarios SET estado = '' WHERE usuarios.idusuario= ".$usu->getIdUsuario().";";
          $stm = $conexion->prepare($sql);
          $stm->execute();
      }


        public function ingresar($usu){
          $conexion=conexion();
            $sql="INSERT INTO `usuarios`(`idusuario`, `Perfil`, `nombre`, `username`, `pass`,
             `direccion`, `numeroTelefono`, `correoElectronico`)
             VALUES ('0', '".$usu->getperfil()."', '".$usu->getNombreusuario()."',
             '".$usu->getUsername()."', '".$usu->getPass()."', '".$usu->getDireccion()."',
              '".$usu->getNumTelefono()."', '".$usu->getCorreoElectronico()."');"
              ;
            $stm = $conexion->prepare($sql);
            $stm->execute();

        }

        public function seletListuser(){
          $cn = conexion();
          $stm = $cn->prepare("SELECT idusuario,nombre FROM usuarios");
          $stm->execute();
          while($r = $stm->fetch(PDO::FETCH_ASSOC)){
              echo "<option value=".$r['idusuario'].">".$r['nombre']."</option>";
          }
        }


}

?>
