<?php
require "../dao/daoMarca.php";
require "../Models/Marca.php";

class marcasControllers extends daoMarca
{

    public function mostrarMarcas()
    {

         echo $this->listarMarcas();
    }
}
$dao= new daoMarca();
$m= new Marca();
if (isset($_REQUEST["btnMod"]))
{
    $m->setIDMarca($_REQUEST["txtIdMarca"]);
    $m->setNombreMarca($_REQUEST["txtNameMarca"]);
    $dao->modificar($m);
    echo $dao->listarMarcas();

}

if (isset($_REQUEST["btnEli"]))
{
    $m->setIDMarca($_REQUEST["txtIdMarca"]);
    $m->setNombreMarca($_REQUEST["txtNameMarca"]);
    $dao->eliminar($m);
    echo $dao->listarMarcas();

}
if (isset($_REQUEST["btnIns"]))
{

    $m->setNombreMarca($_REQUEST["txtNameMarcaI"]);
    if($_REQUEST["txtNameMarcaI"] == null || $_REQUEST["txtNameMarcaI"] == "")
    {
      echo "<script>alert(".$_REQUEST['txtNameMarcaI'].")</script>";
      /*  echo "<script>
        Swal.fire({
            icon: 'error',
            showConfirmButton: false,
            timer: 2000,
            title: 'Nombre de la marca vacio',
            text: '',
        });
    </script>";*/
    }
    else{
        $dao->insertar($m);
    }

   echo $dao->listarMarcas();


}








//CONTROLLER

?>
