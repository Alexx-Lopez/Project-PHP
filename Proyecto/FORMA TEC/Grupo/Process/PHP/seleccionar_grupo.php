<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM grupo WHERE id_grupo=$id";
  $resultado=$objeto_con->conexion->query($sql);

  //consultas auxiliares
  //docentes
  $sql2="SELECT id_docente, concat_ws(' ',nombres_docente,apellidos_docente) as nombre_docente FROM docente";
  $resultado2=$objeto_con->conexion->query($sql2);

  //cursos
  $sql3="select id_curso, nombre_curso from curso";
  $resultado3=$objeto_con->conexion->query($sql3);

  if($resultado->num_rows>0)
  {
    $fila = $resultado->fetch_assoc();
    //$usuario=$fila['username'];
    //$id_categoria=$fila['id_tipo_usuario'];
    $horario=$fila['horario'];
    $fecha_inicio=$fila['fecha_inicio'];
    $fecha_fin=$fila['fecha_fin'];
    $id_docente=$fila['id_docente'];
    $id_curso=$fila['id_curso'];

    $salida.=
    "<!-- Modal 2-->
      <div class=\"modal fade\" id=\"modalupdate\" role=\"dialog\">
        <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\" style=\"background-color: rgba(255, 255, 255, 0.86);\">
          <div class=\"modal-header\" style=\"color: #fff;background-color: #337ab7;border-color: #337ab7;\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            <h4 class=\"modal-title\" style=\"text-align:center;\">Editar Registro</h4>
            </div>
            <div class=\"modal-body\">
              <table class=\"tabla_update\">
                <thead>
                  <tr>
                    <td colspan=\"2\">
                    <p style=\"text-align: center;color: white !important;margin: 0;font-size: 20px;\"><strong>Datos</strong></p>
                    </td>
                  </tr>
                </thead>
                <tr>
                  <td><b>ID:</b></td>
                  <td><p style=\"margin:0 !important;\">$id</p></td>
                </tr>
                <tr>
                  <td><b>Horario:</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"horario_update\" id=\"horario_update\" value=\"$horario\" size=\"40\"></td>
                </tr>
                <tr>
                  <td><b>Fecha de inicio:</b></td>
                  <td><input type=\"date\" class=\"form-control\" name=\"fecha_inicio_update\" id=\"fecha_inicio_update\" value=\"$fecha_inicio\"></td>
                </tr>
                <tr>
                  <td><b>Fecha de fin</b></td>
                  <td><input type=\"date\" class=\"form-control\" name=\"fecha_fin_update\" id=\"fecha_fin_update\" value=\"$fecha_fin\"></td>
                </tr>
                <tr>
                  <td><b>Docente</b></td>
                  <td>
                    <select class=\"form-control\" name='docente_update' id='docente_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($docentes = $resultado2->fetch_assoc()){
                        if($id_docente==$docentes['id_docente'])
                        {
                          $salida.= "<option selected>".$docentes['nombre_docente']."</option>";
                        }else
                        {
                          $salida.= "<option>".$docentes['nombre_docente']."</option>";
                        }
                      }

    $salida.=       "</select>
                  </td>
                </tr>
                <tr>
                  <td><b>Curso</b></td>
                  <td>
                    <select class=\"form-control\" name='curso_update' id='curso_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($cursos = $resultado3->fetch_assoc()){
                        if($id_curso==$cursos['id_curso'])
                        {
                          $salida.= "<option selected>".$cursos['nombre_curso']."</option>";
                        }else
                        {
                          $salida.= "<option>".$cursos['nombre_curso']."</option>";
                        }
                      }

    $salida.=       "</select>
                  </td>
                </tr>
              </table>
              <br>
              <button type=\"button\" class=\"btn btn-default boton_actualizar\" data-dismiss=\"modal\" onclick=\"actualizar_datos($id);\">Actualizar</button>
            </div>
            <div class=\"modal-footer\">
            </div>
          </div>
        </div>
      </div>
      <script>
        $(\"#modalupdate\").modal(\"show\");
      </script>";
    }
  $objeto_con->Disconnect();
  echo $salida;
?>
