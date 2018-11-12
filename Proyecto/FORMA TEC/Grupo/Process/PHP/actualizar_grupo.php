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
}else
{
  $_SESSION['res_horario']=$_POST['horario'];
}

if(verificar_empty('fecha_inicio'))
{
  $bandera=false;
  $campos.="Fecha de inicio, ";
}else
{
  $_SESSION['res_fecha_inicio']=$_POST['fecha_inicio'];
}

if(verificar_empty('fecha_fin'))
{
  $bandera=false;
  $campos.="Fecha de fin, ";
}else
{
  $_SESSION['res_fecha_fin']=$_POST['fecha_fin'];
}

if(verificar_empty('docente'))
{
  $bandera=false;
  $campos.="Docente, ";
}else
{
  $_SESSION['res_docente']=$_POST['docente'];
}

if(verificar_empty('curso'))
{
  $bandera=false;
  $campos.="Curso, ";
}else
{
  $_SESSION['res_curso']=$_POST['curso'];
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
  $horario=$_POST['horario'];
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_fin=$_POST['fecha_fin'];
  $docente=$_POST['docente'];
  $curso=$_POST['curso'];
  $id=$_POST['id'];
  $id_docente=0;
  $id_curso=0;

  /*
  if(!texto($name))
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

    //primero se verifica que no exista algun registro con ese mismo nombre diferente al que se pretende actualizar
    $sql="SELECT * FROM grupo WHERE horario='$horario' AND fecha_inicio='$fecha_inicio' AND fecha_fin='$fecha_fin' AND id_docente=$id_docente AND id_curso='$id_curso'";    
    $regis=$objeto_con->conexion->query($sql);

    //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //se procede a realizar la actualizacion
      $sql = "UPDATE grupo SET horario='$horario', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_docente=$id_docente, id_curso='$id_curso' WHERE id_grupo=$id";

      if ($objeto_con->conexion->query($sql) === TRUE){
        //Se procede a colocar null las variables POST
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Grupo Actualizado');
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
