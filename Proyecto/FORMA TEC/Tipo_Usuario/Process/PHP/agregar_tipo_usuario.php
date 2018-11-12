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
  Mensaje_Error(\"No se permite campos vacios\");
  </script>";

}else
{
  //se procede a analizar los textos de los campos que respeten ciertas normas
  $name=$_POST['name'];
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

    //primero se realiza una verificación que no haya un registro con el mismo Nombre
    $sql="SELECT * from tipo_usuario WHERE categoria_usuario='$name'";
    $regis=$objeto_con->conexion->query($sql);

    //si no hay registros se procede a la inserción en caso contrario se muestra un mensaje
    if($regis->num_rows==0)
    {
      //se procede a realizar la insercion
      $sql = "INSERT INTO tipo_usuario VALUES(NULL,'$name')";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        //luego de insertar el tipo de usuario se insertan todos los permisos
        //primero se extrae el id del tipo de usuario que se acaba de insertar
        $sql="SELECT id_tipo_usuario from tipo_usuario WHERE categoria_usuario='$name'";
        $regis=$objeto_con->conexion->query($sql);

        $fila = $regis->fetch_assoc();
        $id_tipo=$fila['id_tipo_usuario'];

        //despues de extraer el id del tipo se realizan las inserciones de los permisos
        if(!insertar_permisos('alumno',$v_alumno,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('curso',$v_curso,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('docente',$v_docente,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('estado',$v_docente,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('grupo',$v_grupo,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('nivel',$v_nivel,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('nota',$v_nota,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('responsable',$v_responsable,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('resultado',$v_responsable,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('tipo_curso',$v_tipo_curso,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('tipo_usuario',$v_tipo_usuario,$id_tipo))
        {
          $bandera3=false;
        }

        if(!insertar_permisos('usuario',$v_usuario,$id_tipo))
        {
          $bandera3=false;
        }

        if($bandera3==true)
        {
        echo "
          <script>
          //se limpian los inputs
          $(\"#name_tipo\").val(\"\");
          buscar_datos();
          Mensaje_Succes('Usuario Ingresado');
          </script>";
        }
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

function insertar_permisos($area,$vector,$id)
{
  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $ingresar=$vector[0];
  $leer=$vector[1];
  $actualizar=$vector[2];
  $eliminar=$vector[3];
  /*echo "<script>
          alert(\"Ingresar: $ingresar   Leer:$leer  Actualizar: $actualizar  Eliminar: $eliminar\");
        </script>";*/
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
  $objeto_con->Disconnect();
}
?>
