<!DOCTYPE HTML>
<html>

<head>
  <title>Turnos</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jCarouselLite.js"></script>
  <script type="text/javascript" src="js/captify.tiny.js"></script>
  
  <script type="text/javascript">
    $(function() {
    $(".gal").jCarouselLite({
      btnNext: 	".next",
      btnPrev: 	".prev",
      visible: 	4,
      auto: 	2000
      });
    });

    $(document).ready(function(){
      $('img.captify').captify({
        speedOver: 	'fast',
        speedOut: 	'normal',
        hideDelay: 	500,	
        animation: 	'slide',
        prefix: 	'',
        opacity: 	'0.7',
        className: 	'caption-bottom',
        position: 	'bottom',
        auto: 		500,
        spanWidth: 	'100%'
      });
    });

	</script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="#"><span class="logo_colour">MegaTurnos</span></a></h1>
          <h2>Sus turnos web.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">&nbsp;&nbsp;&nbsp;Inicio&nbsp;&nbsp;&nbsp;</a></li>
          <li><a href="sobre_nosotros.php">Sobre Nosotros</a></li>
          <li><a href="por_que_elegirnos.php">Por qué elegirnos</a></li>
          <li><a href="#">¿Cómo funciona?</a></li>
          <li><a href="#">Contáctenos</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <?php include_once 'default.php';
    	  include_once 'footer.php';
    ?>
    </div>
    
    </div>
    </body>
    </html>