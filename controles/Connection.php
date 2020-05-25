<?php
function conexion(){

	$conn = null;
	$host ='localhost';
	$db = 'rilazinternacional';
	$user = 'root';
	$pwd = '';

try{
	$conn = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pwd);
	//echo 'conexion satisfactoria.<br>';

}catch(PDDException $e){
	echo "<center><h2 style='color:green'>Si el problema persiste";
	echo "consulte al soporte tecnico</h2></center>";
	exit();
}

return $conn;

}
?>
