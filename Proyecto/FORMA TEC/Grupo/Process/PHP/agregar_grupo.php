<?php

include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('horario'))
{
  $bandera=false;
  $campos.="Horario,";
}

if(verificar_empty('fecha_inicio'))
{
  $bandera=false;
  $campos.="Fecha de inicio,";
}

if(verificar_empty('fecha_fin'))
{
  $bandera=false;
  $campos.="Fecha de fin,";
}

if(verificar_empty('docente'))
{
  $bandera=false;
  $campos.="Docente,";
}

if(verificar_empty('curso'))
{
  $bandera=false;
  $campos.="Curso,";
}

if($bandera==false)
{
  echo "
  <script>
  Mensaje_Error(\"Error, los campos: <?php echo $campos; ?> se encuentran vacios\");
  </script>";

}else{
  $horario=$_POST['horario'];
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_fin=$_POST['fecha_fin'];
  $docente=$_POST['docente'];
  $curso=$_POST['curso'];
  $id_docente=0;
  $id_curso=0;  

  /*
  if(!texto($hora))
  {
    $bandera2=false;
  }
  */

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se obtienen los id relacionados con el docente y el curso

    //id_docente
    $sql="SELECT id_docente FROM (SELECT id_docente,concat_ws(' ',nombres_docente,apellidos_docente) AS nombre FROM docente) AS D WHERE nombre='$docente'";
    $resultado=$objeto_con->conexion->query($sql);
    if ($resultado->num_rows>0) {
      while ($row = mysqli_fetch_assoc($resultado)) {
        $id_docente=$row['id_docente'];
      }
    }

    //id_curso
    $sql="SELECT id_curso FROM forma_tec.curso where nombre_curso='$curso'";
    $resultado=$objeto_con->conexion->query($sql);
    if ($resultado->num_rows>0) {
      while ($row = mysqli_fetch_assoc($resultado)) {
        $id_curso=$row['id_curso'];
      }
    }

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT * FROM grupo WHERE horario='$horario' AND fecha_inicio='$fecha_inicio' AND fecha_fin='$fecha_fin' AND id_docente=$id_docente AND id_curso='$id_curso'";    
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {      
      //se procede a realizar la insercion
      $sql = "INSERT INTO grupo VALUES(NULL,'$horario','$fecha_inicio','$fecha_fin',$id_docente,'$id_curso')";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#horario\").val(\"\");
        $(\"#fecha_inicio\").val(\"\");
        $(\"#fecha_fin\").val(\"\");
        $(\"#docente\").val(\"\");
        $(\"#curso\").val(\"\");
        buscar_datos();
        Mensaje_Succes('Curso Ingresado');
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
