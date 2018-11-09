<?php

  include "../../../Functions/PHP/CN.php";
  include '../../../Functions/PHP/validation_function.php';

  //codigo PHP para realizar la inserción

  //banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('id_curso'))
{
  $bandera=false;
  $campos.="Id del curso,";
}

if(verificar_empty('nombre_curso'))
{
  $bandera=false;
  $campos.="Nombre del curso,";
}

if(verificar_empty('descripcion'))
{
  $bandera=false;
  $campos.="Descripcion,";
}

if(verificar_empty('tipo_curso'))
{
  $bandera=false;
  $campos.="Tipo de curso, ";
}

if(verificar_empty('nivel'))
{
  $bandera=false;
  $campos.="Nivel, ";
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
  $id_curso=$_POST['id_curso'];
  $nombre_curso=$_POST['nombre_curso'];
  $descripcion=$_POST['descripcion'];
  $tipo_curso=$_POST['tipo_curso'];
  $id_tipo_curso;
  $nivel=$_POST['nivel'];
  $id_nivel;

  if(!texto($id_curso))
  {
    $bandera2=false;
  }

  if(!texto($nombre_curso))
  {
    $bandera2=false;
  }

  if(!texto($descripcion))
  {
    $bandera2=false;
  }


  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT id_curso from curso WHERE nombre_curso='$nombre_curso'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //luego se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_tipo_curso from tipo_curso WHERE nombre_categoria='$tipo_curso'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_tipo_curso=$row["id_tipo_curso"];
        }
      }

      if($regis->num_rows==0)
    {
      //luego se extrae el id del tipo de nivel seleccionado
      $sql="SELECT id_nivel from nivel WHERE nombre_nivel='$nivel'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_nivel=$row["id_nivel"];
        }
      }

      //se procede a realizar la insercion
      $sql = "INSERT INTO curso VALUES('$id_curso','$nombre_curso','$descripcion',$id_tipo_curso, $id_nivel)";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#id_curso\").val(\"\");
        $(\"#nombre_curso\").val(\"\");
        $(\"#descripcion\").val(\"\");
        $(\"#tipo_curso\").val(\"\");
        $(\"#nivel\").val(\"\");
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
}
?>
