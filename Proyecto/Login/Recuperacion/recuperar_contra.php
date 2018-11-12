<!DOCTYPE HTML>
<html>
<head>
<title>Recuperar Cuenta</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../CSS/Style.css">

	<?php
    include '../../FORMA TEC/Functions/PHP/CN.php';
    ?>
</head>
<body>

<center>
    <div id="cont" class="contenedor_login" style="width: 80%;">
    <!--Espacio para colocar todo el contenido-->

		<!--coact start here-->
		<div class="contact">
			<div class="contact-main">

			<form method="post">

				<div class="row clearfix">
		                <div >
		                    <div class="card">
		                        <div class="header">
		                            <h2>
		                                Restaurar contraseña
		                            </h2>
		                        </div>
		                        <div class="body">
		                            <div class="demo-masked-input">
		                            <br><br>

		                                <div style="width: 100%; margin: 0 auto;">
		                                	<div>
		                                		<p>Introduce el correo electrónico para recuperar tu cuenta.</p>
		                                	</div>

		                                    <div class="input-group">
		                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Email: </span>
		                                        <input type="email" name="customer_email" class="form-control" placeholder="Correo eléctronico" required>
		                                    </div>
		                                </div>
		                                <br><br>

		                                <div class="input-group">
		                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Nombre: </span>
		                                        <input type="text" name="customer_name" class="form-control" placeholder="Ingresa tu nombre">
		                                    </div>

		                               <br><br><br>
		                               <a class="btn" href="../login.php" title="Ir a Login" style="background-color: #eee;">
			                                	<i class="glyphicon glyphicon-chevron-left"><u>INICIO</u></i>
			                            </a>

		                                <input type="hidden" name="enviar_btn" value="post"/>
		                                <button name="send" class="btn btn-primary waves-effect" type="submit">Recuperar</button>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        </div>


				<?php
					if (isset($_POST['send']))
					{
						include("sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico

						/*Configuracion de variables para enviar el correo*/
						$mail_username="formatec.sys@gmail.com";//Correo electronico salienmail_setFromNames
						$mail_userpassword="formatec2018";//Tu contraseña de gmail
						$mail_addAddress="formatec.sys@gmail.com";//correo electronico que recibira el mensaje

						/*Inicio captura de datos enviados por $_POST para enviar el correo */
						$mail_setFromEmail=$_POST['customer_email'];
						$mail_setFromName=$_POST['customer_name'];
						$txt_message="Su codigo generado es..";
						$mail_subject="Recuperacion de tu cuenta! :)";

						//FUNCION PARA GENERAR EL CODIGO DE LA NUEVA CONTRASEÑA
							function codigo_captcha(){

									$k="";
									$paramentros="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
									$maximo=strlen($paramentros)-1;
									for($i=0; $i<8; $i++){
										$k.=$paramentros{mt_rand(0,$maximo)};
									}
									return $k;
							}

						//GENERAMOS LA NUEVA CONTRASEÑA POR MEDIO DE UNA CONTRASEÑA DE 6 CARACTERES
						$PassNuevo = codigo_captcha();

						$objeto_con=new Conexion();
		    			$objeto_con->Connect();

		    			//se procede a realizar la actualizacion
		      			$sql = "UPDATE usuario SET contrasena='$PassNuevo' WHERE email='$mail_setFromEmail'";


						if ($objeto_con->conexion->query($sql) === TRUE)
						{

			        		echo "
			        		<script>
			        		alert('Se modifico la contraseña, revisar su correo');
					        </script>";
					    }
					    else
					    {
					        $error=$objeto_con->conexion->error;
					        echo "
					        <script>
					        alert(\"Error: ".$error."\");
					        </script>";
					    }

				        $template=$PassNuevo;//Ruta de nueva contraseña

						sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
					}
				?>
			</form>
			</div>
		</div>
	</div>
</center>
<br><br><br><br>
</body>
</html>
