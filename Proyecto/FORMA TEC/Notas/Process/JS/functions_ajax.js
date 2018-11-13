
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
  var grupo=$("#grupo").val();
  var alumno=$("#alumno").val();
  var resultado=$("#resultado").val();

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(nota=="" || nota==null || grupo=="" || grupo==null || alumno=="" || alumno==null || resultado=="" || resultado==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el numero

    if(!verificar_numero(nota))
    {
      Mensaje_Warning("Solo se permiten numeros positivos y numeros entre 0 y 10");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_nota.php',
        type:'POST',
        dataType:'html',
        data:"nota="+nota+"&grupo="+grupo+"&alumno="+alumno+"&resultado="+resultado,
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
  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var id=nota_id;
  var nota=$("#nota_update").val();
  var grupo=$("#grupo_update").val();
  var alumno=$("#alumno_update").val();
  var resultado=$("#resultado_update").val();


  //se verifican que los campos no esten solos
  if(nota=="" || nota==null || grupo=="" || grupo==null || alumno=="" || alumno==null || resultado=="" || resultado==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }
  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el numero

    if(!verificar_numero(nota))
    {
      Mensaje_Warning("Solo se permiten numeros positivos y numeros entre 0 y 10");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/actualizar_nota.php',
        type:'POST',
        dataType:'html',
        data:"nota="+nota+"&grupo="+grupo+"&alumno="+alumno+"&resultado="+resultado+"&id="+id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }
  }
}