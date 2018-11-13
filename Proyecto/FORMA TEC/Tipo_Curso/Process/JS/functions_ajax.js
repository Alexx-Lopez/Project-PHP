
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_tipo_curso.php',
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
  var tipo_curso=$("#tipo_curso").val();

  //se verifican que los campos no esten solos
  if(tipo_curso=="" || tipo_curso==null )
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el numero

    if(!verificar_texto(tipo_curso))
    {
      Mensaje_Warning("Solo se permiten letras");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_tipo_curso.php',
        type:'POST',
        dataType:'html',
        data:"tipo_curso="+tipo_curso,
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
  if(tipo_curso_id!=null && tipo_curso_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_tipo_curso.php',
      type:'POST',
      dataType:'html',
      data:"id="+tipo_curso_id,
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
      url:'Process/PHP/seleccionar_tipo_curso.php',
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


function actualizar_datos(tipo_curso_id)
{
  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var id=tipo_curso_id;
  var tipo_curso=$("#tipo_curso_update").val();

  //se verifican que los campos no esten solos
  if(tipo_curso=="" || tipo_curso==null )
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el numero

    if(!verificar_texto(tipo_curso))
    {
      Mensaje_Warning("Solo se permiten letras");
      bandera2=false;
    }

    if(bandera2==true)
    {
     //codigo para validar datos del lado del cliente
     $.ajax({
      url:'Process/PHP/actualizar_tipo_curso.php',
      type:'POST',
      dataType:'html',
      data:"id="+tipo_curso_id,
      success: function(respuesta) {
        $("#notificaciones").html(respuesta);
      }
    });
    }
  }
  
}