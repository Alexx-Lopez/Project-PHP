function verificar_texto(cadena) {
  var valor = cadena;
  var expreg = /^[a-zA-Z áéíóú]*$/;

  if(expreg.test(valor))
  {
   return true;
  }else{
    return false;
  }
}

function verificar_contraseña_usuario(cadena)
{
  return true;
}

function verificar_contraseña_complejidad(cadena)
{
  /*
  var exp1="([^']{1,5})";
  var exp2="(([^'])[0-9]+)([A-z]+)";
  var re = new RegExp("\\w+\\s","g");
  */

  return true;
}
