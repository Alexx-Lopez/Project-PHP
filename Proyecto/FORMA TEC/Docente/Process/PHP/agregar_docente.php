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
}

if(verificar_empty('apellidos'))
{
  $bandera=false;
  $campos.="Apellidos,";
}

if(verificar_empty('direccion'))
{
  $bandera=false;
  $campos.="Direccion,";
}

if(verificar_empty('telefono'))
{
  $bandera=false;
  $campos.="Teléfono,";
}

if(verificar_empty('correo'))
{
  $bandera=false;
  $campos.="Email,";
}

if(verificar_empty('departamento'))
{
  $bandera=false;
  $campos.="Departamento,";
}

if(verificar_empty('municipio'))
{
  $bandera=false;
  $campos.="Municipio,";
}

if(verificar_empty('sexo'))
{
  $bandera=false;
  $campos.="Sexo,";
}

if(verificar_empty('fecha_nac'))
{
  $bandera=false;
  $campos.="Fecha de nacimiento,";
}

if(verificar_empty('edad'))
{
  $bandera=false;
  $campos.="Edad,";
}

if(verificar_empty('dui'))
{
  $bandera=false;
  $campos.="DUI,";
}

if(verificar_empty('profesion'))
{
  $bandera=false;
  $campos.="Profesión,";
}

if($bandera==false)
{
  echo "
  <script>
  Mensaje_Error(\"Error, los campos: <?php echo $campos; ?> se encuentran vacios\");
  </script>";

}else{  
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
  
  //validaciones back end

  //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
  if($bandera2){
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT * FROM docente WHERE (nombres_docente='$nombres' AND apellidos_docente='$apellidos' AND fecha_nacimiento='$fecha_nac') OR dui='$dui'";    
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {      
      //se procede a realizar la insercion
      $sql = "INSERT INTO docente VALUES(NULL,'$nombres','$apellidos','$direccion','$telefono','$correo','$departamento','$municipio','$sexo','$fecha_nac',$edad,'$dui','$profesion')";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        echo "
        <script>
        //se limpian los inputs
        $(\"#nombres\").val(\"\");
        $(\"#apellidos\").val(\"\");
        $(\"#direccion\").val(\"\");
        $(\"#telefono\").val(\"\");
        $(\"#correo\").val(\"\");
        $(\"#departamento\").val(\"\");
        $(\"#municipio\").val(\"\");
        $(\"#sexo\").val(\"\");
        $(\"#fecha_nac\").val(\"\");
        $(\"#edad\").val(\"\");
        $(\"#dui\").val(\"\");
        $(\"#profesion\").val(\"\");
        buscar_datos();
        Mensaje_Succes('Docente Ingresado');
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
              Mensaje_Error(\"Ya existe un registro con información similar. Revise DUI o Nombres\");
            </script>";
    }
    $objeto_con->Disconnect();
  }
}
?>
