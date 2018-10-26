//variables
var pagina_ancho;
var pagina_alto;
var tam_nav;


$(document).ready(function(){
  pagina_ancho=$(window).width();
  //var pagina_alto=document.body.scrollHeight;
  pagina_alto=$(document).height();
  tam_nav=$(window).height();
  //alert();
  //alert("Ancho: "+pagina_ancho+"  Alto: "+pagina_alto);


  //var altura = $('#barra_menu').offset().top;



  $(window).on('scroll', function(){
    //var altura = $(document).scrollTop();
    var altura=$(window).scrollTop();
    //var altura=document.documentElement.scrollTop;
    //alert("pagina_alto: "+pagina_alto+"  tam_nav: "+tam_nav+"  altura: "+altura);

    //var scrollPosition = document.body.offsetHeight;
    //alert(scrollPosition);

    var porcentaje=(100/(pagina_alto-tam_nav-00))*altura;
    document.getElementById("c_pbarra").style.width = porcentaje+"%";
    document.getElementById("pbarra").style.width = pagina_ancho+"px";
  });
});

function actualizar_dimensiones_barra()
{
  pagina_alto=$(document).height();
}
