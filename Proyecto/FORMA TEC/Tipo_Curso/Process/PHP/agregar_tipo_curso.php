<?php

include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('tipo_curso'))
{
  $bandera=false;
  $campos.="tipo_curso,";
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
  $tipo_curso=$_POST['tipo_curso'];

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro
    $sql="select nombre_categoria from tipo_curso where nombre_categoria='$tipo_curso'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {

      //se procede a realizar la insercion
      $sql = "INSERT INTO tipo_curso VALUES(NULL, '$tipo_curso')";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#tipo_curso\").val(\"\");
        buscar_datos();
        Mensaje_Succes('tipo de curso Ingresada');
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
              Mensaje_Error(\"Ya existe un registro con la misma tipo de curso\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
