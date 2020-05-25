<?php
    include "../controles/Connection.php";
    class subirArchivo{

       public function subirArc($imagen,$pdf,$titulo,$tipo,$marca){
            try{
                $conexion=conexion();
                $cmd = "INSERT INTO equipos(imagen,pdf,titulo,tipo,marca,estado_MFP) VALUES('".$imagen."','".$pdf."','".$titulo."',".$tipo.",'".$marca."',1)";
                $res = $conexion->prepare($cmd);
                if($res->execute()){
                  $msj = Array("Mensaje"=>"Datos registrados!");
                }else{
                    $msj = Array("Mensaje"=>$res->errorInfo());
                }

                echo json_encode($msj,JSON_FORCE_OBJECT);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function catalogoequipos($result){
            $div="";
            if($result->rowCount()>0){
                while($r=$result->fetch(PDO::FETCH_ASSOC)){
                    $div .="<div class='cart'>";
				    $div .="<img src='img/".$r["marca"]."/".$r['imagen']."'>";
                    $div .="<div><a href='../Views/info/Toshiba/".$r['pdf']."'>".$r['pdf']."</a></div>";
			        $div.="</div>";
                }
            }else{
                $div="<div>No hay articulos para mostrar.</div>";
            }
                echo $div;
        }

    public function listarcatalogo($tabla,$pag,$tipo,$pag1){
    $con=conexion();
    if($tipo>=1){
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla." WHERE tipo=".$tipo.";");
    }else{
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla.";");
    }
    $cmd->execute();
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    $num_total_rows = $res['total'];
                if ($num_total_rows > 0) {
                    $page = false;

                    //examino la pagina a mostrar y el inicio del registro a mostrar
                    if (isset($pag1)) {
                    $page = $pag1;
                }

                if (!$page) {
                    $start = 0;
                    $page = 1;
                } else {
                    $start = ($page - 1) * $pag;
                }
    //calculo el total de paginas
                $total_pages = ceil($num_total_rows / $pag);
                $con= conexion();
               if($tipo==1 || $tipo==2){
                    $result = $con->prepare('SELECT * FROM '.$tabla.' WHERE tipo='.$tipo.' LIMIT '.$start.', '.$pag);
                }else{
                     $result = $con->prepare('SELECT * FROM '.$tabla.' LIMIT '.$start.', '.$pag);
                }
                $result->execute();

                $this->catalogoequipos($result);
               $this->lista($total_pages,$page,$tipo);



        }
        }

        public function lista($total_pages,$page,$tipo){
   echo '<ul class="lista">';
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" onclick="ajax('.$tipo.','.($page-1).')"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" onclick="ajax('.$tipo.','.$i.')">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" onclick="ajax('.$tipo.','.($page+1).')"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
        }

        public function eliminar($id,$tabla,$var){
          if(!empty($var)){
            $con=conexion();
            $stm="";
            foreach ($id as $key) {
              $stm .= "DELETE FROM ".$tabla." WHERE id=".$key."; ";
            }
            $sql = $con->prepare($stm);
            $sql->execute();
          }else{
            $con =conexion();
            $sql = $con->prepare("DELETE FROM ".$tabla." WHERE id=".$id);
            $sql->execute();
          }
        }
    }
?>
