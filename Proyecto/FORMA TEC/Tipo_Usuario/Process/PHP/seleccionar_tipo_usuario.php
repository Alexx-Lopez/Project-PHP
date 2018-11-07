<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM tipo_usuario WHERE id_tipo_usuario=$id";
  $resultado=$objeto_con->conexion->query($sql);

  if($resultado->num_rows>0)
  {
    $fila = $resultado->fetch_assoc();
    $usuario=$fila['categoria_usuario'];

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
                  <td><b>Nombre del tipo:</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"name_tipo_update\" id=\"name_tipo_update\" value=\"$usuario\" size=\"40\"></td>
                </tr>
              </table>
              <br>

              <table class=\"tabla_permisos\">
                <thead>
                  <tr>
                    <td colspan=\"3\"><p style=\"text-align: center;color: white;font-size: 20px;margin: 0;\"><b>Establecer permisos</b></p></td>
                  </tr>
                  <tr style=\"color:white;\">
                    <td><b>Area</b></td>
                    <td><b>Tipo de permiso</b></td>
                    <td><b>Acciones</b></td>
                  </tr>
               </thead>
                <tr>
                  <td>
                    Alumno
                  </td>
                  <td>
                    <label class=\"radio-inline radio_alumno\"><input type=\"radio\" name=\"radio_alumno\" id=\"radio_alumno_total\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_alumno\"><input type=\"radio\" name=\"radio_alumno\" id=\"radio_alumno_parcial\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_alumno\"><input type=\"radio\" name=\"radio_alumno\" id=\"radio_alumno_denegado\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_alumno\"><input type=\"checkbox\" name=\"ck_alumno\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_alumno\"><input type=\"checkbox\" name=\"ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_alumno\"><input type=\"checkbox\" name=\"ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_alumno\"><input type=\"checkbox\" name=\"ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Curso
                  </td>
                  <td>
                    <label class=\"radio-inline radio_curso\"><input type=\"radio\" name=\"radio_curso\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_curso\"><input type=\"radio\" name=\"radio_curso\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_curso\"><input type=\"radio\" name=\"radio_curso\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_curso\"><input type=\"checkbox\" name=\"ck_curso\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_curso\"><input type=\"checkbox\" name=\"ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_curso\"><input type=\"checkbox\" name=\"ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_curso\"><input type=\"checkbox\" name=\"ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Docente
                  </td>
                  <td>
                    <label class=\"radio-inline radio_docente\"><input type=\"radio\" name=\"radio_docente\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_docente\"><input type=\"radio\" name=\"radio_docente\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_docente\"><input type=\"radio\" name=\"radio_docente\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_docente\"><input type=\"checkbox\" name=\"ck_docente\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_docente\"><input type=\"checkbox\" name=\"ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_docente\"><input type=\"checkbox\" name=\"ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_docente\"><input type=\"checkbox\" name=\"ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Grupo
                  </td>
                  <td>
                    <label class=\"radio-inline radio_grupo\"><input type=\"radio\" name=\"radio_grupo\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_grupo\"><input type=\"radio\" name=\"radio_grupo\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_grupo\"><input type=\"radio\" name=\"radio_grupo\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_grupo\"><input type=\"checkbox\" name=\"ck_grupo\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_grupo\"><input type=\"checkbox\" name=\"ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_grupo\"><input type=\"checkbox\" name=\"ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_grupo\"><input type=\"checkbox\" name=\"ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Niveles
                  </td>
                  <td>
                    <label class=\"radio-inline radio_nivel\"><input type=\"radio\" name=\"radio_nivel\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_nivel\"><input type=\"radio\" name=\"radio_nivel\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_nivel\"><input type=\"radio\" name=\"radio_nivel\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_nivel\"><input type=\"checkbox\" name=\"ck_nivel\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_nivel\"><input type=\"checkbox\" name=\"ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_nivel\"><input type=\"checkbox\" name=\"ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_nivel\"><input type=\"checkbox\" name=\"ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Nota
                  </td>
                  <td>
                    <label class=\"radio-inline radio_nota\"><input type=\"radio\" name=\"radio_nota\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_nota\"><input type=\"radio\" name=\"radio_nota\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_nota\"><input type=\"radio\" name=\"radio_nota\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_nota\"><input type=\"checkbox\" name=\"ck_nota\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_nota\"><input type=\"checkbox\" name=\"ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_nota\"><input type=\"checkbox\" name=\"ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_nota\"><input type=\"checkbox\" name=\"ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Responsable
                  </td>
                  <td>
                    <label class=\"radio-inline radio_responsable\"><input type=\"radio\" name=\"radio_responsable\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_responsable\"><input type=\"radio\" name=\"radio_responsable\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_responsable\"><input type=\"radio\" name=\"radio_responsable\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_responsable\"><input type=\"checkbox\" name=\"ck_responsable\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_responsable\"><input type=\"checkbox\" name=\"ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_responsable\"><input type=\"checkbox\" name=\"ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_responsable\"><input type=\"checkbox\" name=\"ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Tipos de Cursos
                  </td>
                  <td>
                    <label class=\"radio-inline radio_tipos_cursos\"><input type=\"radio\" name=\"radio_tipos_cursos\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_tipos_cursos\"><input type=\"radio\" name=\"radio_tipos_cursos\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_tipos_cursos\"><input type=\"radio\" name=\"radio_tipos_cursos\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_tipos_cursos\"><input type=\"checkbox\" name=\"ck_tipos_cursos\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_tipos_cursos\"><input type=\"checkbox\" name=\"ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_tipos_cursos\"><input type=\"checkbox\" name=\"ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_tipos_cursos\"><input type=\"checkbox\" name=\"ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Tipos de Usuarios
                  </td>
                  <td>
                    <label class=\"radio-inline radio_tipo_usuarios\"><input type=\"radio\" name=\"radio_tipo_usuarios\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_tipo_usuarios\"><input type=\"radio\" name=\"radio_tipo_usuarios\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_tipo_usuarios\"><input type=\"radio\" name=\"radio_tipo_usuarios\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_tipo_usuarios\"><input type=\"checkbox\" name=\"ck_tipo_usuarios\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_tipo_usuarios\"><input type=\"checkbox\" name=\"ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_tipo_usuarios\"><input type=\"checkbox\" name=\"ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_tipo_usuarios\"><input type=\"checkbox\" name=\"ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Usuarios
                  </td>
                  <td>
                    <label class=\"radio-inline radio_usuarios\"><input type=\"radio\" name=\"radio_usuario\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline radio_usuarios\"><input type=\"radio\" name=\"radio_usuarios\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline radio_usuarios\"><input type=\"radio\" name=\"radio_usuarios\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline ck_usuarios\"><input type=\"checkbox\" name=\"ck_usuarios\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline ck_usuarios\"><input type=\"checkbox\" name=\"ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_usuarios\"><input type=\"checkbox\" name=\"ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline ck_usuarios\"><input type=\"checkbox\" name=\"ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
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
