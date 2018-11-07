<?php
include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;

$campos="";

if(verificar_empty('nombres'))
{
  $bandera=false;
  $campos.="Nombres,";
}else
{
  $_SESSION['res_nombres']=$_POST['nombres'];
}

if(verificar_empty('apellidos'))
{
  $bandera=false;
  $campos.="Apellidos, ";
}else
{
  $_SESSION['res_apellidos']=$_POST['apellidos'];
}

if(verificar_empty('direccion'))
{
  $bandera=false;
  $campos.="Dirección, ";
}else
{
  $_SESSION['res_direccion']=$_POST['direccion'];
}

if(verificar_empty('telefono'))
{
  $bandera=false;
  $campos.="Teléfono, ";
}else
{
  $_SESSION['res_telefono']=$_POST['telefono'];
}

if(verificar_empty('correo'))
{
  $bandera=false;
  $campos.="Email, ";
}else
{
  $_SESSION['res_correo']=$_POST['correo'];
}

if(verificar_empty('departamento'))
{
  $bandera=false;
  $campos.="Departamento, ";
}else
{
  $_SESSION['res_departamento']=$_POST['departamento'];
}

if(verificar_empty('municipio'))
{
  $bandera=false;
  $campos.="Municipio, ";
}else
{
  $_SESSION['res_municipio']=$_POST['municipio'];
}

if(verificar_empty('sexo'))
{
  $bandera=false;
  $campos.="Sexo, ";
}else
{
  $_SESSION['res_sexo']=$_POST['sexo'];
}

if(verificar_empty('fecha_nac'))
{
  $bandera=false;
  $campos.="Fecha de nacimiento, ";
}else
{
  $_SESSION['res_fecha_nac']=$_POST['fecha_nac'];
}

if(verificar_empty('edad'))
{
  $bandera=false;
  $campos.="Edad, ";
}else
{
  $_SESSION['res_edad']=$_POST['edad'];
}

if(verificar_empty('dui'))
{
  $bandera=false;
  $campos.="DUI, ";
}else
{
  $_SESSION['res_dui']=$_POST['dui'];
}

if(verificar_empty('profesion'))
{
  $bandera=false;
  $campos.="Profesion, ";
}else
{
  $_SESSION['res_profesion']=$_POST['profesion'];
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
  $nombres=$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $direccion=$_POST['direccion'];
  $telefono=$_POST['telefono'];
  $correo=$_POST['correo'];
  $departamento=$_POST['departamento'];
  $municipio=$_POST['municipio'];
  $sexo=$_POST['sexo'];
  $fecha_nac=$_POST['fecha_nac'];
  $edad=$_POST['edad'];
  $dui=$_POST['dui'];
  $profesion=$_POST['profesion'];

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();    

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT * FROM docente WHERE (nombres_docente='$nombres' AND apellidos_docente='$apellidos' AND fecha_nacimiento='$fecha_nac') OR dui='$dui'";   
    $regis=$objeto_con->conexion->query($sql);

    //si no existe otro registro registro se procede a la actualizacion en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //se procede a realizar la actualizacion
      $sql = "UPDATE docente SET nombres_docente='$nombres', apellidos_docente='$apellidos', direccion='$direccion', telefono='$telefono', correo='$correo', 
      departamento='$departamento', municipio='$municipio', sexo='$sexo', fecha_nacimiento='$fecha_nac', edad=$edad, dui='$dui', profesion='$profesion' WHERE id_docente=$id";

      if ($objeto_con->conexion->query($sql) === TRUE){
        //Se procede a colocar null las variables POST
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Docente Actualizado');
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
              Mensaje_Error(\"Ya existe un registro con datos similares\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
