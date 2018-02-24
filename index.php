<?php
$idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

if($idioma=='es'){

$newexperience = "Una nueva experiencia virtual!";
$gotoava = "Ir a Avianca Airlines";
$gotoavava = "Ir a Avianca Virtual";
$attention = "ATENCIÓN!";
$information = "<h3>Si usted está buscando la aerolínea o desea comprar pasajes de <b>Avianca Airlines</b>, esta no es la página real, esta es una <b>página de simulación aérea</b> y no guarda relación con Avianca Airlines.</h3>";

} else if($idioma=='pt'){

$newexperience = "Uma nova experiência virtual!";
$gotoava = "Vá para Avianca Airlines";
$gotoavava = "Vá para Avianca Virtual";
$attention = "ATENÇÃO!";
$information = "<h3> Se você está procurando a companhia aérea ou quer comprar ingressos de <b> Avianca Airlines </ b>, esta não é a página atual, esta é uma <b> página de simulação de ar </ b> e não tem relacionamento com a Avianca Airlines. </ h3> ";


} else {


$newexperience = "A new virtual experience!";
$gotoava = "Go to Avianca Airlines";
$gotoavava = "Go to Avianca Virtual";
$attention = "ATTENTION!";
$information = "<h3> If you are looking for the airline or want to buy tickets from <b> Avianca Airlines </ b>, this is not the actual page, this is a <b> air simulation page </ b> and has no relationship with Avianca Airlines. </ h3> ";


} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Free coming soon template with jQuery countdown">

  <title>Avianca Virtual</title>

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="./vam/images/favicon.ico" type="image/x-icon" rel="icon" />
  <!-- siimple style -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: WeBuild
    Theme URL: https://bootstrapmade.com/free-bootstrap-coming-soon-template-countdwon/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  <div id="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><img src="./assets/img/avianca.png" width="70%"></h1>
          <h2 class="subtitle"><?php echo $newexperience; ?></h2>
    
          <div class="social">
            <a href="https://www.avianca.com/co/es/" class="btn  btn-danger"> <?php echo $gotoava; ?></a>
			<a href="./vam/" class="btn  btn-danger"><i class="fa fa-plane" aria-hidden="true"></i> <?php echo $gotoavava; ?></a>
          </div>
        </div>
      </div>

      <div class="row contctform">
        <div class="col-md-8 col-md-offset-2">
          <h3><b><?php echo $attention; ?></b> </h3>
		  <hr>
		  <?php echo $information; ?>
		  </div>

      </div>

      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <p class="copyright">&copy; <?php echo date('Y'); ?> Avianca Virtual - All Rights Reserved</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact. 
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=WeBuild
            -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script type="text/javascript">
    $('#countdown').countdown('2018/03/21', function(event) {
      $(this).html(event.strftime('%w semanas %d días <br /> %H:%M:%S'));
    });
  </script>

  <script src="contactform/contactform.js"></script>

</body>

</html>
