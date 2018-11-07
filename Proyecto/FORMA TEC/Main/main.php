<?php session_start()?>
<?php require '../../Login/verificar_sesion.php'?>
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



  <link rel="stylesheet" type="text/css" href="../../CSS/Style.css">
  <link rel="stylesheet" type="text/css" href="../../CSS/style_admin.css">
</head>
<body>
  <?php
  include '../Resource/progress_bar.html';
  include '../Resource/header.php';
  include '../Resource/boton_mostrar_menu.html';
  include '../Resource/menu_vertical.html';
  ?>

  <div id="cont" class="contenedor">
    <!--Espacio para colocar todo el contenido-->
  </div>

  <?php
  include '../Resource/footer.html';
  ?>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--menu vertical-->
  <script src="../../JS/vertical_main.js"></script>

  <!--progress_bar-->
  <script src="../../JS/barra.js"></script>

  <!--funcion js para controlar el footer-->
  <script src="../../JS/control_footer.js"></script>
</body>
</html>
