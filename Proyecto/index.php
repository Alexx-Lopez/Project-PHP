<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>FORMA-TEC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="CSS/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="CSS/Style2.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="CSS/responsive.css" rel="stylesheet">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script type="text/javascript">

  $(document).ready(function(){
    var altura = $('#barra_menu').offset().top;

    $(window).on('scroll', function(){
      if ( $(window).scrollTop() > altura ){
        $('#barra_menu').addClass('menu-fixed');
        $('.opcion_menu').addClass('menu_letras_negras');
        $('#logo_barra').addClass('img_logo_formatec_visible');
      } else {
        $('#barra_menu').removeClass('menu-fixed');
        $('.opcion_menu').removeClass('menu_letras_negras');
        $('#logo_barra').removeClass('img_logo_formatec_visible');
      }
    });

  });

  </script>

  <script>
  $(document).ready(function(){
    var pagina_ancho=$(window).width();
    //var pagina_alto=document.body.scrollHeight;
    var pagina_alto=$(document).height();
    var tam_nav=$(window).height();
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

      var porcentaje=(100/(pagina_alto-tam_nav-89))*altura;
      document.getElementById("c_pbarra").style.width = porcentaje+"%";
      document.getElementById("pbarra").style.width = pagina_ancho+"px";
    });

  });
  </script>




  <!--<script src="JS/barra.js"></script>-->
  <link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>
<body data-spy="scroll" data-target="#navbar-example">


  <div id="preloader"></div>

  <div id="c_pbarra" style="overflow: hidden; position: fixed; z-index: 1001;">
    <div id="pbarra"class="progress_bar">
    </div>
  </div>

  <header>
    <div style="background-color:#e3e5e8;box-shadow: inset 0px 0px 60px black;">
      <img src="Images/Design/LOGO OFICIAL.png" style="width:60%; display:block;margin:0 auto;">
    </div>
    <div>
      <div>
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
          <div class="">



            <nav id="barra_menu" class="navbar navbar-default menu" role="navigation">

              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed boton_collapse" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                  <img id="logo_barra" src="Images/Design/LOGO OFICIAL.png" alt="" title="" class="img_logo_formatec">
                </a>
              </div>

              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example" style="box-shadow: 0px 10px 50px black;">
                <ul class="nav navbar-nav">
                  <li class="active"><a class="opcion_menu page-scroll" href="index.php"><b>Inicio</b></a></li>
                  <li><a class="opcion_menu page-scroll" href="#quienes_somos"><b>FORMA TEC</b></a></li>
                  <li><a class="opcion_menu page-scroll" href="#mision"><b>Misión</b></a></li>
                  <li><a class="opcion_menu page-scroll" href="#vision"><b>Visión</b></a></li>
                </ul>
              </div>
            </nav>

          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="sector_sesion">
    <button type="button" class="btn" style="position:absolute;background-color: hsla(0, 3%, 87%, 0.56);"><span class="glyphicon glyphicon-menu-left"></span></button>
    <div><a href="login.php" style="text-align:center;color: white;text-decoration: none;">Iniciar Sesión</a></div>
  </div>

  <div class="contenedor" style="margin-top:10px;">
    <div class="lineas_disfuminadas"></div>
    <h3><b>Publicaciones</b></h3>
    <div class="lineas_disfuminadas"></div>
  </div>

  <div id="quienes_somos" class="contenedor_padre">
    <div class="contenedor">
      <div class="lineas_disfuminadas"></div>
      <h3><b>¿Quienes Somos?</b></h3>
      <div class="lineas_disfuminadas"></div>
    </div>
  </div>

  <div id="mision" class="contenedor_padre">
    <div class="contenedor">
      <div class="lineas_disfuminadas"></div>
      <h3><b>Misión</b></h3>
      <div class="lineas_disfuminadas"></div>
    </div>
  </div>

  <div id="vision" class="contenedor_padre">
    <div class="contenedor">
      <div class="lineas_disfuminadas"></div>
      <h3><b>Visión</b></h3>
      <div class="lineas_disfuminadas"></div>
    </div>
  </div>

  <footer>
    <div><h4>FORMA TEC © Derechos Reservados 2018.</h4></div>
  </footer>

  <!-- JavaScript Libraries -->
  <!--<script src="lib/jquery/jquery.min.js"></script>-->


  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>

  <script src="JS/main.js"></script>

</body>
</html>
