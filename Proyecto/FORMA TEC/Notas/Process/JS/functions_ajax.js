
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_tabla.php',
    type:'POST',
    dataType:'html',
    data:{consulta:consulta},
    success: function(respuesta) {
      $('#datos').html(respuesta);
    }
  });
  dimensionar();
  //actualizar_dimensiones_barra();
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

/*************************************************************************/
/*                       SECCION INSERCION                               */
/*************************************************************************/
function insertar_datos()
{
  //codigo para validar datos del lado del cliente

  //en el caso de querer mandar mas de un dato por el data de ajax se puede realizar
  //concatenandolo con el signo + pero desde el segundo dato hay que colocar el signo &
  //por ejemplo se tienen las variables d1 d2 y d3 estos datos corresponde al d_formulario
  //del que se desea realizar el proceso entonces para poder hacer el ajax correctamente
  //tendría que ser
  //..
  //data:"d1="+d1+"&d2="+d2+"&d3="+d3,
  //..
  //los que se encuentran entre comillas pueden llamarse como ustedes deseen pero esos nombres
  //tienen que colocar en el postback del documento que estan dirigiendo en el url

      $.ajax({
        url:'Process/PHP/agregar_tabla.php',
        type:'POST',
        dataType:'html',
        data:,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
}

/*************************************************************************/
/*                       SECCION ELIMINAR                                */
/*************************************************************************/

function eliminar_datos()
{
  if(tabla_id!=null && tabla_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_tabla.php',
      type:'POST',
      dataType:'html',
      data:"id="+tabla_id,
      success: function(respuesta){
        $("#notificaciones").html(respuesta);
      }
    });
  }else
  {
    Mensaje_Error("Error al eliminar el registro");
  }
}

/*************************************************************************/
/*                       SECCION SELECCIONAR                             */
/*************************************************************************/

function seleccionar_datos(id)
{
  if(id!=null && id!="")
  {
    $.ajax({
      url:'Process/PHP/seleccionar_tabla.php',
      type:'POST',
      dataType:'html',
      data:"id="+id,
      success: function(respuesta) {
        $("#modales").html(respuesta);
      }
    });

    id_seleccionado=id;
  }else
  {
    Mensaje_Error("No se puede acceder a este registro");
  }
}

/*************************************************************************/
/*                       SECCION ACTUALIZAR                              */
/*************************************************************************/


function actualizar_datos(id_tabla)
{
  //codigo para validar datos del lado del cliente
      $.ajax({
        url:'Process/PHP/actualizar_tabla.php',
        type:'POST',
        dataType:'html',
        data:,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
}
