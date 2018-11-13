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
  $campos.="Nombre del Tipo,";
}else
{
  $_SESSION['res_tipo_curso']=$_POST['tipo_curso'];
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
  $id=$_POST['id'];

  if(!texto($tipo_curso))
  {
    $bandera2=false;
  }

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se verifica que no exista algun registro con ese mismo nombre diferente al que se pretende actualizar
    $sql="SELECT * from tipo_curso WHERE nombre_categoria = '$tipo_curso'";
    $regis=$objeto_con->conexion->query($sql);

    //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {

      //se procede a realizar la actualizacion
      $sql = "UPDATE tipo_curso SET nombre_categoria='$tipo_curso' WHERE id_tipo_curso=$id";

      if ($objeto_con->conexion->query($sql) === TRUE){
        //Se procede a colocar null las variables POST
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Tipo Curso Actualizada');
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
              Mensaje_Error(\"Ya existe un registro con el mismo tipo\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
