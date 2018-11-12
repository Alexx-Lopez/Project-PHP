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
  var valor = cadena;
  var expreg = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*(@gmail.com)$/;

  if(expreg.test(valor))
  {
   return true;
  }else{
    return false;
  }
}

function verificar_telefono(cadena){
  var valor=cadena;
  var expreg=/[2,6,7]{1}\d{3}\-\d{4}/;

  if (expreg.test(valor)) {
    return true;
  }else{
    return false;
  }
}

function verificar_dui(cadena){
  var valor=cadena;
  var expreg=/\d{8}\-\d{1}/;

  if (expreg.test(valor)) {
    return true;
  }else{
    return false;
  }
}

function verificar_edad(cadena){
  var valor=cadena;
  var expreg=/^[1-9]\d*$/;

  if (expreg.test(valor)) {
    return true;
  }else{
    return false;
  }
}

function verificar_email(cadena){
  var valor=cadena;
  var expreg=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

  if (expreg.test(valor)) {
    return true;
  }else{
    return false;
  }
}

function verificar_numero(cadena){

  if(typeof Number(cadena) == 'number'){
      if(cadena>=0 && cadena<=10){
          return true;
      }else{
          return false;
      }
  }else{
      return false;
  }
}
