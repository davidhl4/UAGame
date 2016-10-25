<?php
	//conexion a la base de datos
	$link = count($t_yakpro_mtm_tmp = explode(':','localhost')) > 1 ? mysqli_connect($t_yakpro_mtm_tmp[0], 'u779992429_ua', 'Mb19971997', '',$t_yakpro_mtm_tmp[1]) : mysqli_connect('localhost','u779992429_ua','Mb19971997')
    or die('No se pudo conectar: ' . mysqli_error());
	echo 'Connected successfully';
	mysqli_select_db($link,'u779992429_ua') or die('No se pudo seleccionar la base de datos');

	//variables
	$support="uagameoficial@gmail.com";

	$asunto="Inscripcion a torneo";

	$asunto_confirmacion="Email de confirmacion";

	$username=$_POST["username"];

	$email=$_POST["email"];

	$text=$_POST["message"];

	$confirmation="Has sido inscrito en un torneo con exito, si no has sido tu, envia un email a @fastkiwi4@gmail.com";

	$headers="MIME-Version: 1.0\r\n";

	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";

	$headers.="From: UAGame Support < uagameoficial@gmail.com >\r\n";

	mail($support,$asunto,$text,$headers);

	$q = mysqli_query($link,"SELECT * FROM isaac WHERE id = '4' ");
	$w = mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = '$username' OR email = '$email' ");
	$x = mysqli_query($link,"SELECT * FROM isaac WHERE usuario = '$username' OR email = '$email' ");

	if( mysqli_num_rows($w) == 1){

		if( mysqli_num_rows($x) == 0){

			if( mysqli_num_rows($q) == 0){

				$exito=mail($support,$asunto,$text,$headers);

				$exito2=mail($email,$asunto_confirmacion,$confirmation,$headers);

				if ($exito=='true'&&$exito2=='true') {
				
				echo "Inscripcion realizada con exito, una confirmacion ha sido enviada a tu correo, acuerdate de mirar en spam";

				}

				else {

				echo "Ha habido un error";

				}

				mysqli_query($link,"INSERT INTO isaac(usuario,email) VALUES ('$username','$email')");

			}else{

				print("                  LAS INSCRIPCIONES ESTAN COMPLETAS, LO SIENTO");

			}
		}else{

			print("                  EL USUARIO YA ESTA INSCRITO");

		}
	}else{

			print("                  EL USUARIO NO SE ENCUENTRA REGISTRADO");

	}


?>