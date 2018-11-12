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
    if(preg_match("/^[a-zA-Z áéíóúñäëïöü]*$/",$cadena))
    {
      return true;
    }else
    {
      echo "<script>
              Mensaje_Warning(\"Advertencia, solo se permite letras\");
            </script>";
      return false;
    }
  }

  function verificar_contraseña_usuario($cadena)
  {
    if(preg_match("/^(?=.*?[A-z áéíóú]{8,})(?=.*?[0-9]{2,})(?=.*?[!\"#$%&\/()=?¡¿'*{}@]{1,}).+$/",$cadena))
    {
      return true;
    }else
    {
      echo "<script>
              Mensaje_Warning(\"Contraseña insegura, al menos 8 letras, 2 numeros y 1 caracter especial\");
            </script>";
      return false;
    }
  }

  function verificar_formato_correo($cadena)
  {
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*(@gmail.com)$/",$cadena))
    {
      return true;
    }else
    {
      echo "<script>
              Mensaje_Warning(\"Correo no contiene el formato exigido\");
            </script>";
    }
  }

?>
