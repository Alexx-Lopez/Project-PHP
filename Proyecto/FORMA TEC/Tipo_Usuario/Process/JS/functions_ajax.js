
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


  //Luego se extrae las selecciones de los permisos
  var vector_alumno=[];
  var vector_curso=[];
  var vector_docente=[];
  var vector_estado=[];
  var vector_grupo=[];
  var vector_nivel=[];
  var vector_nota=[];
  var vector_responsable=[];
  var vector_resultado=[];
  var vector_tipo_curso=[];
  var vector_tipo_usuario=[];
  var vector_usuario=[];

  $(document).ready(function() {

        vector_alumno=extraer_permisos("ck_alumno",vector_alumno);
        vector_curso=extraer_permisos("ck_curso", vector_curso);
        vector_docente=extraer_permisos("ck_docente",vector_docente);
        vector_estado=extraer_permisos("ck_estado",vector_estado);
        vector_grupo=extraer_permisos("ck_grupo",vector_grupo);
        vector_nivel=extraer_permisos("ck_nivel",vector_nivel);
        vector_nota=extraer_permisos("ck_nota",vector_nota);
        vector_responsable=extraer_permisos("ck_responsable",vector_responsable);
        vector_resultado=extraer_permisos("ck_resultado",vector_responsable);
        vector_tipo_curso=extraer_permisos("ck_tipos_cursos",vector_tipo_curso);
        vector_tipo_usuario=extraer_permisos("ck_tipo_usuarios",vector_tipo_usuario);
        vector_usuario=extraer_permisos("ck_usuarios",vector_usuario);


        function extraer_permisos(checkbox,vector)
        {
          var conta=0;
          $('.'+checkbox+' input[type=checkbox]').each(function(){
              if (this.checked) {
                  vector[conta]=1;
              }else
              {
                vector[conta]=0;
              }
              conta++;
          });
          return vector;
        }
        //alert(vector_alumno[0]+" "+vector_alumno[1]+" "+vector_alumno[2]+" "+vector_alumno[3]);

        //se verificara que los datos tengan el formato requerido
        if(bandera==true)
        {

          if(bandera2==true)
          {
            //se procede a realizar una serialización de los array
            v_alumno=JSON.stringify(vector_alumno);
            v_curso=JSON.stringify(vector_curso);
            v_docente=JSON.stringify(vector_docente);
            v_estado=JSON.stringify(vector_estado);
            v_grupo=JSON.stringify(vector_grupo);
            v_nivel=JSON.stringify(vector_nivel);
            v_nota=JSON.stringify(vector_nota);
            v_responsable=JSON.stringify(vector_responsable);
            v_resultado=JSON.stringify(vector_resultado);
            v_tipo_curso=JSON.stringify(vector_tipo_curso);
            v_tipo_usuario=JSON.stringify(vector_tipo_usuario);
            v_usuario=JSON.stringify(vector_usuario);

            $.ajax({
              url:'Process/PHP/agregar_tipo_usuario.php',
              type:'POST',
              dataType:'html',
              data:"name="+name+
                   "&v_alumno="+v_alumno+
                   "&v_curso="+v_curso+
                   "&v_docente="+v_docente+
                   "&v_estado="+v_estado+
                   "&v_grupo="+v_grupo+
                   "&v_nivel="+v_nivel+
                   "&v_nota="+v_nota+
                   "&v_responsable="+v_responsable+
                   "&v_resultado="+v_resultado+
                   "&v_tipo_curso="+v_tipo_curso+
                   "&v_tipo_usuario="+v_tipo_usuario+
                   "&v_usuario="+v_usuario,
              success: function(respuesta) {
                $("#notificaciones").html(respuesta);
              }
            });
          }
        }
   });
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

  //Luego se extrae las selecciones de los permisos
  var vector_alumno=[];
  var vector_curso=[];
  var vector_docente=[];
  var vector_estado=[];
  var vector_grupo=[];
  var vector_nivel=[];
  var vector_nota=[];
  var vector_responsable=[];
  var vector_resultado=[];
  var vector_tipo_curso=[];
  var vector_tipo_usuario=[];
  var vector_usuario=[];

  $(document).ready(function() {

        vector_alumno=extraer_permisos("u_ck_alumno",vector_alumno);
        vector_curso=extraer_permisos("u_ck_curso", vector_curso);
        vector_docente=extraer_permisos("u_ck_docente",vector_docente);
        vector_estado=extraer_permisos("u_ck_estado",vector_estado);
        vector_grupo=extraer_permisos("u_ck_grupo",vector_grupo);
        vector_nivel=extraer_permisos("u_ck_nivel",vector_nivel);
        vector_nota=extraer_permisos("u_ck_nota",vector_nota);
        vector_responsable=extraer_permisos("u_ck_responsable",vector_responsable);
        vector_resultado=extraer_permisos("u_ck_resultado",vector_resultado);
        vector_tipo_curso=extraer_permisos("u_ck_tipos_cursos",vector_tipo_curso);
        vector_tipo_usuario=extraer_permisos("u_ck_tipo_usuarios",vector_tipo_usuario);
        vector_usuario=extraer_permisos("u_ck_usuarios",vector_usuario);


        function extraer_permisos(checkbox,vector)
        {
          var conta=0;
          $('.'+checkbox+' input[type=checkbox]').each(function(){
              if (this.checked) {
                  vector[conta]=1;
              }else
              {
                vector[conta]=0;
              }
              conta++;
          });
          return vector;
        }
        //alert(vector_alumno[0]+" "+vector_alumno[1]+" "+vector_alumno[2]+" "+vector_alumno[3]);

        //se verificara que los datos tengan el formato requerido
        if(bandera==true)
        {

          if(bandera2==true)
          {
            //se procede a realizar una serialización de los array
            v_alumno=JSON.stringify(vector_alumno);
            v_curso=JSON.stringify(vector_curso);
            v_docente=JSON.stringify(vector_docente);
            v_estado=JSON.stringify(vector_estado);
            v_grupo=JSON.stringify(vector_grupo);
            v_nivel=JSON.stringify(vector_nivel);
            v_nota=JSON.stringify(vector_nota);
            v_responsable=JSON.stringify(vector_responsable);
            v_resultado=JSON.stringify(vector_resultado);
            v_tipo_curso=JSON.stringify(vector_tipo_curso);
            v_tipo_usuario=JSON.stringify(vector_tipo_usuario);
            v_usuario=JSON.stringify(vector_usuario);

            $.ajax({
              url:'Process/PHP/actualizar_tipo_usuario.php',
              type:'POST',
              dataType:'html',
              data:"name="+name+
                   "&id="+id+
                   "&v_alumno="+v_alumno+
                   "&v_curso="+v_curso+
                   "&v_docente="+v_docente+
                   "&v_estado="+v_estado+
                   "&v_grupo="+v_grupo+
                   "&v_nivel="+v_nivel+
                   "&v_nota="+v_nota+
                   "&v_responsable="+v_responsable+
                   "&v_resultado="+v_resultado+
                   "&v_tipo_curso="+v_tipo_curso+
                   "&v_tipo_usuario="+v_tipo_usuario+
                   "&v_usuario="+v_usuario,
              success: function(respuesta) {
                $("#notificaciones").html(respuesta);
              }
            });
          }
        }
   });

  //se verificar que los datos tengan el formato requerido
  /*
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
  }*/
}
