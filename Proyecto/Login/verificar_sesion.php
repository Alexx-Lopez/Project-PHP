<?php
  $bandera=true;

  if(!isset($_SESSION['USUARIO_login']))
  {
    $bandera=false;
  }

  if(!isset($_SESSION['CONTRA_login']))
  {
    $bandera=false;
  }

  if($bandera==false){
    $mensaje='denegado';
    header("Location: ../../Login/login.php?Acceso=$mensaje");
  }else
  {
    //en el caso que el usuario este logeado se verifica que si tiene los permisos necesarios para
    //acceder en la página
  }

  function verificar_permisos_usuarios($area)
  {
    //se procede a extraer los datos
    $user=$_SESSION['USUARIO_login'];
    $pass=$_SESSION['CONTRA_login'];

    //se procede a realizar la Conexion
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //se extrae el id_tipo_usuario del usuario ingresado
    $sql="SELECT id_tipo_usuario from usuario WHERE username='$user' and contrasena='$pass'";
    $regis=$objeto_con->conexion->query($sql);

    $fila = $regis->fetch_assoc();
    $id=$fila['id_tipo_usuario'];

    //luego se realiza la consulta para verificar si posee todos los permisos del area solicitada
    $sql="SELECT ingresar,leer,actualizar,eliminar FROM acceso WHERE area='$area' AND id_tipo_usuario=$id";
    $regis=$objeto_con->conexion->query($sql);

    $fila = $regis->fetch_assoc();
    $ingresar=$fila['ingresar'];
    $leer=$fila['leer'];
    $actualizar=$fila['actualizar'];
    $eliminar=$fila['eliminar'];

    $objeto_con->Disconnect();

    if($ingresar==1 && $leer==1 && $actualizar==1 && $eliminar==1)
    {
      //se le permite el acceso
    }else
    {
      //se le cierra la session y se manda al Login
      unset($_SESSION['USUARIO_login']);
      unset($_SESSION['CONTRA_login']);
      header('Location: ../../Login/login.php?acceso=NULL');
    }
  }
?>
