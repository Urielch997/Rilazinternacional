<?php

require "../dao/daoRestricciones.php";
class restriccioonesController extends daoRestricciones
{
}
//CONTROLLER 

$obj = new restriccioonesController();

if (isset($_REQUEST["mostrar"])) 
{
    if($obj->mostrarRestricciones() == null)
    {
        echo "
            <div class='col-md-4'></div>
            <div class='col-md-4'>
                <div class='alert alert-info alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>mood_bad</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <i class='material-icons'>close</i>
                    </button>
                    <span data-notify=message>No hay restricciones para Mostrar</span>
                </div>
            </div>
            <div class='col-md-4'></div>
        ";
      
    }
    else
    {
        
        echo $obj->mostrarRestricciones();
       
    }
}



if (isset($_REQUEST["selectOpt1"])) 
{
    $perfil = $_REQUEST["selectOpt1"];
  

    echo $obj->listarMarcas($perfil);
                
}
if (isset($_REQUEST["selectOpt2"])) 
{
    $perfil = $_REQUEST["selectOpt2"];
    echo $obj->listarTipocontenido($perfil);
                
}
if (isset($_REQUEST["txtIdUser"])) 
{
    $obj = new daoRestricciones();
        if (isset($_REQUEST["checkboxvar"])  && $_REQUEST["checkboxvar"]!= null) 
        {
            $arrayMarcafrm = $_POST['checkboxvar'];
        }
        else{
            $arrayMarcafrm =null;
        }
        if (isset($_REQUEST["checkboxvarTC"])) 
        {
            $arrayTCfrm = $_POST['checkboxvarTC'];
        }
        else
        {
            $arrayTCfrm = null;
        }
        if($arrayTCfrm == null &&  $arrayMarcafrm ==null)
        {
            
            echo "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Ningun valor seleccionado',
                        text: 'Selecciona un valor de la lista',
                    });
                </script>";
        }
        else
        {
            if($arrayTCfrm == null ||  $arrayMarcafrm ==null)
            {
                if($arrayTCfrm == null)
                {
                    $alert=" Tipo de Contenido ";
                }
                else
                {
                    $alert=" Marca ";
                }
                echo "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Ningun valor seleccionado en la columna ".$alert."',
                        text: 'Selecciona un valor de la lista',
                    });
                </script>";

            }
            else{
                $e = new Restricciones();
                //$e->setIdentificador($_POST["seleRes"]);
                $e->setPerfil($_POST["selPerfil"]);
                //$e->setIdTabla($_POST["selTC"]);
                if($obj->insertarRestrccion($e,$arrayMarcafrm,$arrayTCfrm))
                {
                    echo "<script> 
                        Swal.fire({
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            title: 'Agregando Restricciones',
                            text: '',
                        });
                    </script>";


                    
                    
                    
                    
                }
                if($obj->mostrarRestricciones() == null)
                {
                    echo "
                        <div class='col-md-4'></div>
                        <div class='col-md-4'>
                            <div class='alert alert-info alert-with-icon' data-notify='container'>
                                <i class='material-icons' data-notify='icon'>mood_bad</i>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <i class='material-icons'>close</i>
                                </button>
                                <span data-notify=message>No hay restricciones para Mostrar</span>
                            </div>
                        </div>
                        <div class='col-md-4'></div>
                    ";
                
                }
                else
                {
                    
                    echo $obj->mostrarRestricciones();
                
                }
            }
            
             
        }
       
   
    

              
          
   
    


}



?>