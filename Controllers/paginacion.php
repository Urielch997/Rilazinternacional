<?php

Class pagina{

public function tabla($tabla,$numpag,$paginanum){
    $con= new Conection();
    $con->conect();
    $cmd = $con->getCon()->query("SELECT COUNT(*) as total FROM ".$tabla.";");
    $res = $cmd->fetch_assoc();
    $this->paginas($res['total'],$numpag,$paginanum);
}

private function paginas($num_total_rows,$pag,$paginanum){
if ($num_total_rows > 0) {
    $page = false;
 
    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($paginanum)) {
        $page = $paginanum;
    }
 
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * $pag;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / $pag);
 
    //pongo el numero de registros total, el tamano de pagina y la pagina que se muestra
    $con = new Conection();
    $con->conect();
        $result = $con->getCon()->query(
        'SELECT * FROM equipos ORDER BY id DESC LIMIT '.$start.', '.$pag);

    
                $conexion = new Conection();
                $conexion->conect();
                $td="";
               $td="
               <table class='table'>
               <tr>
                    <th>Imagen</th>
                    <th>Enlace de brochure</th>
                    <th>Titulo</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>";
      while($resul = $result->fetch_assoc()){
                $id = $resul['id'];
                $imagen = $resul['imagen'];
                $pdf = $resul['pdf'];
                $titulo = $resul['titulo'];
                $marca = $resul['marca'];
                $tabla="equipos";
                    $td .="<tr>";
                    $td .= "<td><img src='../Views/img/Toshiba/".$imagen."' width='100px'></td>";
                    $td .= "<td>".$pdf."</td>";
                    $td .= "<td>".$titulo."</td>";
                    $td .= "<td>".$marca."</td>";
                    $td .= '<td><button class="btn btn-warning" onclick="sweetdel('.$id.')">Eliminar</button></td>';
                    $td .="</tr>";
                }
                $td.="</table>";
                
            echo $td;
 
    echo '<ul class="pagination">';
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" onclick="tablaequip('.($page-1).')"><span aria-hidden="true">&laquo;</span></a></li>';
        }
 
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" onclick="tablaequip('.$i.')">'.$i.'</a></li>';
            }
        }
 
        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" onclick="tablaequip('.($page+1).')"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
}
}
}
?>