<?php
include "Connection.php";
include "../Models/Restricciones.php";
class daoRestricciones extends Conection
{
    public function listPublicaciones($perfil)
    {
        try{
            //instancia para conectar
            $conexion = new Conection();
            $conexion->conect();
            $consultaSQL = "SELECT * FROM restricciones WHERE perfil=".$perfil." AND identificador NOT IN('menu')";
            $resultadoRes = $conexion->getCon()->query($consultaSQL);
            $restriccionPerfil="";
            $tabla_DB="";
            $restriccionTabla="";
            /**esta  sera la base que segun los criterios se transformara en una consulta que
             * devuelva solo las publicaciones cada perfil pude ver
             */
            $sql ="SELECT publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            FROM  publicacion
            INNER JOIN marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' ";
                while($filaRes = $resultadoRes->fetch_assoc()){
                    $conexionPerfil = new Conection();
                    $conexionPerfil->conect();
                    $consultaPerfiles ="select * from perfil";
                    $resultadoPerfiles = $conexionPerfil->getCon()->query($consultaPerfiles);
                    while($filaPerfil = $resultadoPerfiles->fetch_assoc())
                    {
                        if($filaRes['perfil'] == $filaPerfil['idPerfil'])
                        {
                            $restriccionPerfil = $filaRes['perfil'];
                            break 1;
                        }
                    }
                    $conexiontabla = new Conection();
                    $conexiontabla->conect();
                    $consultaTabla = "select * from ".$filaRes['identificador'].";";
                    $resultadoTabla = $conexiontabla->getCon()->query($consultaTabla);
                    while($filaTabla = $resultadoTabla->fetch_assoc() )
                    {
                        if($filaRes['identificador'] == "marca")
                        {
                            $tabla_DB= $filaRes['identificador'];
                            if( $filaRes['idTabla'] == $filaTabla['idMarca'])
                            {
                                $restriccionTabla = $filaRes['idTabla'];
                                //echo " este es el id de la marca: ".$filaTabla['idMarca']."<br>";
                                //echo " este es el id de guardado en restricciones: ".$filaRes['idTabla']."";

                                $sql.=" and marca.idMarca != ".$filaRes['idTabla'] ;
                                //echo $sql;
                                break 1;
                            }
                        }
                        if($filaRes['identificador'] == "tipocontenido")
                        {
                            $tabla_DB= $filaRes['identificador'];
                            if( $filaRes['idTabla'] == $filaTabla['idTipoContenido'])
                            {
                                $restriccionTabla = $filaRes['idTabla'];
                                //echo "este es el id del tipocontenido: ".$filaTabla['idTipoContenido']."<br>";
                                //echo " este es el id de guardado en restricciones: ".$filaRes['idTabla']."";
                                $sql.=" and tipocontenido.idTipoContenido != ".$filaRes['idTabla'];
                                //echo $sql;
                                break 1;
                            }
                        }
                    }
                    $conexiontabla->close();
                    $conexionPerfil->close();
                }
                /**devolviendo las publicaciones que si pueden ver */
                $dataTable=null;
                $conexionPublica = new Conection();
                $conexionPublica->conect();
                $res= $conexionPublica->getCon()->query($sql);
                $dataTable.="";
                while($fila=$res->fetch_assoc())
                {
                    $dataTable.=
                    "<div class='col-md-4 col-sm-6'>
                        <div class='card video'>
                            <div class='card-title'>
                                    <img src='../img/".$fila['ruta']."' class='card-img-top img-title'  >
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>".$fila['titulo']."</h5>
                                <p class='card-text'>".$fila['footer']."</p>
                            </div>
                            <div class='card-footer'>
                            <form action='../Views/viewPublication.php' method='GET'>

                            <button type='submit' name='idPublicacion' value='".$fila['idPublicacion']."' class='btn btn-primary'>Ir a Publicacion</button>
                            </form>
                                </div>
                        </div>
                    </div>";
                }
                $dataTable.="";
                $conexionPublica->close();
               //echo $sql;
                $conexion->close();
          return $dataTable;
        }catch(Exeption $error){

        }
    }
    public function mostrarRestricciones()
    {
         try
        {
              //instancia para conectar
        $conexion = new Conection();
        $conexion->conect();
        $consultaSQL = "SELECT * FROM restricciones";
        $data=null;
        $perfil=null;
        if($resultadoRes = $conexion->getCon()->query($consultaSQL))
        {
            while($filaRes = $resultadoRes->fetch_assoc())
            {
                $conexionPerfil = new Conection();
                $conexionPerfil->conect();
                $consultaPerfiles ="SELECT * FROM perfil WHERE idPerfil= ".$filaRes['perfil'];
                $resultadoPerfiles = $conexionPerfil->getCon()->query($consultaPerfiles);


                    while($filaPerfil = $resultadoPerfiles->fetch_assoc())
                    {
                     $perfil = $filaPerfil['nombre'];
                    }


                $conexionPerfil->close();
                if($filaRes['identificador'] == "tipocontenido" || $filaRes['identificador'] == "marca"){
                $data.=
                "<div class='col-md-4 col-sm-6'>
                    <div class='card video'>
                        <div class='card-title'>
                            <center><h3 style='color:red;' >  Restricci&oacute;n </h3></centter>
                        </div>
                        <div class='card-body'>
                        <center>";
                        $conexiontabla = new Conection();
                        $conexiontabla->conect();

                        $consultaTabla = "SELECT * FROM ".$filaRes['identificador'].";";
                        $resultadoTabla = $conexiontabla->getCon()->query($consultaTabla);
                        while($filaTabla = $resultadoTabla->fetch_assoc() )
                        {
                            if($filaRes['identificador'] == "marca")
                            {
                                if( $filaRes['idTabla'] == $filaTabla['idMarca'])
                                {
                                $data.=$perfil."<br>
                                <i class='material-icons'>visibility_off</i><br>
                                    ".$filaTabla['nombre'];
                                    $footer = "Marca";
                                }
                            }
                            if($filaRes['identificador'] == "tipocontenido")
                            {
                                if( $filaRes['idTabla'] == $filaTabla['idTipoContenido'])
                                {
                                    $data.="".$perfil."<br>
                                    <i class='material-icons'>visibility_off</i><br>".$filaTabla['nombre'];
                                    $footer = "Tipo de Publicaci&oacute;n";
                                }
                            }
                        }
                        $conexiontabla->close();

                        $data.="</center>
                        </div>
                        <div class='card-footer'>
                            <h5>Por: $footer</h5> <h5> ID: ".$filaRes['idConfig']."
                        </div>
                    </div>
                </div>
                ";
                  }
            }


        }
        else
        {
            $data = null;
        }

         return $data;
        }catch(Exeption $error)
        {
        }
    }
    public function mostrarRestriccionesCheckBox()
    {
         try
        {
              //instancia para conectar
         $conexion = new Conection();
         $conexion->conect();
         $consultaSQL = "select * from restricciones ";
         $resultadoRes = $conexion->getCon()->query($consultaSQL);
            $data=null;
            $perfil=null;
            while($filaRes = $resultadoRes->fetch_assoc())
            {
                $conexionPerfil = new Conection();
                $conexionPerfil->conect();
                $consultaPerfiles ="select * from perfil where idPerfil= ".$filaRes['perfil'];
                $resultadoPerfiles = $conexionPerfil->getCon()->query($consultaPerfiles);
                while($filaPerfil = $resultadoPerfiles->fetch_assoc())
                {
                    $perfil = $filaPerfil['nombre'];
                }
                $conexionPerfil->close();
                $data.=
                "<div class='col-md-4 col-sm-6'>
                    <div class='card video' style='height: 99%;color:red;'>
                        <div class='card-title'>
                            <center><h3 style='color:red;' >  Restricci&oacute;n </h3></centter>
                        </div>
                        <div class='card-body'>
                        <center>";
                        $conexiontabla = new Conection();
                        $conexiontabla->conect();
                        $consultaTabla = "select * from ".$filaRes['identificador'].";";
                        $resultadoTabla = $conexiontabla->getCon()->query($consultaTabla);
                        while($filaTabla = $resultadoTabla->fetch_assoc() )
                        {
                            if($filaRes['identificador'] == "marca")
                            {
                                if( $filaRes['idTabla'] == $filaTabla['idMarca'])
                                {
                                $data.=$perfil."<br>
                                <i class='material-icons'>visibility_off</i><br>
                                    ".$filaTabla['nombre'];
                                    $footer = "Marca";
                                }
                            }
                            if($filaRes['identificador'] == "tipocontenido")
                            {
                                if( $filaRes['idTabla'] == $filaTabla['idTipoContenido'])
                                {
                                    $data.="".$perfil."<br>
                                    <i class='material-icons'>visibility_off</i><br>".$filaTabla['nombre'];
                                    $footer = "Tipo de Publicaci&oacute;n";
                                }
                            }
                        }
                        $conexiontabla->close();
                        $data.="</center>
                        </div>
                        <div class='card-footer'>
                            <h5>Por: $footer</h5>
                        </div>
                    </div>
                </div>
                ";
            }
        return $data;
        }catch(Exeption $error)
        {
        }
    }
    public function insertarRestrccion($objRes,$arrarMarca,$arrayTC)
        {
            /**eliminamos los registros anteriores */
            $conecMarcaDelete = new Conection();
            $conecMarcaDelete->conect();
            $sqlMDelke="delete from restricciones WHERE perfil = '".$objRes->getPerfil()."';";
            $resultadoResDelete = $conecMarcaDelete->getCon()->query($sqlMDelke);
            $conecMarcaDelete->close();
            /** */
            $conexion = new Conection();
            $conexion->conect();
            try{
               /**conectando con  la tabla marca */
                $conecMarca = new Conection();
                $conecMarca->conect();
                $sqlM="select idMarca,nombre from marca;";
                $resultadoRes = $conecMarca->getCon()->query($sqlM);
                /**array para guardar los datos de las tablas marca*/
                $insertarratM[] = null;
                $insertarratMvalidate[]=null;
                /**array para guardar los datos de las tablas TipoContenido*/
                $insertarratTC[] = null;
                $insertarratTCvalidate[]=null;
                /**conectando con la tabla Tipo de Contenido */
                $conecTipo = new Conection();
                $conecTipo->conect();
                $sqlTC="select idTipoContenido,nombre from tipocontenido;";
                $resultadoTC = $conecTipo->getCon()->query($sqlTC);
               if($arrayTC!=null)
               {
                    while($datosTC = $resultadoTC->fetch_assoc())
                    {
                        foreach($arrayTC as $selected)
                        {
                            if($selected == $datosTC['idTipoContenido'])
                            {
                                if (array_key_exists($datosTC['idTipoContenido'], $insertarratTC))
                                {}
                                else
                                {
                                    array_push($insertarratTC,$datosTC['idTipoContenido']);

                                }
                            }
                            else
                            {
                                if (array_key_exists($datosTC['idTipoContenido'], $insertarratTCvalidate))
                                {}
                                else
                                {
                                    array_push($insertarratTCvalidate,$datosTC['idTipoContenido']);
                                }
                            }
                        }
                    }
                $conecTipo->close();
                $resultadoTC = array_diff($insertarratTCvalidate,$insertarratTC);
                foreach($resultadoTC as $selected)
                {
                   $consultaSQL="Insert into restricciones (identificador,perfil,idTabla) values('tipocontenido','".$objRes->getPerfil()."','".$selected."');";
                    $resultadoTC = $conexion->getCon()->query($consultaSQL);
                }
               }
               else{

               }
               if($arrarMarca!=null)
               {
                    while($datosMarca = $resultadoRes->fetch_assoc() )
                    {

                        foreach($arrarMarca as $selected)
                        {
                            if($selected == $datosMarca['idMarca'])
                            {
                                if (array_key_exists($datosMarca['idMarca'], $insertarratM))
                                {}
                                else
                                {
                                    array_push($insertarratM,$datosMarca['idMarca']);
                                }
                            }
                            else
                            {
                                if (array_key_exists($datosMarca['idMarca'], $insertarratMvalidate))
                                {}
                                else
                                {
                                    array_push($insertarratMvalidate,$datosMarca['idMarca']);
                                }
                            }
                        }
                    }
                $conecMarca ->close();
                $resultadoM = array_diff($insertarratMvalidate,$insertarratM);
                foreach($resultadoM as $selected)
                {
                    $consultaSQL="Insert into restricciones (identificador,perfil,idTabla) values('marca','".$objRes->getPerfil()."','".$selected."');";
                    $resultadoRes = $conexion->getCon()->query($consultaSQL);

                }

               }
               else{

                }
                return true;

            }catch(Exeption $error)
            {
                return false;
            }
            $conexion->close();
        }





    public function listarMarcas($nPerfil)
    {

            $conecMarca = new Conection();
            $conecMarca->conect();
            $sql="select marca.nombre, marca.idMarca, p.idPerfil, r.perfil from marca
            INNER JOIN restricciones r on r.idTabla = marca.idMarca
            INNER JOIN perfil p on  p.idPerfil = r.perfil
            where r.identificador = 'marca' and r.perfil = ".$nPerfil."
            ;";
            $resultadoRes = $conecMarca->getCon()->query($sql);
            $arrayMarca[]=null;
            $arrayMarcaall[]=null;
            $returData = null;
              $returData = "";
            while($datosMarca = $resultadoRes->fetch_assoc() )
            {
                array_push($arrayMarca,$datosMarca['idMarca']);
                $conecMarcaall = new Conection();
                $conecMarcaall->conect();
                $sqlall="select * from marca;";
                $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
                while($datosMarcaall = $resultadoResall->fetch_assoc())
                {
                    if($datosMarca['idMarca'] == $datosMarcaall['idMarca'])
                    {

                        $returData.= "
                        <div class='custom-control custom-checkbox'>
                          <input type='checkbox' class='custom-control-input' id='defaultChecked".$datosMarcaall['idMarca']."' name='checkboxvar[]' value='".$datosMarcaall['idMarca']."'>
                          <label class='custom-control-label' for='defaultChecked".$datosMarcaall['idMarca']."'></label>
                          <label>".$datosMarcaall['nombre']."</label>
                        </div>";
                    break;
                    }
                }

                $conecMarcaall->close();
            }

                $conecMarcaall = new Conection();
                $conecMarcaall->conect();
                $sqlall="select * from marca;";
                $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
                while($datosMarcaall = $resultadoResall->fetch_assoc())
                {
                    array_push($arrayMarcaall,$datosMarcaall['idMarca']);
                }
                $conecMarcaall->close();
                $resultadoM = array_diff($arrayMarcaall,$arrayMarca);
                foreach($resultadoM as $selected)
                {

                    $conecMarcaall = new Conection();
                    $conecMarcaall->conect();
                    $sqlall="select * from marca where idMarca = ".$selected.";";
                    $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
                    while($datosMarcaall = $resultadoResall->fetch_assoc())
                    {
                        $returData.= "
                        <div class='custom-control custom-checkbox'>
                          <input type='checkbox' class='custom-control-input' id='defaultChecked".$datosMarcaall['idMarca']."' checked='checked' name='checkboxvar[]' value='".$datosMarcaall['idMarca']."'>
                          <label class='custom-control-label' for='defaultChecked".$datosMarcaall['idMarca']."'></label>
                          <label>".$datosMarcaall['nombre']."</label>
                        </div>";
                    }
                    $conecMarcaall->close();


                }


            $returData .="";
            $conecMarca->close();
            return $returData;
        }

        public function listarTipocontenido($nPerfil)
        {
            $conecTipo = new Conection();
            $conecTipo->conect();
            $sql="select tipocontenido.nombre, tipocontenido.idTipoContenido, p.idPerfil, r.perfil from tipocontenido
            INNER JOIN restricciones r on r.idTabla = tipocontenido.idTipoContenido
            INNER JOIN perfil p on  p.idPerfil = r.perfil
            where r.identificador = 'tipocontenido' and r.perfil  = ".$nPerfil."
            ;";
            $resultadoRes = $conecTipo->getCon()->query($sql);
            $arrayMarca[]=null;
            $arrayMarcaall[]=null;
            $returData = null;
              $returData = "";
            while($datosTipoContenido = $resultadoRes->fetch_assoc() )
            {

                array_push($arrayMarca,$datosTipoContenido['idTipoContenido']);
                $conecMarcaall = new Conection();
                $conecMarcaall->conect();
                $sqlall="SELECT * FROM tipocontenido;";
                $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
                while($datosTipoContenidoall = $resultadoResall->fetch_assoc())
                {
                    if($datosTipoContenido['idTipoContenido'] == $datosTipoContenidoall['idTipoContenido'])
                    {
                        $returData.= "
                        <div class='custom-control custom-checkbox'>
                          <input type='checkbox' class='custom-control-input' id='tipcont".$datosTipoContenido['idTipoContenido']."' name='checkboxvarTC[]' value='".$datosTipoContenido['idTipoContenido']."'>
                          <label class='custom-control-label' for='tipcont".$datosTipoContenido['idTipoContenido']."'></label>
                          <label>'".$datosTipoContenido['nombre']."'</label>
                        </div>";
                    break;
                    }
                }

                $conecMarcaall->close();

            }
            $conecMarcaall = new Conection();
            $conecMarcaall->conect();
            $sqlall="select * from tipocontenido;";
            $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
            while($datosTipoContenido = $resultadoResall->fetch_assoc())
            {
                array_push($arrayMarcaall,$datosTipoContenido['idTipoContenido']);
            }
            $conecMarcaall->close();
            $resultadoM = array_diff($arrayMarcaall,$arrayMarca);
            foreach($resultadoM as $selected)
            {

                $conecMarcaall = new Conection();
                $conecMarcaall->conect();
                $sqlall="select * from tipocontenido where idTipoContenido = ".$selected.";";
                $resultadoResall = $conecMarcaall->getCon()->query($sqlall);
                while($datosTipoContenido = $resultadoResall->fetch_assoc())
                {
                    $returData.= "
                    <div class='custom-control custom-checkbox'>
                      <input type='checkbox' class='custom-control-input' checked='checked' id='tipcont".$datosTipoContenido['idTipoContenido']."' name='checkboxvarTC[]' value='".$datosTipoContenido['idTipoContenido']."'>
                      <label class='custom-control-label' for='tipcont".$datosTipoContenido['idTipoContenido']."'></label>
                      <label>".$datosTipoContenido['nombre']."</label>
                    </div>";
                }
                $conecMarcaall->close();


            }


        $returData .="";
        $conecTipo->close();
        return $returData;
        }


        public function listarPerfil()
        {
            $conecPerfil = new Conection();
            $conecPerfil->conect();
            $sql="select idPerfil,nombre from perfil;";
            $resultadoRes = $conecPerfil->getCon()->query($sql);
            $returData = null;
              $returData = "<select name='selPerfil' id='opPerfil' class='custom-select'>";
            while($datosMarca = $resultadoRes->fetch_assoc() )
            {
                $returData.= "<option class='dropdown-item'  value='".$datosMarca['idPerfil']."'>".$datosMarca['nombre']."</option>";
            }


            $conecPerfil->close();
            $returData .="</select>";

            return $returData;
        }

        public function restricMenu($perfil,$seccion){
            $cn = new Conection();
            $cn->conect();
            $consult = $cn->getCon()->query("SELECT * FROM restricciones WHERE perfil=".$perfil." AND identificador='menu' AND idTabla=".$seccion);
            $r = $consult->fetch_assoc();
            $count = $consult->num_rows;
            if($count>0){
                $ud=$cn->getCon()->query("DELETE FROM restricciones WHERE perfil=".$perfil." AND identificador='menu' AND idTabla=".$seccion);
            }else{
              $res = $cn->getCon()->query("INSERT INTO restricciones(identificador,perfil,idTabla) VALUES('menu',".$perfil.",".$seccion.")");
              if(!$res){
                printf($cn->getCon()->error);
              }

            }
        }

        public function verResMenu($id){
            $cn = new Conection();
            $cn->conect();
            $res = $cn->getCon()->query("SELECT * FROM restricciones WHERE perfil=".$id." AND identificador='menu'");
            $restric= Array();
            if($res){
                while($r = $res->fetch_assoc()){
                    array_push($restric,$r['idTabla']);
                }
                return json_encode($restric,JSON_FORCE_OBJECT);
            }else{
              echo "Error: ".$cn->getCon()->error;
            }
        }
}













?>
