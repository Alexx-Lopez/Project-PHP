<?php

  include "../../../Functions/PHP/CN.php";
  include '../../../Functions/PHP/validation_function.php';

  //banderas
  $bandera=true;  

  if(verificar_empty('id'))
  {
    $bandera=false;
    //trackin
    console.log('Error en id');
  }

  if($bandera!=false)
  {
    $id=$_POST['id'];
    $objeto_con=new Conexion();
    $objeto_con->Connect();

    //Se procede a realizar la eliminación
    $sql = "DELETE from grupo where id_grupo=$id";

    if ($objeto_con->conexion->query($sql) === TRUE){
      echo "<script>
              buscar_datos();
              Mensaje_Succes(\"Registro Eliminado\");
            </script>";
    }else {
      echo "<script>
              Mensaje_Error(\"Error al eliminar el registro.\");
            </script>";
    }

    $objeto_con->Disconnect();
  }else
  {
    echo "<script>
            Mensaje_Error(\"Error al eliminar el registro.\");
          </script>";
  }
?>
