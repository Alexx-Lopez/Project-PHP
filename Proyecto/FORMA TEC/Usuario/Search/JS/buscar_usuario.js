

$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
      url:'Search/PHP/buscar_usuario.php',
      type:'POST',
      dataType:'html',
      data:{consulta:consulta},
      success: function(respuesta) {
			   $('#datos').html(respuesta);
	    }
  });

  //document.getElementById("footer").style.position="initial";
  dimensionar();
}


$(document).on('keyup','#i_busqueda',function()
{
  var valor=$(this).val();
  if(valor!="")
  {
    buscar_datos(valor);
  }else
  {
    buscar_datos();
  }
});
