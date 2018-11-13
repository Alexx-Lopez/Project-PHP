<?php
include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('nota'))
{
  $bandera=false;
  $campos.="Nota,";
}else
{
  $_SESSION['res_nota']=$_POST['nota'];
}

if(verificar_empty('grupo'))
{
  $bandera=false;
  $campos.="Grupo, ";
}else
{
  $_SESSION['res_grupo']=$_POST['grupo'];
}

if(verificar_empty('alumno'))
{
  $bandera=false;
  $campos.="Alumno, ";
}else
{
  $_SESSION['res_alumno']=$_POST['alumno'];
}

if(verificar_empty('resultado'))
{
  $bandera=false;
  $campos.="Resultado, ";
}else
{
  $_SESSION['res_resultado']=$_POST['resultado'];
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
  $nota=$_POST['nota'];
  $grupo=$_POST['grupo'];
  $id_grupo;
  $alumno=$_POST['alumno'];
  $id_alumno;
  $resultado=$_POST['resultado'];
  $id_resultado;
  $id=$_POST['id'];

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se verifica que no exista algun registro con ese mismo nombre diferente al que se pretende actualizar
    $sql="SELECT * from nota WHERE nota='$nota'";
    $regis=$objeto_con->conexion->query($sql);

    //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {

      //luego se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_grupo from grupo WHERE horario='$grupo'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_grupo=$row["id_grupo"];
        }
      }

      //luego se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_alumno from alumno WHERE nombre_alumno='$alumno'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_alumno=$row["id_alumno"];
        }
      }

      //luego se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_resultado from resultado WHERE nombre_resultado='$resultado'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_resultado=$row["id_resultado"];
        }
      }

      //se procede a realizar la actualizacion
      $sql = "UPDATE nota SET id_grupo=$id_grupo, nota='$nota', id_alumno=$id_alumno, id_resultado=$id_resultado WHERE id_nota=$id";

      if ($objeto_con->conexion->query($sql) === TRUE){
        //Se procede a colocar null las variables POST
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Nota Actualizada');
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
              Mensaje_Error(\"Ya existe un registro con la misma nota\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
