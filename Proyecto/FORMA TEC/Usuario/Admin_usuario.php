<?php session_start()?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
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

  <script type="text/javascript">



  $(window).load(function() {
    $("#preloader_comp").fadeOut("slow");
  });

  function validar()
  {

    var name = document.getElementById("name").value;

    if(texto(name)){
      return true;
    }
    else
    {
      return false;
    }
  }

  function texto(cadena) {
    var valor = cadena;
    var expreg = /^[a-zA-Z áéíóú]*$/;

    if(expreg.test(valor))
    {
	   return true;
    }else{
      //Mensaje_Warning('Solo se permite letras');
      return false;
    }
  }

</script>


</head>
<body>

  <div id="preloader_comp" class="preloader_comp">
    <img src="../../Images/Design/preloader.gif">
  </div>

  <?php
  include '../Resource/progress_bar.html';
  include '../Resource/header.html';
  include '../Resource/boton_mostrar_menu.html';
  include '../Resource/menu_vertical.html';
  include '../Functions/PHP/CN.php';
  ?>

  <div id="cont" class="contenedor" style="height:auto;">
    <div class="panel panel-primary" style="height: 100%;">
      <div class="panel-heading"><p style="text-align:center;font-size: 20px;"><strong>Administración de Usuarios</strong></p></div>
      <div class="panel-body">

        <div id="preloader" class="preloader">
          <img src="../../Images/Design/load.gif">
        </div>

        <!--se presentan las opciones del usuario-->
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
          <form action="" method="post" onsubmit="return validar();">
            <h3>Añadir Usuario</h3>
            <table class="tabla_formulario">
              <tr>
                <td>Nombre de usuario: </td>
                <td>
                  <input type="text" class="form-control" id="name" name="name" size="40">
                </td>
              </tr>
              <tr>
                <td>Contraseña:</td>
                <td>
                  <input type="password" class="form-control" id="pass" name="pass">
                </td>
              </tr>
              <tr>
                <td>Tipo de Usuario:</td>
                <td>
                  <?php
                  $objeto_con=new Conexion();
                  $objeto_con->Connect();

                  $sql="select * from tipo_usuario";
                  $result=mysqli_query($objeto_con->conexion,$sql);
                  echo "<select class=\"form-control\" name='type'>";

                  echo "<option value=\"\" selected disable hidden></option>";
                  while($fila = mysqli_fetch_array($result)){
                    echo "<option>".$fila['categoria_usuario']."</option>";
                  }
                  echo "</select>";

                  $objeto_con->Disconnect();
                  ?>
                </td>
              </tr>
            </table>
            <br>
            <br>
            <input type="submit" class="btn" value="Guardar" name="btn_guardar" style="display:block;margin:0 auto;">
          </form>
        </div>
        <!--Informe que se muestra luego de realizar una inserción o actualización-->
        <div id="informe">

        </div>

        <?php
        //archivo donde se almacenan las funciones de validacion
        include '../Functions/PHP/validation_function.php';

        //archivo donde se encuentra los procesos especificos para la tabla usuario
        include 'Admin_usuario_process.php';
        ?>
      </div>
    </div>
  </div>

  <?php
  include '../Resource/footer.html';
  ?>




  <script type="text/javascript">


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
    },1000);
  }

  //se carga el div formulario
  <?php
  if(empty($_POST['NUEVO']))
  {
  }else
  {
    if($_POST['NUEVO'])
    {
      ?>
      d_formulario.style.display="block";
      d_opciones.style.display="none";
      <?php
    }
  }
  ?>

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
  <script src="Search/JS/buscar_usuario.js"></script>
</body>
</html>
