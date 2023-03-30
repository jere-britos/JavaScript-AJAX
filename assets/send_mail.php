<?php
	if (isset($_POST)) {
		error_reporting(0);
		//Estas variables se vinculan mediante el atributo name del formulario
		$name = $_POST["name"];
		$email = $_POST["email"];
		$subject = $_POST["subject"];
		$comments = $_POST["comments"];
		

		//Función para ejecutar un mail en php, parametros son a quien va dirigido, el asunto, el mensaje, las cabeceras (especifica que sea en formato html por ej.).

		$domain = $_SERVER["HTTP_HOST"];//Obtiene el dominio desde donde se esta ejecutando esta pagina.
		$to = "jere.eme.34@gmail.com";
		$subject_mail = "Contacto desde el formulario del sitio $domain: $subject";
		$message = "
		<p>
		 Datos enviados desde el formulario del sitio <b>$domain</b>
		</p>
		<ul>
			<li>Nombre: <b>$name</b></li>
			<li>Email: <b>$email</b></li>
			<li>Asunto: <b>$subject</b></li>
			<li>Comentarios: <b>$comments</b></li>
		</ul>
		";
		$headers = "MIME-Version: 1.0\r\n"."Content-Type: text/html;charset=utf-8\r\n"."From: Envío Automático No Responder <no-reply@$domain>";
		
		$send_mail = mail($to,$subject_mail,$message,$headers);

		if ($send_mail) {
			$res = [
				"err"=>false,
				"message"=>"Tus datos han sido enviados"
			];
		}else{
			$res = [
				"err"=>true,
				"message"=>"Error al enviar tus datos, Intentalo nuevamente."
			];
		}
		// header("Access-Control-Allow-Origin: *"); //Cualquier origen
		header("Access-Control-Allow-Origin: https://jonmircha.com");
		header('Content-type: application/json');
		echo json_encode($res);
		exit;


	}
?>