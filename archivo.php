<?php 

//conexion a la base de datos
$link = count($t_yakpro_mtm_tmp = explode(':','localhost')) > 1 ? mysqli_connect($t_yakpro_mtm_tmp[0], 'u779992429_ua', 'Mb19971997', '',$t_yakpro_mtm_tmp[1]) : mysqli_connect('localhost','u779992429_ua','Mb19971997')
    or die('No se pudo conectar: ' . mysqli_error());
echo 'Connected successfully';
mysqli_select_db($link,'u779992429_ua') or die('No se pudo seleccionar la base de datos');

//variables
$usuario=$_POST['usernamesignup'];
$pass=$_POST['passwordsignup'];
$email=$_POST['emailsignup'];
$asunto="Registro en UAGame";
$confirmation="Te has registrado en UAGame con exito. Empieza a jugar Torneos! Tus datos son: Nombre de usuario:$usuario, Email:$email, Password:$pass";

//
$q = mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$email' ");
 //verificamos si el user exite con un condicional
if( mysqli_num_rows($q) == 0){
 
	mysqli_query($link,"INSERT INTO usuarios(usuario,email,password) VALUES ('$usuario','$email','$pass')");

	print("                  TE HAS REGISTRADO CON EXITO, EN TU EMAIL ENCONTRARAS LA CONFIRMACION, RECUERDA MIRAR EN LA CARPETA SPAM");

	mail($email, $asunto, $confirmation);

}else{

	print("                  EL NOMBRE DE USUARIO O EL EMAIL YA ESTA REGISTRADO, INGRESA OTRO");
}
//insercion de datos en la tabla
//mysqli_query($link,"INSERT INTO usuarios(usuario,email,password) VALUES ('$usuario','$email','$pass')");

//envio de email de confirmacion
//mail($email, $asunto, $confirmation);

//redireccion a la pagina principal
//header("Location: index.html");



?>