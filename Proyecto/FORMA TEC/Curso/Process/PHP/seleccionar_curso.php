<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM curso WHERE id_curso=$id";
  $resultado=$objeto_con->conexion->query($sql);

  $sql2="SELECT * FROM tipo_curso";
  $resultado2=$objeto_con->conexion->query($sql2);

  $sql3="SELECT * FROM nivel";
  $resultado3=$objeto_con->conexion->query($sql3);

  if($resultado->num_rows>0)
  {
    $fila = $resultado->fetch_assoc();

    $id_curso=$fila['id_curso'];
    $nombre_curso=$fila['nombre_curso'];
    $descripcion=$fila['descripcion'];
    $id_tipo_curso=$fila['id_tipo_curso'];
    $id_nivel=$fila['id_nivel'];

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
                  <td><b>Id del Curso:</b></td>
                  <td><input type=\"text\" class=\"form-control\" id_curso=\"id_curso_update\" id=\"id_curso_update\" value=\"$id_curso\" size=\"40\"></td>
                </tr>

                <tr>
                  <td><b>Nombre del Curso:</b></td>
                  <td><input type=\"text\" class=\"form-control\" nombre_curso=\"nombre_curso_update\" id=\"nombre_curso_update\" value=\"$nombre_curso\" size=\"40\"></td>
                </tr>

                <tr>
                  <td><b>Descripcion:</b></td>
                  <td><input type=\"text\" class=\"form-control\" descripcion=\"descripcion_update\" id=\"descripcion_update\" value=\"$descripcion\" size=\"40\"></td>
                </tr>

                <tr>
                <td><b>Tipo Curso</b></td>
                <td>
                  <select class=\"form-control\" name='tipo_curso_update' id='tipo_curso_update'>
                    <option value=\"\" selected disable hidden></option>;";

                    while($categoria_curso = $resultado2->fetch_assoc()){
                      if($id_tipo_curso==$categoria_curso['id_tipo_curso'])
                      {
                        $salida.= "<option selected>".$categoria_curso['nombre_categoria']."</option>";
                      }else
                      {
                        $salida.= "<option>".$categoria_curso['nombre_categoria']."</option>";
                      }
                    }

  $salida.=       "</select>
                </td>
              </tr>

      <tr>
                <td><b>Tipo Nivel</b></td>
                <td>
                  <select class=\"form-control\" name='nivel_update' id='nivel_update'>
                    <option value=\"\" selected disable hidden></option>;";

                    while($categoria_nivel = $resultado3->fetch_assoc()){
                      if($id_nivel==$categoria_nivel['id_nivel'])
                      {
                        $salida.= "<option selected>".$categoria_nivel['nombre_nivel']."</option>";
                      }else
                      {
                        $salida.= "<option>".$categoria_nivel['nombre_nivel']."</option>";
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
