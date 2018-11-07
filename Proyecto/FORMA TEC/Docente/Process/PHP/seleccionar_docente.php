<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM docente WHERE id_docente=$id";
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
    $nombres=$fila['nombres_docente'];
    $apellidos=$fila['apellidos_docente'];
    $direccion=$fila['direccion'];
    $telefono=$fila['telefono'];
    $email=$fila['correo'];
    $departamento=$fila['departamento'];
    $municipio=$fila['municipio'];
    $sexo=$fila['sexo'];
    $fecha_nac=$fila['fecha_nacimiento'];
    $edad=$fila['edad'];
    $dui=$fila['dui'];
    $profesion=$fila['profesion'];

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
                  <td><b>ID</b></td>
                  <td><p style=\"margin:0 !important;\">$id</p></td>
                </tr>
                <tr>
                  <td><b>Nombres</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"nombres_update\" id=\"nombres_update\" value=\"$nombres\" size=\"40\"></td>
                </tr>
                <tr>
                  <td><b>Apellidos</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"apellidos_update\" id=\"apellidos_update\" value=\"$apellidos\"></td>
                </tr>
                <tr>
                  <td><b>Dirección</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"direccion_update\" id=\"direccion_update\" value=\"$direccion\"></td>
                </tr>
                <tr>
                  <td><b>Teléfono</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"telefono_update\" id=\"telefono_update\" value=\"$telefono\"></td>
                </tr>
                <tr>
                  <td><b>Email</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"correo_update\" id=\"correo_update\" value=\"$email\"></td>
                </tr>
                <tr>
                  <td><b>Departamento</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"departamento_update\" id=\"departamento_update\" value=\"$departamento\"></td>
                </tr>
                <tr>
                  <td><b>Municipio</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"municipio_update\" id=\"municipio_update\" value=\"$municipio\"></td>
                </tr>
                <tr>
                  <td><b>Sexo</b></td>
                  <td>
                    <select class=\"form-control\" name=\"sexo_update\" id=\"sexo_update\">";
                    
                    if ($sexo=='M') {
                      $salida.="
                      <option value=\"M\" selected>Masculino</option>
                      <option value=\"F\">Femenino</option>
                      ";
                    }else{
                      $salida.="
                      <option value=\"M\">Masculino</option>
                      <option value=\"F\" selected>Femenino</option>
                      ";
                    }

    $salida.="       </select>
                  </td>
                </tr>
                <tr>
                  <td><b>Fecha de nacimiento</b></td>
                  <td><input type=\"date\" class=\"form-control\" name=\"fecha_nac_update\" id=\"fecha_nac_update\" value=\"$fecha_nac\"></td>
                </tr>
                <tr>
                  <td><b>Edad</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"edad_update\" id=\"edad_update\" value=\"$edad\"></td>
                </tr>
                <tr>
                  <td><b>DUI</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"dui_update\" id=\"dui_update\" value=\"$dui\"></td>
                </tr>
                <tr>
                  <td><b>Profesión</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"profesion_update\" id=\"profesion_update\" value=\"$profesion\"></td>
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
