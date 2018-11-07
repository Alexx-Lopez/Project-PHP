<?php
  session_start();
  $bandera=true;

  if(!isset($_SESSION['USUARIO_login']))
  {
    $bandera=false;
  }

  if(!isset($_SESSION['CONTRA_login']))
  {
    $bandera=false;
  }

  if($bandera==true){
    unset($_SESSION['USUARIO_login']);
    unset($_SESSION['CONTRA_login']);
  }
  header('Location: ../Login/login.php');
?>
