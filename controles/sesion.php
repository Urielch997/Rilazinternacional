<?php
require_once "conexion.php";

try{
$db=conexion();
$query = "SELECT * FROM usuarios WHERE username=:usuario AND pass=:contra";
$consultar = $db->prepare($query);
$consultar->execute(array(':usuario' => $_POST['txtUsuario'], ':contra' => $_POST['txtContra']));
$row = $consultar->fetch(PDO::FETCH_ASSOC);

$count=$consultar->rowCount();

if($consultar){
if($_POST['txtUsuario'] == $row['username'] and $_POST['txtContra'] == $row['pass']){
    if($row['estado']=="ACTIVO"){
            echo "<script>location.href='panel/index.php'</script>";
    }else{
        echo "usuario inactivo";
    }
}else{
    echo "usuario o contraseña incorrecta" . $row['username'];
}
}else{
    echo "Error en la consulta";
}
}catch(PDOException $e){
  echo 'Error: '. $e;
}
?>
