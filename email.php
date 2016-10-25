<?php

	$support="fastkiwi4@gmail.com";

	$asunto="Inscripcion a torneo";

	$asunto_confirmacion="Email de confirmacion";

	$username=$_POST["username"];

	$email=$_POST["email"];

	$text=$_POST["message"];

	$confirmation="Has sido inscrito en un torneo con exito, si no has sido tu, envia un email a @fastkiwi4@gmail.com";

	$headers="MIME-Version: 1.0\r\n";

	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";

	$headers.="From: UAGame Support < fastkiwi4@gmail.com >\r\n";

	$exito=mail($support,$asunto,$text,$headers);
	$exito2=mail($email,$asunto_confirmacion,$confirmation,$headers);

	if ($exito=='true'&&$exito2=='true') {
		
		echo "Inscripcion realizada con exito";

	}

	else {

		echo "Ha habido un error";

	}

?>