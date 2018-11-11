
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_nota.php',
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
  var nota=$("#nota").val();
  var curso=$("#curso").val();
  var alumno=$("#alumno").val();
  var resultado=$("#resultado").val();

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(nota=="" || nota==null || curso=="" || curso==null || alumno=="" || alumno==null || resultado=="" || resultado==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el texto

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_nota.php',
        type:'POST',
        dataType:'html',
        data:"nota="+nota+"&curso="+curso+"&alumno="+alumno+"&resultado="+resultado,
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
  if(nota_id!=null && nota_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_nota.php',
      type:'POST',
      dataType:'html',
      data:"id="+nota_id,
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
      url:'Process/PHP/seleccionar_nota.php',
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


function actualizar_datos(nota_id)
{
  //codigo para validar datos del lado del cliente
      $.ajax({
        url:'Process/PHP/actualizar_nota.php',
        type:'POST',
        dataType:'html',
        data:"id="+nota_id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
}