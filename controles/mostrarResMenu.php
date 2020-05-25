<?php
  $resM = new daoRestricciones();
   $data = json_decode($resM->verResMenu($_SESSION["user"]["ID"]));

   $d = Array();
   foreach ($data as $key) {
     array_push($d,$key);
   }
?>
