
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_tipo_usuario.php',
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
  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var name=$("#name_tipo").val();

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(name==null || name=="")
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificara que los datos tengan el formato requerido
  if(bandera==true)
  {

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_tipo_usuario.php',
        type:'POST',
        dataType:'html',
        data:"name="+name,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }
  }
}

/*************************************************************************/
/*                       SECCION ELIMINAR                                */
/*************************************************************************/

function eliminar_datos()
{
  if(usuario_id!=null && usuario_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_tipo_usuario.php',
      type:'POST',
      dataType:'html',
      data:"id="+usuario_id,
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
      url:'Process/PHP/seleccionar_tipo_usuario.php',
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


function actualizar_datos(id_usuario)
{
  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var name=$("#name_tipo_update").val();
  var id=id_usuario;



  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(name==null || name=="")
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/actualizar_tipo_usuario.php',
        type:'POST',
        dataType:'html',
        data:"name="+name+"&id="+id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }
  }
}
