<?php

  //funcion para verificar si el campo esta vacio
  function verificar_empty($c)
  {
    if(empty($_POST[$c]))
    {
      return true;
    }else
    {
      return false;
    }
  }

  //funcion de validacion para textos que contengan solo letras
  function texto($cadena)
  {
    if(preg_match("/^[a-zA-Z áéíóú]*$/",$cadena))
    {
      return true;
    }else
    {
?>
      <script>
        setTimeout(function(){
          Mensaje_Warning("Advertencia, solo se permite letras");
        },1000);
      </script>
<?php
      return false;
    }
  }
?>
