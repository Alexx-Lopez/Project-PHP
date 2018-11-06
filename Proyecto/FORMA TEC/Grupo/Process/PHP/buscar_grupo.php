<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";
  $sql="select grupo.id_grupo, grupo.horario,grupo.fecha_inicio,grupo.fecha_fin, concat_ws(' ',docente.nombres_docente,docente.apellidos_docente) as nombre_docente, curso.nombre_curso from grupo inner join docente on grupo.id_docente=docente.id_docente inner join curso on grupo.id_curso=curso.id_curso";

  if(isset($_POST['consulta']))
  {
    $q=$objeto_con->conexion->real_escape_string($_POST['consulta']);
    //$sql="SELECT id_usuario, username FROM usuario WHERE username LIKE '%".$q."%'";    
    $sql="select grupo.id_grupo, grupo.horario,grupo.fecha_inicio,grupo.fecha_fin, concat_ws(' ',docente.nombres_docente,docente.apellidos_docente) as nombre_docente, curso.nombre_curso from grupo inner join docente on grupo.id_docente=docente.id_docente inner join curso on grupo.id_curso=curso.id_curso 
    WHERE grupo.horario LIKE '%".$q."%' OR grupo.fecha_inicio LIKE '%".$q."%' OR grupo.fecha_fin LIKE '%".$q."%' OR docente.nombres_docente LIKE '%".$q."%' OR docente.apellidos_docente LIKE '%".$q."%' OR curso.nombre_curso LIKE '%".$q."%'";
  }


  $resultado=$objeto_con->conexion->query($sql);

  if($resultado->num_rows>0)
  {
    $salida.="<table class=\"tabla_busqueda\">
                <thead>
                  <tr>
                    <td><b>ID</b></td>
                    <td><b>Horario</b></td>
                    <td><b>Fecha de inicio</b></td>
                    <td><b>Fecha de fin</b></td>
                    <td><b>Docente</b></td>
                    <td><b>Curso</b></td>
                    <td><b>Opciones</b></td>
                  </tr>
                </thead>
              <tbody>";
      while($fila = $resultado->fetch_assoc())
      {
        $salida.="<tr>
                    <td>".$fila['id_grupo']."</td>
                    <td>".$fila['horario']."</td>
                    <td>".$fila['fecha_inicio']."</td>
                    <td>".$fila['fecha_fin']."</td>
                    <td>".$fila['nombre_docente']."</td>
                    <td>".$fila['nombre_curso']."</td>
                    <td>
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_editar\"  data-id='".$fila['id_grupo']."' onclick=\"seleccionar_datos('".$fila['id_grupo']."');\">
                        <span class=\"glyphicon glyphicon-pencil\"></span>
                      </button>
                      &nbsp;&nbsp;&nbsp;
                      <button type=\"button\" class=\"btn btn-default btn-sm boton_eliminar\" data-toggle=\"modal\" data-target=\"#modaldelete\" data-id='".$fila['id_grupo']."' onclick=\"asignar_id('".$fila['id_grupo']."');\">
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
