

$(document).ready(function($){
  dimensionar();
});

//funcion para dimensionar el contenedor basandose en la altura de la ventana
//la altura de la pagina y el contenido del contenedor
  function dimensionar()
  {
    //se extrae la altura del contenedor
    //se le suman 40px de padding de la parte superior y la parte inferior
    var cont_alto = $("#cont").height()+80;

    //se extrae la altura del footer
    var footer_alto=$("#footer").height()+20; //+20px de padding

    //se extrae la altura del nav del header
    var header_alto=$("#nav_h").height();

    //se extrae la altura de la pagina
    var pagina_alto=$(document).height();

    //se extrae el tamaño de la ventana del navegador
    var tam_nav=$(window).height();

    var altura_result=cont_alto+footer_alto+header_alto+40; //se le suman 40 porque el contenedor tiene una separacion de 20px en la parte superior e inferior

    if(altura_result<pagina_alto)
    {
      document.getElementById("cont").style.minHeight = pagina_alto-altura_result+cont_alto+"px";
    }else
    {
      if((pagina_alto+footer_alto)>tam_nav)
      {
        document.getElementById("footer").style.position="initial";
      }else{
        document.getElementById("footer").style.position="absolute";
      }
    }
  }
