<?php
    include "Connection.php";
    class subirArchivo{

       public function subirArc($imagen,$pdf,$titulo,$tipo,$marca){
            try{
                $conexion =conexion();
                $cmd = "INSERT INTO equipos(imagen,pdf,titulo,tipo,marca) VALUES('".$imagen."','".$pdf."','".$titulo."',".$tipo.",'".$marca."')";
                $res = $conexion->prepare($cmd);
                $res->execute();
            }catch(Exception $e){
                echo $e;
            }
        }

        public function catalogoequipos($result,$marca,$count){
            $div="";
            if($count!=0){
                while($r=$result->fetch(PDO::FETCH_ASSOC)){
                    $div .="<div class='cart'>";
                    $div .="<label>".$r['titulo']."</label>";
				    $div .="<img src='img/".$marca."/".$r['imagen']."'>";
                    $div .="<div><a href='Views/info/".$marca."/".$r['pdf']."'>".$r['pdf']."</a></div>";
			        $div.="</div>";
                }
            }else{
                $div .="<div class='vacio'><label>No hay articulos.</label><img src='img/icons8_do_not_stack.ico'></div>";
            }
                echo $div;
        }

    public function listarcatalogo($tabla,$pag,$tipo,$pag1,$marca,$estado){
    $con=conexion();
    if($tipo>0 && $estado > 0){
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla." WHERE tipo=".$tipo." AND marca='".$marca."' AND estado_MFP=".$estado.";");
    }else if($tipo > 0  && $estado == 0 || $estado==null){
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla." WHERE marca='".$marca."' AND tipo=".$tipo.";");
    }
    else if($estado > 0 && $tipo==0 || $tipo==null ){
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla." WHERE marca='".$marca."' AND estado_MFP=".$estado.";");
    }else{
        $cmd = $con->prepare("SELECT COUNT(*) as total FROM ".$tabla." WHERE marca='".$marca."';");
    }
    $cmd->execute();
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    $num_total_rows = $res['total'];
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
                $con=conexion();
               if($tipo>0 && $estado > 0){
                    $result = $con->prepare('SELECT * FROM '.$tabla.' WHERE tipo='.$tipo.' AND marca="'.$marca.'" AND estado_MFP='.$estado.' LIMIT '.$start.', '.$pag);
                    $result->execute();
                    $cont = $result->rowCount();
                }else if($tipo > 0  && $estado == 0 || $estado==null){
                    $result = $con->prepare("SELECT * FROM ".$tabla." WHERE marca='".$marca."' AND tipo=".$tipo." LIMIT ".$start.", ".$pag.";");
                    $result->execute();
                    $cont = $result->rowCount();
                }else if($estado > 0 && $tipo==0 || $tipo==null){
                     $result = $con->prepare("SELECT * FROM ".$tabla." WHERE marca='".$marca."' AND estado_MFP=".$estado." LIMIT ".$start.", ".$pag.";");
                     $result->execute();
                     $cont = $result->rowCount();
                }else if($estado==0 || $estado==null && $tipo==0 || $tipo==null){
                     $result = $con->prepare('SELECT * FROM '.$tabla.' WHERE marca="'.$marca.'" LIMIT '.$start.', '.$pag);
                     $result->execute();
                     $cont = $result->rowCount();
                }






         $this->catalogoequipos($result,$marca,$cont);
        $this->lista($total_pages,$page,$tipo,$marca,$estado);
        }

        public function lista($total_pages,$page,$tipo,$marca,$estado){
   echo '<ul class="lista">';
    if ($total_pages > 1) {
            //mostrar limite en numeros de paginacion
            $paginate_max = 2;
            $pmin = ($page>$paginate_max) ? ($page-$paginate_max) : 1;
            $pmax = ($page<($total_pages-$paginate_max)) ? ($page+$paginate_max) : $total_pages;
            /************************************* */
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" onclick="ajax('.$tipo.','.($page-1).',&#34;'.$marca.'&#34;,'.$estado.')"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=$pmin;$i<=$pmax;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo "<li class='page-item'><a class='page-link' onclick='ajax(".$tipo.",".$i.",&#34;".$marca."&#34;,".$estado.")'>".$i."</a></li>";
            }
        }

        if ($page != $total_pages) {
            echo "<li class='page-item'><a class='page-link' onclick='ajax(".$tipo.",".($page+1).",&#34;".$marca."&#34;,".$estado.")'><span aria-hidden='true'>&raquo;</span></a></li>";
        }
    }
    echo '</ul>';
        }

        public function eliminar($id,$tabla){
          if(isset($_REQUEST["delvar"])){
            $con = new Conection();
            $con->conect();
            $sql = $con->getCon()->query("delete from ".$tabla." WHERE id=".$id);
          }else{
            $con = new Conection();
            $con->conect();
            $sql = $con->getCon()->query("delete from ".$tabla." WHERE id=".$id);
          }
        }

    }
?>
