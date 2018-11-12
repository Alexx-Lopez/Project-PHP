<?php
function sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject, $template){
	require ("PHPMailer.php");
	require("SMTP.php");
	require("Exception.php");

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	//$mail->SMTPDebug = 3;
	$mail->isSMTP();                            // Establecer el correo electrónico para utilizar SMTP
	$mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar
	$mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
	$mail->Username = $mail_username;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
	$mail->Password = $mail_userpassword; 		// Tu contraseña de gmail
	$mail->SMTPSecure = 'tls';                  // Habilitar encriptacion, `ssl` es aceptada
	$mail->Port = 587 ;                          // Puerto TCP  para conectarse
	$mail->From = $mail_addAddress;//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
	$mail->FromName = 'Formatec';
	$mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
	$mail->addAddress($mail_setFromEmail, $mail_setFromName);   // Agregar quien recibe el e-mail enviado
	$message = '<p>Por este medio se le envia el codigo y un link para cambiar la clave..
	   <br><br>
	   La clave es: '.$template.'
	   <br><br>
	   Acceda al siguiente enlace:
	   <a href="http://localhost:85/PHP/Proyecto/GIT/Proyecto/Login/Recuperacion/recuperar.php?cod='.$template.'">Cambiar mi clave</a>

	   <br><br>
	   Por favor verifiquela lo mas pronto posible, para prevenir inconvenientes futuros.
	   <br>
	   Gracias por Preferirnos...
	   <br><br>
	   From: formatec.sys@gmail.com</p>';

	$mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
	$mail->Subject = $mail_subject;
	$mail->msgHTML($message);
	if(!$mail->send())
	{
		echo '<p style="color:red">No se pudo enviar el mensaje..';
		echo 'Error de correo: ' . $mail->ErrorInfo;
		echo "</p>";
	}
	else
	{
		echo '<p style="color:green">Tu mensaje ha sido enviado!</p>';
	}
}
?>
