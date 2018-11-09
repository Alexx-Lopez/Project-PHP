
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_curso.php',
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
  var id_curso=$("#id_curso").val();
  var nombre_curso=$("#nombre_curso").val();
  var descripcion=$("#descripcion").val();
  var tipo_curso=$("#tipo_curso").val();
  var nivel=$("#nivel").val();

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(id_curso=="" || id_curso==null || nombre_curso=="" || nombre_curso==null || descripcion=="" || descripcion==null || tipo_curso=="" || tipo_curso==null || nivel=="" || nivel==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el texto
    if(!verificar_texto(nombre_curso))
    {
      Mensaje_Warning("Solo se permiten letras");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_curso.php',
        type:'POST',
        dataType:'html',
        data:"id_curso="+id_curso+"&nombre_curso="+nombre_curso+"&descripcion="+descripcion+"&tipo_curso="+tipo_curso+"&nivel="+nivel,
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
  if(curso_id!=null && curso_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_curso.php',
      type:'POST',
      dataType:'html',
      data:"id="+curso_id,
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
      url:'Process/PHP/seleccionar_curso.php',
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


function actualizar_datos(curso_id)
{
  //codigo para validar datos del lado del cliente
      $.ajax({
        url:'Process/PHP/actualizar_curso.php',
        type:'POST',
        dataType:'html',
        data:"id="+curso_id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
}
