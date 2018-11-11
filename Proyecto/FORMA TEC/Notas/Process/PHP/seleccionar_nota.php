<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM nota WHERE id_nota=$id";
  $resultado=$objeto_con->conexion->query($sql);

  $sql2="select * from grupo";
  $resultado2=$objeto_con->conexion->query($sql2);

  $sql3="select * from alumno";
  $resultado3=$objeto_con->conexion->query($sql3);

  $sql4="select * from resultado";
  $resultado4=$objeto_con->conexion->query($sql4);

  if($resultado->num_rows>0)
  {
    $fila = $resultado->fetch_assoc();

    $nota=$fila['nota'];
    $id_grupo=$fila['id_grupo'];
    $id_alumno=$fila['id_alumno'];
    $id_resultado=$fila['id_resultado'];

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
                  <td><b>Nota:</b></td>
                  <td><input type=\"text\" class=\"form-control\" nota=\"nota_update\" id=\"nota_update\" value=\"$nota\" size=\"40\"></td>
                </tr>
                
                <tr>
                  <td><b>Grupo</b></td>
                  <td>
                    <select class=\"form-control\" name='grupo_update' id='grupo_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($categoria_grupo = $resultado2->fetch_assoc()){
                        if($id_grupo==$categoria_grupo['id_grupo'])
                        {
                          $salida.= "<option selected>".$categoria_grupo['horario']."</option>";
                        }else
                        {
                          $salida.= "<option>".$categoria_grupo['horario']."</option>";
                        }
                      }

    $salida.=       "</select>
                  </td>
                </tr>

                <tr>
                  <td><b>Alumno</b></td>
                  <td>
                    <select class=\"form-control\" name='alumno_update' id='alumno_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($categoria_alumno = $resultado3->fetch_assoc()){
                        if($id_alumno==$categoria_alumno['id_alumno'])
                        {
                          $salida.= "<option selected>".$categoria_alumno['nombres_alumno']."</option>";
                        }else
                        {
                          $salida.= "<option>".$categoria_alumno['nombres_alumno']."</option>";
                        }
                      }

    $salida.=       "</select>
                  </td>
                </tr>

                <tr>
                  <td><b>Resultado</b></td>
                  <td>
                    <select class=\"form-control\" name='resultado_update' id='resultado_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($categoria_resultado = $resultado4->fetch_assoc()){
                        if($id_resultado==$categoria_resultado['id_resultado'])
                        {
                          $salida.= "<option selected>".$categoria_resultado['nombre_resultado']."</option>";
                        }else
                        {
                          $salida.= "<option>".$categoria_resultado['nombre_resultado']."</option>";
                        }
                      }

    $salida.=       "</select>
                  </td>
                </tr>
                 


              </table>
              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" onclick=\"actualizar_datos($id);\">Actualizar</button>
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
