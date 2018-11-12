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

    //parte del modal
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
                    <label class=\"radio-inline u_radio_alumno\"><input type=\"radio\" name=\"u_radio_alumno\" id=\"u_radio_alumno_total\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_alumno\"><input type=\"radio\" name=\"u_radio_alumno\" id=\"u_radio_alumno_parcial\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_alumno\"><input type=\"radio\" name=\"u_radio_alumno\" id=\"u_radio_alumno_denegado\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_alumno\"><input type=\"checkbox\" name=\"u_ck_alumno\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_alumno\"><input type=\"checkbox\" name=\"u_ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_alumno\"><input type=\"checkbox\" name=\"u_ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_alumno\"><input type=\"checkbox\" name=\"u_ck_alumno\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Curso
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_curso\"><input type=\"radio\" name=\"u_radio_curso\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_curso\"><input type=\"radio\" name=\"u_radio_curso\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_curso\"><input type=\"radio\" name=\"u_radio_curso\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_curso\"><input type=\"checkbox\" name=\"u_ck_curso\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_curso\"><input type=\"checkbox\" name=\"u_ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_curso\"><input type=\"checkbox\" name=\"u_ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_curso\"><input type=\"checkbox\" name=\"u_ck_curso\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Docente
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_docente\"><input type=\"radio\" name=\"u_radio_docente\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_docente\"><input type=\"radio\" name=\"u_radio_docente\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_docente\"><input type=\"radio\" name=\"u_radio_docente\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_docente\"><input type=\"checkbox\" name=\"u_ck_docente\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_docente\"><input type=\"checkbox\" name=\"u_ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_docente\"><input type=\"checkbox\" name=\"u_ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_docente\"><input type=\"checkbox\" name=\"u_ck_docente\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Estado
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_estado\"><input type=\"radio\" name=\"u_radio_estado\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_estado\"><input type=\"radio\" name=\"u_radio_estado\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_estado\"><input type=\"radio\" name=\"u_radio_estado\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_estado\"><input type=\"checkbox\" name=\"u_ck_estado\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_estado\"><input type=\"checkbox\" name=\"u_ck_estado\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_estado\"><input type=\"checkbox\" name=\"u_ck_estado\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_estado\"><input type=\"checkbox\" name=\"u_ck_estado\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Grupo
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_grupo\"><input type=\"radio\" name=\"u_radio_grupo\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_grupo\"><input type=\"radio\" name=\"u_radio_grupo\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_grupo\"><input type=\"radio\" name=\"u_radio_grupo\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_grupo\"><input type=\"checkbox\" name=\"u_ck_grupo\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_grupo\"><input type=\"checkbox\" name=\"u_ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_grupo\"><input type=\"checkbox\" name=\"u_ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_grupo\"><input type=\"checkbox\" name=\"u_ck_grupo\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Niveles
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_nivel\"><input type=\"radio\" name=\"u_radio_nivel\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_nivel\"><input type=\"radio\" name=\"u_radio_nivel\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_nivel\"><input type=\"radio\" name=\"u_radio_nivel\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_nivel\"><input type=\"checkbox\" name=\"u_ck_nivel\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_nivel\"><input type=\"checkbox\" name=\"u_ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_nivel\"><input type=\"checkbox\" name=\"u_ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_nivel\"><input type=\"checkbox\" name=\"u_ck_nivel\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Nota
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_nota\"><input type=\"radio\" name=\"u_radio_nota\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_nota\"><input type=\"radio\" name=\"u_radio_nota\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_nota\"><input type=\"radio\" name=\"u_radio_nota\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_nota\"><input type=\"checkbox\" name=\"u_ck_nota\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_nota\"><input type=\"checkbox\" name=\"u_ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_nota\"><input type=\"checkbox\" name=\"u_ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_nota\"><input type=\"checkbox\" name=\"u_ck_nota\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Responsable
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_responsable\"><input type=\"radio\" name=\"u_radio_responsable\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_responsable\"><input type=\"radio\" name=\"u_radio_responsable\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_responsable\"><input type=\"radio\" name=\"u_radio_responsable\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_responsable\"><input type=\"checkbox\" name=\"u_ck_responsable\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_responsable\"><input type=\"checkbox\" name=\"u_ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_responsable\"><input type=\"checkbox\" name=\"u_ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_responsable\"><input type=\"checkbox\" name=\"u_ck_responsable\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Resultado
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_resultado\"><input type=\"radio\" name=\"u_radio_resultado\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_resultado\"><input type=\"radio\" name=\"u_radio_resultado\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_resultado\"><input type=\"radio\" name=\"u_radio_resultado\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_resultado\"><input type=\"checkbox\" name=\"u_ck_resultado\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_resultado\"><input type=\"checkbox\" name=\"u_ck_resultado\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_resultado\"><input type=\"checkbox\" name=\"u_ck_resultado\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_resultado\"><input type=\"checkbox\" name=\"u_ck_resultado\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Tipos de Cursos
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_tipos_cursos\"><input type=\"radio\" name=\"u_radio_tipos_cursos\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_tipos_cursos\"><input type=\"radio\" name=\"u_radio_tipos_cursos\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_tipos_cursos\"><input type=\"radio\" name=\"u_radio_tipos_cursos\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_tipos_cursos\"><input type=\"checkbox\" name=\"u_ck_tipos_cursos\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_tipos_cursos\"><input type=\"checkbox\" name=\"u_ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_tipos_cursos\"><input type=\"checkbox\" name=\"u_ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_tipos_cursos\"><input type=\"checkbox\" name=\"u_ck_tipos_cursos\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Tipos de Usuarios
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_tipo_usuarios\"><input type=\"radio\" name=\"u_radio_tipo_usuarios\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_tipo_usuarios\"><input type=\"radio\" name=\"u_radio_tipo_usuarios\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_tipo_usuarios\"><input type=\"radio\" name=\"u_radio_tipo_usuarios\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_tipo_usuarios\"><input type=\"checkbox\" name=\"u_ck_tipo_usuarios\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_tipo_usuarios\"><input type=\"checkbox\" name=\"u_ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_tipo_usuarios\"><input type=\"checkbox\" name=\"u_ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_tipo_usuarios\"><input type=\"checkbox\" name=\"u_ck_tipo_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    Usuarios
                  </td>
                  <td>
                    <label class=\"radio-inline u_radio_usuarios\"><input type=\"radio\" name=\"u_radio_usuarios\" value=\"total\" checked>Total</label>
                    <label class=\"radio-inline u_radio_usuarios\"><input type=\"radio\" name=\"u_radio_usuarios\" value=\"parcial\" disabled>Parcial</label>
                    <label class=\"radio-inline u_radio_usuarios\"><input type=\"radio\" name=\"u_radio_usuarios\" value=\"denegado\" >Denegado</label>
                  </td>
                  <td style=\"text-align:center;\">
                    <label class=\"checkbox-inline u_ck_usuarios\"><input type=\"checkbox\" name=\"u_ck_usuarios\" value=\"\"><i class=\"material-icons\" style=\"font-size: 30px;\">note_add</i></label>
                    <label class=\"checkbox-inline u_ck_usuarios\"><input type=\"checkbox\" name=\"u_ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-list-alt\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_usuarios\"><input type=\"checkbox\" name=\"u_ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-refresh\" style=\"font-size: 25px;\"></span></label>
                    <label class=\"checkbox-inline u_ck_usuarios\"><input type=\"checkbox\" name=\"u_ck_usuarios\" value=\"\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 25px;\"></span></label>
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
      </script>"
      ;


      //codigo javascript
      $salida.=
      "<script type=\"text/javascript\">
      $(function(){
        //se deshabilitan los checkbox
          $(\".u_ck_alumno input[type=checkbox]\").prop('disabled',true); //alumno
          $(\".u_ck_curso input[type=checkbox]\").prop('disabled',true);  //curso
          $(\".u_ck_docente input[type=checkbox]\").prop('disabled',true);  //docente
          $(\".u_ck_estado input[type=checkbox]\").prop('disabled',true);  //estado
          $(\".u_ck_grupo input[type=checkbox]\").prop('disabled',true);  //grupo
          $(\".u_ck_nivel input[type=checkbox]\").prop('disabled',true);  //niveles
          $(\".u_ck_nota input[type=checkbox]\").prop('disabled',true);  //notas
          $(\".u_ck_responsable input[type=checkbox]\").prop('disabled',true);  //responsable
          $(\".u_ck_resultado input[type=checkbox]\").prop('disabled',true);  //resultado
          $(\".u_ck_tipos_cursos input[type=checkbox]\").prop('disabled',true);  //tipos cursos
          $(\".u_ck_tipo_usuarios input[type=checkbox]\").prop('disabled',true);  //tipos usuarios
          $(\".u_ck_usuarios input[type=checkbox]\").prop('disabled',true);  //usuarios

          u_control_radio('u_radio_alumno','u_ck_alumno');  //radio_alumno
          u_control_radio('u_radio_curso','u_ck_curso'); //radio_curso
          u_control_radio('u_radio_docente','u_ck_docente'); //radio_docente
          u_control_radio('u_radio_estado','u_ck_estado'); //radio_estado
          u_control_radio('u_radio_grupo','u_ck_grupo');  //radio_grupo
          u_control_radio('u_radio_nivel','u_ck_nivel');  //radio_nivel
          u_control_radio('u_radio_nota','u_ck_nota');  //radio_nota
          u_control_radio('u_radio_responsable','u_ck_responsable');  //radio_responsable
          u_control_radio('u_radio_resultado','u_ck_resultado');  //radio_resultado
          u_control_radio('u_radio_tipos_cursos','u_ck_tipos_cursos');  //radio_tipos_cursos
          u_control_radio('u_radio_tipo_usuarios','u_ck_tipo_usuarios'); //radio_tipo_usuarios
          u_control_radio('u_radio_usuarios','u_ck_usuarios');

          function u_control_radio(radio,checkbox)
          {
            $('.'+radio).click(function(){
              var rb=$('input:radio[name='+radio+']:checked').val()
              if(rb==\"total\"){
                $(\".\"+checkbox+\" input[type=checkbox]\").prop('checked',true);
              }
              if(rb==\"denegado\")
              {
                $(\".\"+checkbox+\" input[type=checkbox]\").prop('checked',false);
              }
            });
          }

        });
       </script>";

       llamar_permisos('alumno',$id,'u_ck_alumno','u_radio_alumno');
       llamar_permisos('curso',$id,'u_ck_curso','u_radio_curso');
       llamar_permisos('docente',$id,'u_ck_docente','u_radio_docente');
       llamar_permisos('estado',$id,'u_ck_estado','u_radio_estado');
       llamar_permisos('grupo',$id,'u_ck_grupo','u_radio_grupo');
       llamar_permisos('nivel',$id,'u_ck_nivel','u_radio_nivel');
       llamar_permisos('nota',$id,'u_ck_nota','u_radio_nota');
       llamar_permisos('responsable',$id,'u_ck_responsable','u_radio_responsable');
       llamar_permisos('resultado',$id,'u_ck_resultado','u_radio_resultado');
       llamar_permisos('tipo_curso',$id,'u_ck_tipos_cursos','u_radio_tipos_cursos');
       llamar_permisos('tipo_usuario',$id,'u_ck_tipo_usuarios','u_radio_tipo_usuarios');
       llamar_permisos('usuario',$id,'u_ck_usuarios','u_radio_usuarios');
    }

    function llamar_permisos($area,$id,$checkbox,$radio)
    {
      global $salida;
      $objeto_con=new Conexion();
      $objeto_con->Connect();

      $sql="SELECT ingresar,leer,actualizar,eliminar FROM acceso WHERE area='$area' AND id_tipo_usuario=$id";
      $resultado=$objeto_con->conexion->query($sql);

      $fila = $resultado->fetch_assoc();
      $ingresar=$fila['ingresar'];
      $leer=$fila['leer'];
      $actualizar=$fila['actualizar'];
      $eliminar=$fila['eliminar'];



        if($ingresar==1 && $leer==1 && $actualizar==1 && $eliminar==1)
        {
          $salida.=
          "<script type=\"text/javascript\">
          $(function () {
            $(\"input[name=$radio][value='total']\").prop('checked',true);
            $(\".$checkbox input[type=checkbox]\").prop('checked',true);
          });
          </script>";

        }else
        {
          $salida.=
          "<script type=\"text/javascript\">
          $(function () {
            $(\"input[name=$radio][value='denegado']\").prop('checked',true);
            $(\".$checkbox input[type=checkbox]\").prop('checked',false);
          });
          </script>";
        }
      $objeto_con->Disconnect();
    }

  $objeto_con->Disconnect();
  echo $salida;
?>
