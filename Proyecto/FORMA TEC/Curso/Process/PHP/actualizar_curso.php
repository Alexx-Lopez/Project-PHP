<?php
  include "../../../Functions/PHP/CN.php";
  include '../../../Functions/PHP/validation_function.php';

  //codigo PHP para hacer la actualizacion

  //banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('id_curso'))
{
  $bandera=false;
  $campos.="ID de curso,";
}else
{
  $_SESSION['res_id_curso']=$_POST['id_curso'];
}

if(verificar_empty('nombre_curso'))
{
  $bandera=false;
  $campos.="Nombre de curso,";
}else
{
  $_SESSION['res_nombre_curso']=$_POST['nombre_curso'];
}

if(verificar_empty('descripcion'))
{
  $bandera=false;
  $campos.="Descripcion, ";
}else
{
  $_SESSION['res_descripcion']=$_POST['descripcion'];
}

if(verificar_empty('tipo_curso'))
{
  $bandera=false;
  $campos.="Tipo de Curso, ";
}else
{
  $_SESSION['res_tipo_curso']=$_POST['tipo_curso'];
}

if(verificar_empty('nivel'))
{
  $bandera=false;
  $campos.="Tipo de Nivel, ";
}else
{
  $_SESSION['res_nivel']=$_POST['nivel'];
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
  $nivel=$_POST['nivel'];
  $id=$_POST['id'];
  $id_tipo_curso;
  $id_nivel;


  if(!texto($id_curso))
  {
    $bandera2=false;
  }

  if(!texto($nombre_curso))
  {
    $bandera2=false;
  }

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se verifica que no exista algun registro con ese mismo nombre diferente al que se pretende actualizar
    $sql="SELECT * from curso WHERE nombre_curso='$nombre_curso'";
    $regis=$objeto_con->conexion->query($sql);

     //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
     if($regis->num_rows==0)
     {

       //luego se extrae el id del curso seleccionado
       $sql="SELECT id_tipo_curso from curso WHERE nombre_curso='$tipo_curso'";

       $result = $objeto_con->conexion->query($sql);

       if ($result->num_rows > 0)
       {
         while($row = mysqli_fetch_assoc($result)) {
           $id_tipo_curso=$row["id_tipo_curso"];
         }
       }

       //luego se extrae el id del nivel seleccionado
       $sql="SELECT id_nivel from nivel WHERE nombre_nivel='$nivel'";

       $result = $objeto_con->conexion->query($sql);

       if ($result->num_rows > 0)
       {
         while($row = mysqli_fetch_assoc($result)) {
           $id_nivel=$row["id_nivel"];
         }
       }

       //se procede a realizar la actualizacion
       $sql = "UPDATE curso SET id_curso='$id_curso', nombre_curso='$nombre_curso', descripcion='$descripcion', tipo_curso=$id_tipo_curso, nivel=$id_nivel WHERE id_curso=$id";

       if ($objeto_con->conexion->query($sql) === TRUE){
         //Se procede a colocar null las variables POST
         echo "
         <script>
         buscar_datos(); //se realiza una busqueda
         Mensaje_Succes('Curso Actualizado');
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
