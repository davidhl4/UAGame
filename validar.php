<?php 
 
//Conexión a la base de datos y la guardamos en la variable $link para futuras consultas

//$link = count($t_yakpro_mtm_tmp = explode(':','localhost')) > 1 ? mysqli_connect($t_yakpro_mtm_tmp[0], 'u779992429_ua', 'Mb19971997', '',$t_yakpro_mtm_tmp[1]) : mysqli_connect('localhost','u779992429_ua','Mb19971997')
 //   or die('No se pudo conectar: ' . mysqli_error());
//echo 'Connected successfully';
//mysqli_select_db($link,'u779992429_ua') or die('No se pudo seleccionar la base de datos');

//Empezamos la validación

try{

	$base=new PDO("mysql:host=localhost; dbname=u779992429_ua", "u779992429_ua", "Mb19971997");

	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="SELECT * FROM usuarios WHERE usuario= :username AND password= :password";

	$resultado=$base->prepare($sql);

	$username=htmlentities(addslashes($_POST["username"]));

	$password=htmlentities(addslashes($_POST["password"]));

	$resultado->bindValue(":username", $username);

	$resultado->bindValue(":password", $password);

	$resultado->execute();

	$numero_registro=$resultado->rowCount();

	if ($numero_registro!=0) {

		header("Location: /loggado/index.html");

	}else{

		print("no estas registrado");
		//header("Location: login.html");
	}



}catch(Exception $e){

	die("Error. " . $e->getMessage());
}

?>
