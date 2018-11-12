
/*************************************************************************/
/*                       SECCION BUSQUEDA                                */
/*************************************************************************/
$(buscar_datos());

function buscar_datos(consulta)
{
  $.ajax({
    url:'Process/PHP/buscar_docente.php',
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
  var nombres=$("#nombres").val();
  var apellidos=$("#apellidos").val();
  var direccion=$("#direccion").val();
  var telefono=$("#telefono").val();
  var correo=$("#correo").val();
  var departamento=$('#departamento').val();
  var municipio=$('#municipio').val();
  var sexo=$('#sexo').val();
  var fecha_nac=$('#fecha_nac').val();
  var edad=$('#edad').val();
  var dui=$('#dui').val();
  var profesion=$('#profesion').val();
  
  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(nombres==null || nombres=="" || apellidos=="" || apellidos==null || direccion=="" || direccion==null || telefono=="" || telefono==null || correo=="" || correo==null 
  || departamento==null || departamento=="" || municipio==null || municipio=="" || sexo==null || sexo=="" || fecha_nac==null || fecha_nac=="" || edad==null || edad=="" 
  || dui==null || dui=="" || profesion==null || profesion=="")
  {
    Mensaje_Error("No se permiten campos vacios.");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //validación front end
    if(!verificar_texto(nombres))
    {
      Mensaje_Warning("Sólo se permiten letras en Nombres");
      bandera2=false;
    }

    if(!verificar_texto(apellidos))
    {
      Mensaje_Warning("Sólo se permiten letras en Apellidos");
      bandera2=false;
    }

    if(!verificar_texto(departamento))
    {
      Mensaje_Warning("Sólo se permiten letras en Departamento");
      bandera2=false;
    }

    if(!verificar_texto(municipio))
    {
      Mensaje_Warning("Sólo se permiten letras en Municipio");
      bandera2=false;
    }

    if(!verificar_texto(profesion))
    {
      Mensaje_Warning("Sólo se permiten letras en Profesión");
      bandera2=false;
    }

    if(!verificar_telefono(telefono)){
      Mensaje_Warning("Ingrese teléfono válido. Inicio con 2,6 o 7. ####-####");
      bandera2=false;
    }

    if (!verificar_dui(dui)) {
      Mensaje_Warning("Ingrese DUI válido. 12345678-9");
      bandera2=false;
    }

    if (!verificar_numero(edad)) {
      Mensaje_Warning("Edad debe ser un número mayor que cero");
      bandera2=false;
    }

    if(!verificar_email(correo)){
      Mensaje_Warning("Ingrese un correo válido");
      bandera2=false;
    }
    
    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/agregar_docente.php',
        type:'POST',
        dataType:'html',
        data:"nombres="+nombres+"&apellidos="+apellidos+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo
        +"&departamento="+departamento+"&municipio="+municipio+"&sexo="+sexo+"&fecha_nac="+fecha_nac+"&edad="+edad
        +"&dui="+dui+"&profesion="+profesion,
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
  if(docente_id!=null && docente_id!="")
  {
    $.ajax({
      url:'Process/PHP/eliminar_docente.php',
      type:'POST',
      dataType:'html',
      data:"id="+docente_id,
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
      url:'Process/PHP/seleccionar_docente.php',
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


function actualizar_datos(id_docente)
{

  var bandera=true;
  var bandera2=true;

  //se toman los valores de los input
  var nombres=$("#nombres_update").val();
  var apellidos=$("#apellidos_update").val();
  var direccion=$("#direccion_update").val();
  var telefono=$("#telefono_update").val();
  var correo=$("#correo_update").val();
  var departamento=$('#departamento_update').val();
  var municipio=$('#municipio_update').val();
  var sexo=$('#sexo_update').val();
  var fecha_nac=$('#fecha_nac_update').val();
  var edad=$('#edad_update').val();
  var dui=$('#dui_update').val();
  var profesion=$('#profesion_update').val();
  var id=id_docente;

  console.log(sexo);
  
  //se procede a verificar que los datos cumplan con lo solicitado desde el lado del cliente

  //se verifican que los campos no esten solos
  if(nombres==null || nombres=="" || apellidos=="" || apellidos==null || direccion=="" || direccion==null || telefono=="" || telefono==null || correo=="" || correo==null 
  || departamento==null || departamento=="" || municipio==null || municipio=="" || sexo==null || sexo=="" || fecha_nac==null || fecha_nac=="" || edad==null || edad=="" 
  || dui==null || dui=="" || profesion==null || profesion=="")
  {
    Mensaje_Error("No se permiten campos vacios.");
    bandera=false;
  }

  //se verificar que los datos tengan el formato requerido
  if(bandera==true)
  {
    //validación front end
    if(!verificar_texto(nombres))
    {
      Mensaje_Warning("Sólo se permiten letras en Nombres");
      bandera2=false;
    }

    if(!verificar_texto(apellidos))
    {
      Mensaje_Warning("Sólo se permiten letras en Apellidos");
      bandera2=false;
    }

    if(!verificar_texto(departamento))
    {
      Mensaje_Warning("Sólo se permiten letras en Departamento");
      bandera2=false;
    }

    if(!verificar_texto(municipio))
    {
      Mensaje_Warning("Sólo se permiten letras en Municipio");
      bandera2=false;
    }

    if(!verificar_texto(profesion))
    {
      Mensaje_Warning("Sólo se permiten letras en Profesión");
      bandera2=false;
    }

    if(!verificar_telefono(telefono)){
      Mensaje_Warning("Ingrese teléfono válido. Inicio con 2,6 o 7. ####-####");
      bandera2=false;
    }

    if (!verificar_dui(dui)) {
      Mensaje_Warning("Ingrese DUI válido. 12345678-9");
      bandera2=false;
    }

    if (!verificar_numero(edad)) {
      Mensaje_Warning("Edad debe ser un número mayor que cero");
      bandera2=false;
    }

    if(!verificar_email(correo)){
      Mensaje_Warning("Ingrese un correo válido");
      bandera2=false;
    }
    
    if(bandera2==true)
    {
      $.ajax({
        url:'Process/PHP/actualizar_docente.php',
        type:'POST',
        dataType:'html',
        data:"nombres="+nombres+"&apellidos="+apellidos+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo
        +"&departamento="+departamento+"&municipio="+municipio+"&sexo="+sexo+"&fecha_nac="+fecha_nac+"&edad="+edad
        +"&dui="+dui+"&profesion="+profesion+"&id="+id,
        success: function(respuesta) {
          $("#notificaciones").html(respuesta);
        }
      });
    }  
  }
}
