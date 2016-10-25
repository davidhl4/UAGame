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
$confirmation="Te has registrado en UAGame con exito. Empieza a jugar Torneos!";

//insercion de datos en la tabla
mysqli_query($link,"INSERT INTO usuarios(usuario,email,password) VALUES ('$usuario','$email','$pass')");

//envio de email de confirmacion
mail($email, $asunto, $confirmation);

//redireccion a la pagina principal
//header("Location: index.html");



?>