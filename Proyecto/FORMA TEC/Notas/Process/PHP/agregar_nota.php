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
}

if(verificar_empty('id_curso'))
{
  $bandera=false;
  $campos.="Curso, ";
}

if(verificar_empty('id_alumno'))
{
  $bandera=false;
  $campos.="Alumno, ";
}

if(verificar_empty('id_resultado'))
{
  $bandera=false;
  $campos.="Resultado, ";
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
  $curso=$_POST['id_curso'];
  $id_curso;
  $alumno=$_POST['id_alumno'];
  $id_alumno;
  $resultado=$_POST['id_resultado'];
  $id_resultado;

  if(!texto($nota)
  {
    $bandera2=false;
  }

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT nota from nota WHERE nota='$nota'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //luego se extrae el id del CURSO de usuario seleccionado
      $sql="SELECT id_curso from curso WHERE nombre_curso='$curso'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_curso=$row["id_curso"];
        }
      }

      //luego se extrae el id del ALUMNO de usuario seleccionado
      $sql="SELECT id_alumno from alumno WHERE nombre_alumno='$alumno'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_alumno=$row["id_alumno"];
        }
      }

      //luego se extrae el id del RESULTADO de usuario seleccionado
      $sql="SELECT id_resultado from resultado WHERE nombre_resultado='$resultado'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_resultado=$row["id_resultado"];
        }
      }

      //se procede a realizar la insercion
      $sql = "INSERT INTO nota VALUES(NULL,'$nota','$id_curso', $id_alumno, $id_resultado)";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#nota\").val(\"\");
        $(\"#id_curso\").val(\"\");
        $(\"#id_alumno\").val(\"\");
        $(\"#id_resultado\").val(\"\");
        buscar_datos();
        Mensaje_Succes('Nota Ingresada');
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
              Mensaje_Error(\"Ya existe un registro con la misma nota\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>

