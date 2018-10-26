$('#menu_vertical').addClass('boton_aparecer');

function mover(){
  $('#menu_vertical').addClass('boton_ocultar');
  $('#menu_vertical').removeClass('boton_aparecer');
  $('#boton_mostrar').addClass('boton_mostrar');
  $('#cont').addClass('contenedor_grande');
}

function mover2(){
  $('#menu_vertical').addClass('boton_aparecer');
  $('#menu_vertical').removeClass('boton_ocultar');
  $('#boton_mostrar').removeClass('boton_mostrar');
  $('#cont').removeClass('contenedor_grande');
}
