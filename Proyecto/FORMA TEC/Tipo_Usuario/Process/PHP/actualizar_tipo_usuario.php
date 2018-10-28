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
  Mensaje_Error(\"No se permiten campos vacios\");
  </script>";
}else
{
  //se procede a analizar los textos de los campos que respeten ciertas normas
  $name=$_POST['name'];
  $id=$_POST['id'];

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se verifica que no exista algun registro con ese mismo nombre diferente al que se pretende actualizar
    $sql="SELECT * from tipo_usuario WHERE categoria_usuario='$name' and id_tipo_usuario!=$id";
    $regis=$objeto_con->conexion->query($sql);

    //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {

      //se procede a realizar la actualizacion
      $sql = "UPDATE tipo_usuario SET categoria_usuario='$name' WHERE id_tipo_usuario=$id";

      if ($objeto_con->conexion->query($sql) === TRUE){
        //Se procede a colocar null las variables POST
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Tipo de usuario Actualizado');
        </script>";
      }else{
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
