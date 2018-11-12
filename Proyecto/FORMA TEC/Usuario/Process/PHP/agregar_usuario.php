<?php

include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('name'))
{
  $bandera=false;
  $campos.="Nombre de usuario, ";
}

if(verificar_empty('email'))
{
  $bandera=false;
  $campos.="email, ";
}

if(verificar_empty('pass'))
{
  $bandera=false;
  $campos.="Contraseña, ";
}

if(verificar_empty('type'))
{
  $bandera=false;
  $campos.="Tipo de usuario, ";
}

if($bandera==false)
{
  echo "
  <script>
  Mensaje_Error(\"Error, los campos: <?php echo $campos; ?> se encuentran vacios\");
  </script>";

}else
{
  //se procede a analizar los textos de los campos que respeten ciertas normas
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $type=$_POST['type'];
  $id_type;

  if(!texto($name))
  {
    $bandera2=false;
  }

  if(!verificar_formato_correo($email))
  {
    $bandera2=false;
  }

  if(!verificar_contraseña_usuario($pass))
  {
    $bandera2=false;
  }

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT username from usuario WHERE username='$name'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //luego se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_tipo_usuario from tipo_usuario WHERE categoria_usuario='$type'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_type=$row["id_tipo_usuario"];
        }
      }

      //se procede a realizar la insercion
      $sql = "INSERT INTO usuario VALUES(NULL,'$name','$pass','$email',$id_type)";

      if ($objeto_con->conexion->query($sql) === TRUE){
        echo "
        <script>
        //se limpian los inputs
        $(\"#name\").val(\"\");
        $(\"#email\").val(\"\");
        $(\"#pass\").val(\"\");
        $(\"#type\").val(\"\");
        $(\"#pass2\").val(\"\");
        buscar_datos();
        Mensaje_Succes('Usuario Ingresado');
        </script>";
      } else {
        $error=$objeto_con->conexion->error;
        echo "
        <script>
        Mensaje_Error(\"Error: ".$error."\");
        </script>";
      }
    }else
    {
      echo "<script>
              Mensaje_Error(\"Ya existe un registro con el mismo nombre\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
