<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <!-- Bootstrap CSS File -->
  <!--<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--libreria para mostrar notificaciones-->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

  <link rel="stylesheet" type="text/css" href="../CSS/Style.css">

  <script src="../FORMA TEC/Functions/JS/Messages.js"></script>

</head>
<body>
  <div class="contenedor_login">
    <h2>Iniciar Sesión</h2>
    <br>
    <div>
      <form action="" method="post">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control" name="user" placeholder="Usuario">
      </div>
      <br>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input  type="password" class="form-control" name="password" placeholder="Contraseña">
      </div>
      <br>
      <input type="submit" class="btn btn-success boton_login_entrar" value="Entrar" id="btn" name="btn">
    </form>
    <?php
    if(isset($_POST['btn']))
    {
      include '../FORMA TEC/Functions/PHP/CN.php';
      include '../FORMA TEC/Functions/PHP/validation_function.php';

      $bandera=true;
      $bandera2=true;

      if(verificar_empty('user'))
      {
        $bandera=false;
      }

      if(verificar_empty('password'))
      {
        $bandera=false;
      }

      if($bandera==false)
      {
        echo "
        <script>
          Mensaje_Error(\"No se permiten campos vacíos\");
        </script>";

      }else
      {
        //se procede a extraer los datos
        $user=$_POST['user'];
        $pass=$_POST['password'];

        //se procede a realizar la Conexion
        $objeto_con=new Conexion();
        $objeto_con->Connect();

        //se verifica que exista un nombre con contraseña que coincidan
        $sql="SELECT username from usuario WHERE username='$user' and contrasena='$pass'";
        $regis=$objeto_con->conexion->query($sql);

        //Si no hay registro que coincida se muestra un error
        if($regis->num_rows==0)
        {
          //en el caso las credenciales sean incorrectas
          echo "
          <script>
            Mensaje_Error(\"Usuario y/o contraseña son incorrectos, vuelva a intentarlo\");
          </script>";
        }else
        {
          //si las credenciales coincide con algun registro
          session_start();
          $_SESSION['USUARIO_login']=$user;
          $_SESSION['CONTRA_login']=$pass;

          header('Location: ../FORMA TEC/Main/main.php');

        }
        $objeto_con->Disconnect();
      }
    }

    //en el caso se redirija a esta pagina por intentar entrar sin iniciar sesion
    if(!empty($_GET["Acceso"]))
    {
      $mensaje=$_GET['Acceso'];
      echo "
      <script>
        Mensaje_Error(\"Acceso Degenegado, primero inicie sesión\");
      </script>";
    }

    if(!empty($_GET["acceso"]))
    {
      echo "
      <script>
        Mensaje_Error(\"No posee los permisos para acceder a esta area\");
      </script>";
    }
    ?>
    </div>
  </div>
</body>
</html>
