
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_grupo.php',
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
  var horario=$("#horario").val();
  var fecha_inicio=$("#fecha_inicio").val();
  var fecha_fin=$("#fecha_fin").val();
  var docente=$("#docente").val();
  var curso=$('#curso').val();
  
  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(horario==null || horario=="" || fecha_inicio=="" || fecha_inicio==null || fecha_fin=="" || fecha_fin==null || docente=="" || docente==null || curso=="" || curso==null)
  {
    Mensaje_Error("No se permiten campos vacios.");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //validación de fecha
    if(fecha_inicio > fecha_fin){
      Mensaje_Error('Fecha inválida. La fecha de fin debe ser igual o futura a la de inicio');
      bandera2=false;
    }
    
    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_grupo.php',
        type:'POST',
        dataType:'html',
        data:"horario="+horario+"&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin+"&docente="+docente+"&curso="+curso,
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
  if(grupo_id!=null && grupo_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_grupo.php',
      type:'POST',
      dataType:'html',
      data:"id="+grupo_id,
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
      url:'Process/PHP/seleccionar_grupo.php',
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


function actualizar_datos(id_grupo)
{

  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var horario=$("#horario_update").val();
  var fecha_inicio=$("#fecha_inicio_update").val();
  var fecha_fin=$("#fecha_fin_update").val();
  var docente=$("#docente_update").val();
  var curso=$("#curso_update").val();
  var id=id_grupo;

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(horario==null || horario=="" || fecha_inicio=="" || fecha_inicio==null || fecha_fin=="" || fecha_fin==null || docente=="" || docente==null || curso=="" || curso==null)
  {
    Mensaje_Error("No se permiten campos vacios.");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //validación de fecha
    if(fecha_inicio > fecha_fin){
      Mensaje_Error('Fecha inválida. La fecha de fin debe ser igual o futura a la de inicio');
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/actualizar_grupo.php',
        type:'POST',
        dataType:'html',
        data:"horario="+horario+"&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin+"&docente="+docente+"&curso="+curso+"&id="+id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }
  }
}
