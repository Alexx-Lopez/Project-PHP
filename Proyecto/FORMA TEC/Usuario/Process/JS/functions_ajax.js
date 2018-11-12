
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_usuario.php',
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
  var name=$("#name").val();
  var email=$("#email").val();
  var pass=$("#pass").val();
  var pass2=$("#pass2").val();
  var type=$("#type").val();

  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(name==null || name=="" || email==null || email=="" || pass=="" || pass==null || pass2=="" || pass2==null || type=="" || type==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //verificar que el texto
    if(!verificar_texto(name))
    {
      Mensaje_Warning("Solo se permiten letras");
      bandera2=false;
    }

    if(!verificar_formato_correo(email))
    {
      Mensaje_Warning("Correo no contiene el formato exigido");
      bandera2=false;
    }

    if(!verificar_contraseña_usuario(pass))
    {
      Mensaje_Warning("Contraseña insegura, al menos 8 letras, 2 numeros y 1 caracter especial");
      bandera2=false;
    }

    if(pass!=pass2)
    {
      Mensaje_Warning("Las contraseñas no coinciden");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_usuario.php',
        type:'POST',
        dataType:'html',
        data:"name="+name+"&pass="+pass+"&type="+type+"&email="+email,
        success: function(respuesta){
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
      url:'Process/PHP/eliminar_usuario.php',
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
      url:'Process/PHP/seleccionar_usuario.php',
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
  var name=$("#name_update").val();
  var email=$("#email_update").val();
  var pass=$("#pass_update").val();
  var pass2=$("#pass2_update").val();
  var type=$("#type_update").val();
  var id=id_usuario;



  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(name==null || name=="" || email==null || email=="" || pass=="" || pass==null || pass2=="" || pass2==null || type=="" || type==null || id=="" || id==null)
  {
    Mensaje_Error("No se permiten campos vacios");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    if(!verificar_texto(name))
    {
      Mensaje_Warning("Solo se permiten letras");
      bandera2=false;
    }

    if(!verificar_formato_correo(email))
    {
      Mensaje_Warning("Correo no contiene el formato exigido");
      bandera2=false;
    }

    if(!verificar_contraseña_usuario(pass))
    {
      Mensaje_Warning("Contraseña insegura, al menos 8 letras, 2 numeros y 1 caracter especial");
      bandera2=false;
    }

    if(pass!=pass2)
    {
      Mensaje_Warning("Las contraseñas no coinciden");
      bandera2=false;
    }

    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/actualizar_usuario.php',
        type:'POST',
        dataType:'html',
        data:"name="+name+"&email="+email+"&pass="+pass+"&type="+type+"&id="+id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }
  }
}
