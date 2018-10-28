<?php

include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

if(verificar_empty('name'))
{
  $bandera=false;
}

if($bandera==false)
{
  echo "
  <script>
  Mensaje_Error(\"No se permite campos vacios\");
  </script>";

}else
{
  //se procede a analizar los textos de los campos que respeten ciertas normas
  $name=$_POST['name'];

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT * from tipo_usuario WHERE categoria_usuario='$name'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //se procede a realizar la insercion
      $sql = "INSERT INTO tipo_usuario VALUES(NULL,'$name')";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#name_tipo\").val(\"\");
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
