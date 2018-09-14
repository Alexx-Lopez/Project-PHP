$(document).ready(function(){
  //var pagina_alto=document.body.scrollHeight;
  var pagina_alto=$(document).height();
  var tam_nav=$(window).height();
  if(pagina_alto>tam_nav)
  {
    document.getElementById("footer").style.position="initial";
  }else{
    document.getElementById("footer").style.position="absolute";
  }
});
