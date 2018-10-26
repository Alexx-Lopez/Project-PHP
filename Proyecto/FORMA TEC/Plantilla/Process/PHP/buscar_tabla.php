<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";
  $sql=/*consulta sql general*/;

  if(isset($_POST['consulta']))
  {
    $q=$objeto_con->conexion->real_escape_string($_POST['consulta']);
    $sql=/*consulta sql especifica*/;
  }


  $resultado=$objeto_con->conexion->query($sql);

  if($resultado->num_rows>0)
  {
    $salida.="<table class=\"tabla_busqueda\">
                <thead>
                  <tr>
                    //creación de columnas
                  </tr>
                </thead>
              <tbody>";
      while($fila = $resultado->fetch_assoc())
      {
        $salida.="<tr>
                    <td>".$fila[]."</td>
                    <td>".$fila[]."</td>
                    <td>"./*nfilas.*/"</td>
                    <td>
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_editar\"  data-id='".$fila['id_tabla']."' onclick=\"seleccionar_datos('".$fila['id_tabla']."');\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                      </button>
                      &nbsp;&nbsp;&nbsp;
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_eliminar\" data-toggle=\"modal\" data-target=\"#modaldelete\" data-id='".$fila['id_tabla']."' onclick=\"asignar_id('".$fila['id_tabla']."');\">
                        <span class=\"glyphicon glyphicon-trash\"></span>
                      </button>
                    </td>
                  </tr>";
      }
      $salida.="</tbody>
              </table>";

  }else
  {
    $salida.="<br><br>";
    $salida.="<p style=\"color:red;text-align: center;\"><b>No hay datos</b></p>";
  }

  //los datos que se estan ingresando data-id de los botones asi tambien en funciones en llamadas onclick
  //corresponde al id de la tabla en la cual estan trabajando

  $objeto_con->Disconnect();
  echo $salida;
?>
