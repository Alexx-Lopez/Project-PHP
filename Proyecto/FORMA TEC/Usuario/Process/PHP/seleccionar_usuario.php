<?php
  include "../../../Functions/PHP/CN.php";

  $objeto_con=new Conexion();
  $objeto_con->Connect();

  $salida="";

  $id=$_POST['id'];
  $sql="SELECT * FROM usuario WHERE id_usuario=$id";
  //$sql="SELECT * FROM usuario";
  $resultado=$objeto_con->conexion->query($sql);

  $sql2="SELECT * FROM tipo_usuario";
  $resultado2=$objeto_con->conexion->query($sql2);

  if($resultado->num_rows>0)
  {
    $fila = $resultado->fetch_assoc();
    $usuario=$fila['username'];
    $id_categoria=$fila['id_tipo_usuario'];
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
                  <td><b>Nombre:</b></td>
                  <td><input type=\"text\" class=\"form-control\" name=\"name_update\" id=\"name_update\" value=\"$usuario\" size=\"40\"></td>
                </tr>
                <tr>
                  <td><b>Contraseña:</b></td>
                  <td><input type=\"password\" class=\"form-control\" name=\"pass_update\" id=\"pass_update\"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type=\"password\" class=\"form-control\" name=\"pass2_update\" id=\"pass2_update\"></td>
                </tr>
                <tr>
                  <td><b>Categoría</b></td>
                  <td>
                    <select class=\"form-control\" name='type_update' id='type_update'>
                      <option value=\"\" selected disable hidden></option>;";

                      while($categoria = $resultado2->fetch_assoc()){
                        if($id_categoria==$categoria['id_tipo_usuario'])
                        {
                          $salida.= "<option selected>".$categoria['categoria_usuario']."</option>";
                        }else
                        {
                          $salida.= "<option>".$categoria['categoria_usuario']."</option>";
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
