<?php
class conexion
{

  function conexionPDO()
  {
      try{
          $pdo = new PDO('mysql:host=localhost;dbname=rilazinternacional',"root", "");
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          if($pdo){
              echo "Conectado";
            }else{
              echo "error";
            }
      }catch(PDOException $e){
              echo "Error sql:" .$e->getMessage();
      }

    }

}
?>
