<?php
include "../../../Functions/PHP/CN.php";
include '../../../Functions/PHP/validation_function.php';

//banderas
$bandera=true;
$bandera2=true;
$bandera3=true;

if(verificar_empty('name'))
{
  $bandera=false;
}

if(verificar_empty('v_alumno'))
{
  $bandera=false;
  echo "
  <script>
  Mensaje_Error(\"No se permite campos vacios alumno\");
  </script>";
}

if(verificar_empty('v_curso'))
{
  $bandera=false;
}

if(verificar_empty('v_docente'))
{
  $bandera=false;
}

if(verificar_empty('v_estado'))
{
  $bandera=false;
}

if(verificar_empty('v_grupo'))
{
  $bandera=false;
}

if(verificar_empty('v_nivel'))
{
  $bandera=false;
}

if(verificar_empty('v_nota'))
{
  $bandera=false;
}

if(verificar_empty('v_responsable'))
{
  $bandera=false;
}

if(verificar_empty('v_resultado'))
{
  $bandera=false;
}

if(verificar_empty('v_tipo_curso'))
{
  $bandera=false;
}

if(verificar_empty('v_tipo_usuario'))
{
  $bandera=false;
}

if(verificar_empty('v_usuario'))
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
  $v_alumno=json_decode($_POST['v_alumno']);
  $v_curso=json_decode($_POST['v_curso']);
  $v_docente=json_decode($_POST['v_docente']);
  $v_estado=json_decode($_POST['v_estado']);
  $v_grupo=json_decode($_POST['v_grupo']);
  $v_nivel=json_decode($_POST['v_nivel']);
  $v_nota=json_decode($_POST['v_nota']);
  $v_responsable=json_decode($_POST['v_responsable']);
  $v_resultado=json_decode($_POST['v_resultado']);
  $v_tipo_curso=json_decode($_POST['v_tipo_curso']);
  $v_tipo_usuario=json_decode($_POST['v_tipo_usuario']);
  $v_usuario=json_decode($_POST['v_usuario']);

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
        //Se actualiza cada de uno de los permisos
        if(!actualizar_permisos($id,'alumno',$v_alumno))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'curso',$v_curso))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'docente',$v_docente))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'estado',$v_estado))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'grupo',$v_grupo))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'nivel',$v_nivel))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'nota',$v_nota))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'nivel',$v_nivel))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'nota',$v_nota))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'responsable',$v_responsable))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'resultado',$v_resultado))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'tipo_curso',$v_tipo_curso))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'tipo_usuario',$v_tipo_usuario))
        {
          $bandera3=false;
        }

        if(!actualizar_permisos($id,'usuario',$v_usuario))
        {
          $bandera3=false;
        }

        if($bandera3==true)
        {
        echo "
        <script>
        buscar_datos(); //se realiza una busqueda
        Mensaje_Succes('Tipo de usuario Actualizado');
        </script>";
        }
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


function actualizar_permisos($id,$area,$vector)
{
  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $ingresar=$vector[0];
  $leer=$vector[1];
  $actualizar=$vector[2];
  $eliminar=$vector[3];

  $sql="SELECT * FROM acceso WHERE id_tipo_usuario=$id AND area='$area'";
  $regis=$objeto_con->conexion->query($sql);

  if($regis->num_rows==0)
  {
    //se realiza una inserción
    $sql="INSERT INTO acceso VALUES (null,'$area',$ingresar,$leer,$actualizar,$eliminar,$id)";
    if ($objeto_con->conexion->query($sql) === TRUE)
    {
      return true;
    }else
    {
      $error=$objeto_con->conexion->error;
      echo "
      <script>
      Mensaje_Error(\"Error: ".$error."\");
      </script>";
      return false;
    }

  }else
  {
    //se realiza una actualización
    $sql="UPDATE acceso SET ingresar=$ingresar,leer=$leer,actualizar=$actualizar,eliminar=$eliminar WHERE id_tipo_usuario=$id AND area='$area'";
    if ($objeto_con->conexion->query($sql) === TRUE)
    {
      return true;
    }else
    {
      $error=$objeto_con->conexion->error;
      echo "
      <script>
      Mensaje_Error(\"Error: ".$error."\");
      </script>";
      return false;
    }
  }
  $objeto_con->Disconnect();
}
?>
