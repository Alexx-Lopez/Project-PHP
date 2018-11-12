<!doctype html>
<html>
<head>
    <?php
    include '../../FORMA TEC/Functions/PHP/CN.php';
    ?>

    <title>Recuperar Contrase&ntilde;a</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../../CSS/Style.css">
</head>
<body style="background-color: #fffff9;" id="cuerpo">

	<center>
    <div id="cont" class="contenedor_login" style="width: 80%;">

        <!--Espacio para colocar todo el contenido-->
		<div class="row clearfix">
            <div >
                <div class="card">
                    <div class="header">
                        <h2>
                            Introduce el código de seguridad
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <form action="recuperar.php" name="mail_frm" method="GET">
                            <br><br>
                                <div style="width: 100%; margin: 0 auto;">

      							<?php
									//$clave_antigua=$_GET['cod'];
									//echo $clave_antigua;
								?>

                                	<div>
                                		<p>Comprueba en el correo electrónico, si has recibido un mensaje con tu código.</p>
                                	</div>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> Clave: </span>

                                        <input type="password" name="password1" class="form-control" placeholder="Ingrese la clave que se le envio al correo" required>
                                    </div>

                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> Nueva Clave: </span>

                                        <input type="password" name="password2" class="form-control" placeholder="Ingrese la nueva contraseña" required>
                                    </div>


                                </div>

                                <br><br><br>

                                <a class="btn" href="../login.php" title="Ir a login" style="background-color: #eee;">
	                                	<i class="glyphicon glyphicon-chevron-left"><u>INICIO</u></i>
	                            </a>

                               <input type="hidden" name="enviar_btn" value="get"/>
                               <button class="btn btn-primary waves-effect" name="enviar" type="submit">Modificar Clave</button>
                               <br>

	                        <?php
                                //$clave_antigua = $_GET['cod'];
                                //echo $clave_antigua;

								if (isset($_GET['enviar']))
								{

									$objeto_con=new Conexion();
					    			$objeto_con->Connect();

					    			//$clave_antigua = $_GET['cod'];
					    			$contra_Nueva = $_GET['password2'];
					    			$contra_Vieja = $_GET['password1'];

					    			 //se procede a realizar la actualizacion
					      			$sql = "UPDATE usuario SET contrasena='$contra_Nueva' WHERE contrasena='$contra_Vieja'";

									if ($objeto_con->conexion->query($sql) === TRUE)
									{

						        		echo "
						        		<script>
						        		alert('Se modifico la contraseña');
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
								}

							?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center>
    <br><br><br>

</body>
</html>
