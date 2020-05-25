<?php
if(isset($_SESSION["user"]))
{
    header("location: ../publicaciones.php");

}else{
    header("location: index.php");

}
?>