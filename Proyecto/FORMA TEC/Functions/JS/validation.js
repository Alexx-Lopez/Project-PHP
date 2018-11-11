function verificar_texto(cadena) {
  var valor = cadena;
  var expreg = /^[a-zA-Z áéíóúñäëïöü]*$/;

  if(expreg.test(valor))
  {
   return true;
  }else{
    return false;
  }
}

function verificar_contraseña_usuario(cadena)
{
  var valor=cadena;
  var expreg=/^(?=.*?[A-z áéíóú]{8,})(?=.*?[0-9]{2,})(?=.*?[!"#$%&\/()=?¡¿'*{}@]{1,}).+$/;

  if(expreg.test(valor))
  {
    return true;
  }else
  {
    return false;
  }
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

function verificar_formato_correo(cadena)
{

}
