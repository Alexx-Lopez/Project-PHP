<?php session_start()?>
<?php
  include '../Functions/PHP/CN.php';
  require '../../Login/verificar_sesion.php';

  //se verifica que el usuario tenga permiso total a la pagina visitada
  verificar_permisos_usuarios('tipo_usuario');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!--<meta charset="utf-8">-->
  <meta charset="iso-8859-1">
  <title>Administración Tipo de Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


  <!--libreria para mostrar notificaciones-->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../../CSS/Style.css">
  <link rel="stylesheet" type="text/css" href="../../CSS/style_admin.css">
  <link rel="stylesheet" type="text/css" href="../../CSS/Style_FORMATEC.css">

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <script src="../Functions/JS/Messages.js"></script>
  <script src="../Functions/JS/validation.js"></script>

  <script type="text/javascript">

  $(document).ready(function () {
    seleccionar_todo();

    function seleccionar_todo()
    {
      $(".ck_alumno input[type=checkbox]").prop('checked',true);
      $(".ck_curso input[type=checkbox]").prop('checked',true);
      $(".ck_docente input[type=checkbox]").prop('checked',true);
      $(".ck_grupo input[type=checkbox]").prop('checked',true);
      $(".ck_nivel input[type=checkbox]").prop('checked',true);
      $(".ck_nota input[type=checkbox]").prop('checked',true);
      $(".ck_responsable input[type=checkbox]").prop('checked',true);
      $(".ck_tipos_cursos input[type=checkbox]").prop('checked',true);
      $(".ck_tipo_usuarios input[type=checkbox]").prop('checked',true);
      $(".ck_usuarios input[type=checkbox]").prop('checked',true);
    }
  });


  $(function(){
    //se deshabilitan los checkbox
    $(".ck_alumno input[type=checkbox]").prop('disabled',true); //alumno
    $(".ck_curso input[type=checkbox]").prop('disabled',true);  //curso
    $(".ck_docente input[type=checkbox]").prop('disabled',true);  //docente
    $(".ck_grupo input[type=checkbox]").prop('disabled',true);  //grupo
    $(".ck_nivel input[type=checkbox]").prop('disabled',true);  //niveles
    $(".ck_nota input[type=checkbox]").prop('disabled',true);  //notas
    $(".ck_responsable input[type=checkbox]").prop('disabled',true);  //responsable
    $(".ck_tipos_cursos input[type=checkbox]").prop('disabled',true);  //tipos cursos
    $(".ck_tipo_usuarios input[type=checkbox]").prop('disabled',true);  //tipos usuarios
    $(".ck_usuarios input[type=checkbox]").prop('disabled',true);  //usuarios


    control_radio('radio_alumno','ck_alumno');  //radio_alumno
    control_radio('radio_curso','ck_curso'); //radio_curso
    control_radio('radio_docente','ck_docente'); //radio_docente
    control_radio('radio_grupo','ck_grupo');  //radio_grupo
    control_radio('radio_nivel','ck_nivel');  //radio_nivel
    control_radio('radio_nota','ck_nota');  //radio_nota
    control_radio('radio_responsable','ck_responsable');  //radio_responsable
    control_radio('radio_tipos_cursos','ck_tipos_cursos');  //radio_tipos_cursos
    control_radio('radio_tipo_usuarios','ck_tipo_usuarios'); //radio_tipo_usuarios
    control_radio('radio_usuarios','ck_usuarios');

    function control_radio(radio,checkbox)
    {
      $('.'+radio).click(function(){
        var rb=$('input:radio[name='+radio+']:checked').val()
        if(rb=="total"){
          $("."+checkbox+" input[type=checkbox]").prop('checked',true);
        }
        if(rb=="denegado")
        {
          $("."+checkbox+" input[type=checkbox]").prop('checked',false);
        }
      });
    }

  });


  </script>


</head>
<body>

  <div id="preloader_comp" class="preloader_comp">
    <img src="../../Images/Design/preloader.gif">
  </div>

  <?php
  include '../Resource/progress_bar.html';
  include '../Resource/header.php';
  include '../Resource/boton_mostrar_menu.html';
  include '../Resource/menu_vertical.html';
  ?>

  <div id="cont" class="contenedor" style="height:auto;">
    <div class="panel panel-primary" style="height: 100%;">
      <div class="panel-heading"><p style="text-align:center;font-size: 20px;"><strong>Administración de Tipos Usuarios</strong></p></div>
      <div class="panel-body">

        <div id="preloader" class="preloader">
          <img src="../../Images/Design/load.gif">
        </div>

        <!--se presentan las opciones del tipo de usuario-->
        <div id="opcion">
          <p style="text-align: center;"><i class="fa fa-users fa-lg" style="font-size:200px;"></i></p>
          <br>
          <button type="button" class="btn boton_opciones boton_buscar" id="boton_buscar"><span class="glyphicon glyphicon-search"></span></button>
          <button type="button" class="btn boton_opciones boton_nuevo" id="boton_nuevo"><span class="glyphicon glyphicon-plus"></span></button>
        </div>

        <!--tabla de busqueda con las opciones de editar y eliminar-->
        <div id="busqueda">
          <i class="fas fa-arrow-circle-left boton_regresar_opcion" style="font-size:30px;" id="regre_busqueda_opcion"></i>
          <div class="panel_buscar">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar" id="i_busqueda" name="i_busqueda">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>

            <br>
            <br>

            <!-- div en donde se van a mostrar los datos de la busqueda en tiempo real-->
            <div id="datos">
            </div>

          </div>
        </div>

        <!--formulario correspondiente a los datos que se estaran manejando-->
        <div id="formulario">
          <i class="fas fa-arrow-circle-left boton_regresar_opcion" style="font-size:30px;" id="regre_nuevo_opcion"></i>
          <form method="post" onsubmit="return false" action="return false" name="frm">
            <h3>Añadir Tipo de Usuario</h3>
            <table class="tabla_formulario">
              <tr>
                <td>Nombre del tipo: </td>
                <td>
                  <input type="text" class="form-control" id="name_tipo" name="name_tipo" size="40">
                </td>
              </tr>
            </table>
            <br>

            <table class="tabla_permisos">
              <thead>
                <tr>
                  <td colspan="3"><p style="text-align: center;color: white;font-size: 20px;margin: 0;"><b>Establecer permisos</b></p></td>
                </tr>
                <tr style="color:white;">
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
                  <label class="radio-inline radio_alumno"><input type="radio" name="radio_alumno" id="radio_alumno_total" value="total" checked>Total</label>
                  <label class="radio-inline radio_alumno"><input type="radio" name="radio_alumno" id="radio_alumno_parcial" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_alumno"><input type="radio" name="radio_alumno" id="radio_alumno_denegado" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_alumno"><input type="checkbox" name="ck_alumno" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_alumno"><input type="checkbox" name="ck_alumno" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_alumno"><input type="checkbox" name="ck_alumno" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_alumno"><input type="checkbox" name="ck_alumno" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Curso
                </td>
                <td>
                  <label class="radio-inline radio_curso"><input type="radio" name="radio_curso" value="total" checked>Total</label>
                  <label class="radio-inline radio_curso"><input type="radio" name="radio_curso" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_curso"><input type="radio" name="radio_curso" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_curso"><input type="checkbox" name="ck_curso" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_curso"><input type="checkbox" name="ck_curso" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_curso"><input type="checkbox" name="ck_curso" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_curso"><input type="checkbox" name="ck_curso" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Docente
                </td>
                <td>
                  <label class="radio-inline radio_docente"><input type="radio" name="radio_docente" value="total" checked>Total</label>
                  <label class="radio-inline radio_docente"><input type="radio" name="radio_docente" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_docente"><input type="radio" name="radio_docente" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_docente"><input type="checkbox" name="ck_docente" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_docente"><input type="checkbox" name="ck_docente" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_docente"><input type="checkbox" name="ck_docente" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_docente"><input type="checkbox" name="ck_docente" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Grupo
                </td>
                <td>
                  <label class="radio-inline radio_grupo"><input type="radio" name="radio_grupo" value="total" checked>Total</label>
                  <label class="radio-inline radio_grupo"><input type="radio" name="radio_grupo" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_grupo"><input type="radio" name="radio_grupo" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_grupo"><input type="checkbox" name="ck_grupo" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_grupo"><input type="checkbox" name="ck_grupo" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_grupo"><input type="checkbox" name="ck_grupo" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_grupo"><input type="checkbox" name="ck_grupo" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Niveles
                </td>
                <td>
                  <label class="radio-inline radio_nivel"><input type="radio" name="radio_nivel" value="total" checked>Total</label>
                  <label class="radio-inline radio_nivel"><input type="radio" name="radio_nivel" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_nivel"><input type="radio" name="radio_nivel" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_nivel"><input type="checkbox" name="ck_nivel" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_nivel"><input type="checkbox" name="ck_nivel" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_nivel"><input type="checkbox" name="ck_nivel" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_nivel"><input type="checkbox" name="ck_nivel" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Nota
                </td>
                <td>
                  <label class="radio-inline radio_nota"><input type="radio" name="radio_nota" value="total" checked>Total</label>
                  <label class="radio-inline radio_nota"><input type="radio" name="radio_nota" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_nota"><input type="radio" name="radio_nota" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_nota"><input type="checkbox" name="ck_nota" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_nota"><input type="checkbox" name="ck_nota" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_nota"><input type="checkbox" name="ck_nota" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_nota"><input type="checkbox" name="ck_nota" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Responsable
                </td>
                <td>
                  <label class="radio-inline radio_responsable"><input type="radio" name="radio_responsable" value="total" checked>Total</label>
                  <label class="radio-inline radio_responsable"><input type="radio" name="radio_responsable" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_responsable"><input type="radio" name="radio_responsable" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_responsable"><input type="checkbox" name="ck_responsable" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_responsable"><input type="checkbox" name="ck_responsable" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_responsable"><input type="checkbox" name="ck_responsable" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_responsable"><input type="checkbox" name="ck_responsable" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Tipos de Cursos
                </td>
                <td>
                  <label class="radio-inline radio_tipos_cursos"><input type="radio" name="radio_tipos_cursos" value="total" checked>Total</label>
                  <label class="radio-inline radio_tipos_cursos"><input type="radio" name="radio_tipos_cursos" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_tipos_cursos"><input type="radio" name="radio_tipos_cursos" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_tipos_cursos"><input type="checkbox" name="ck_tipos_cursos" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_tipos_cursos"><input type="checkbox" name="ck_tipos_cursos" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_tipos_cursos"><input type="checkbox" name="ck_tipos_cursos" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_tipos_cursos"><input type="checkbox" name="ck_tipos_cursos" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Tipos de Usuarios
                </td>
                <td>
                  <label class="radio-inline radio_tipo_usuarios"><input type="radio" name="radio_tipo_usuarios" value="total" checked>Total</label>
                  <label class="radio-inline radio_tipo_usuarios"><input type="radio" name="radio_tipo_usuarios" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_tipo_usuarios"><input type="radio" name="radio_tipo_usuarios" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_tipo_usuarios"><input type="checkbox" name="ck_tipo_usuarios" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_tipo_usuarios"><input type="checkbox" name="ck_tipo_usuarios" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_tipo_usuarios"><input type="checkbox" name="ck_tipo_usuarios" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_tipo_usuarios"><input type="checkbox" name="ck_tipo_usuarios" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
              <tr>
                <td>
                  Usuarios
                </td>
                <td>
                  <label class="radio-inline radio_usuarios"><input type="radio" name="radio_usuarios" value="total" checked>Total</label>
                  <label class="radio-inline radio_usuarios"><input type="radio" name="radio_usuarios" value="parcial" disabled>Parcial</label>
                  <label class="radio-inline radio_usuarios"><input type="radio" name="radio_usuarios" value="denegado" >Denegado</label>
                </td>
                <td style="text-align:center;">
                  <label class="checkbox-inline ck_usuarios"><input type="checkbox" name="ck_usuarios" value=""><i class="material-icons" style="font-size: 30px;">note_add</i></label>
                  <label class="checkbox-inline ck_usuarios"><input type="checkbox" name="ck_usuarios" value=""><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_usuarios"><input type="checkbox" name="ck_usuarios" value=""><span class="glyphicon glyphicon-refresh" style="font-size: 25px;"></span></label>
                  <label class="checkbox-inline ck_usuarios"><input type="checkbox" name="ck_usuarios" value=""><span class="glyphicon glyphicon-trash" style="font-size: 25px;"></span></label>
                </td>
              </tr>
            </table>

            <br>
            <br>
            <input type="button" class="btn btn-default boton_añadir" value="Guardar" name="btn_guardar" onclick="insertar_datos();">
          </form>
        </div>


        <!--Informe que se muestra luego de realizar una inserción o actualización-->
        <div id="informe">
        </div>

        <!--este espacio se usa para mostrar notificaciones-->
        <div id="notificaciones">
        </div>

      </div>
    </div>
  </div>

  <!--modaldelete-->
  <?php
  include '../Resource/Modal_eliminar.html';
  ?>

  <div id="modales">
  </div>



  <?php
  include '../Resource/footer.html';
  ?>

  <script type="text/javascript">

  //carga del loader al inicio
  $(window).load(function() {
    $("#preloader_comp").fadeOut("slow");
  });

  //variable que almacena el id de la seleccion de la tabla
  var usuario_id;
  function asignar_id(identificador)
  {
    usuario_id=identificador;
  }

  d_opciones=document.getElementById("opcion");

  d_busqueda=document.getElementById("busqueda");
  d_busqueda.style.display="none";

  d_formulario=document.getElementById("formulario");
  d_formulario.style.display="none";

  d_busqueda=document.getElementById("informe");
  d_busqueda.style.display="none";

  d_preloader=document.getElementById("preloader");
  d_preloader.style.display="none";


  $("#boton_buscar").click(function(){
    transition_e("opcion","busqueda");
  });

  $("#boton_nuevo").click(function(){
    transition_e("opcion","formulario");
  });


  $("#regre_nuevo_opcion").click(function(){
    transition_e("formulario","opcion");
  });

  $("#regre_busqueda_opcion").click(function(){
    transition_e("busqueda","opcion");
  });




  function transition_e(origen,destino)
  {
    $("#"+origen).fadeOut( "slow", function(){
    });

    setTimeout(function(){
      d_preloader.style.display="block";
    },500);

    //se manda a llamar la función
    dimensionar();

    setTimeout(function() {
      d_preloader.style.display="none"
      $("#"+destino).fadeIn("slow",function(){
      });
      //se actualiza la altura de la pagina para que trabaje adecuadamente la barra de scroll
      actualizar_dimensiones_barra();
    },1000);
  }

  </script>


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--menu vertical-->
  <script src="../../JS/vertical_main.js"></script>

  <!--funcion js para controlar el footer-->
  <script src="../../JS/control_footer.js"></script>

  <!--progress_bar-->
  <script src="../../JS/barra.js"></script>

  <!--busqueda-->
  <script src="Process/JS/functions_ajax.js"></script>
</body>
</html>
