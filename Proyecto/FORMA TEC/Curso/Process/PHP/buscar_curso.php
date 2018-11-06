<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();  

  $salida='';

  $sql="SELECT * FROM curso";

  if(isset($_POST['consulta']))
  {
    $q=$objeto_con->conexion->real_escape_string($_POST['consulta']);
    $sql="SELECT id_curso, nombre_curso, descripcion FROM curso WHERE nombre_curso LIKE '%".$q."%'";
  }

  $resultado=$objeto_con->conexion->query($sql);

  if($resultado->num_rows>0)
  {
    $salida.="<table class=\"tabla_busqueda\">
                <thead>
                  <tr>
                    <td><b>ID</b></td>
                    <td><b>Nombre de curso</b></td>
                    <td><b>Descripción</b></td>
                    <td><b>Opciones</b></td>
                  </tr>
                </thead>
              <tbody>";
      while($fila = $resultado->fetch_assoc())
      {
        $salida.="<tr>
                    <td>".$fila['id_curso']."</td>
                    <td>".$fila['nombre_curso']."</td>
                    <td>".$fila['descripcion']."</td>
                    <td>
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_editar\" data-id='".$fila['id_curso']."' onclick=\"seleccionar_datos('".$fila['id_curso']."');\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                      </button>
                      &nbsp;&nbsp;&nbsp;
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_eliminar\" data-toggle=\"modal\" data-target=\"#modaldelete\" data-id='".$fila['id_curso']."' onclick=\"asignar_id('".$fila['id_curso']."');\">
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

  $objeto_con->Disconnect();
  echo $salida;
?>
