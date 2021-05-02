<!DOCTYPE html>
<html>
<head>
    <title>HiroAuto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="lib/main.css" rel="stylesheet">
    <link href="css/style6.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <script src="lib/main.js"></script> 
    <style type="text/css">

          #calendar {
               max-width: 1100px;
               margin: 0 auto;
          }
     </style>

</head>
<?php
if(isset($_SESSION['id_u']) && $_SESSION['lvl'] ==1){
    ?>
<header>
  <div class="container">
    <div class = "autohiro-left">
        <h1 class="text-white">HiroAuto Eleve</h1>
    </div>
        <nav class = "autohiro-right">
    <ul>
      <li><a href="accueil">Accueil</a></li>
      <li><a href="agenda">Agenda</a></li>
      <li><a href="galerie">Galerie</a></li>
      <li><a href="reception">Message</a></li>
      <li><a href="logout">Deconnexion</a></li>
      
   </ul>
  </nav>
  </div>
</header>
<?php }
elseif (isset($_SESSION['id_u']) && $_SESSION['lvl'] ==2) {
  ?>
   <header>
  <div class="container">
    <div class = "autohiro-left">
        <h1 class="text-white">HiroAuto Moniteur</h1>
    </div>
    <nav class = "autohiro-right">
    <ul>
      <li><a href="accueil">Accueil</a></li>    
      <li><a href="agenda-admin">Agenda</a></li>
      <li><a href="reception">Message</a></li>
      <li><a href="logout">Deconnexion</a></li>
   </ul>
  </nav>
  </div>
</header>
<?php } 
  elseif (isset($_SESSION['id_u']) && $_SESSION['lvl'] ==3) {
    ?>
      <header>
  <div class="container">
    <div class = "autohiro-left">
        <h1 class="text-white">HiroAuto Administration</h1>
    </div>
    <nav class = "autohiro-right">
    <ul>
      <li><a href="accueil">Accueil</a></li>
      <li><a href="admin">Liste</a></li>     
      <li><a href="logout">Deconnexion</a></li>
   </ul>
  </nav>
  </div>
</header>
<?php } else { ?>
    <header>
  <div class="container">
    <div class = "autohiro-left">
        <h1 class="text-white">HiroAuto</h1>
    </div>
    <nav class = "autohiro-right">
    <ul>
      <li><a href="accueil">Accueil</a></li>
      <li><a href="login">Connexion</a></li> 
      <li><a href="inscription">S'inscrire</a></li>    
      <li><a href="galerie">Galerie</a></li>
      
   </ul>
  </nav>
  </div>
</header>
<?php } ?>



<body>

<?= $content; ?>

<!-- Footer -->
<footer class="py-5 bg-dark" style="position: sticky;">
    <div class="container">
      <footer class="py-5 bg-dark text-light" style="position: sticky;">
   <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>Description</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    . . .
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>S'inscrire</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li>Inscrivez vous pour profiter de nos produit</a></li>
                </ul>
            </div>

            

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> AutoHiro</li>
                    <li><i class="fa fa-envelope mr-2"></i> AutoHiro@gmail.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 74 66 14 95</li>
                    <li><i class="fa fa-print mr-2"></i> + 33 24 56 02 34</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /.container -->
  </footer>
      <p class="m-0 text-center text-white">Copyright &copy; AUTOHIRO 2021</p>
    </div>
    <!-- /.container -->
  </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script type="text/javascript" src="assets/zoombox.js"></script> 

        

  <script type="text/javascript">
jQuery(function($){
    $('a.zoombox').zoombox();

});
</script>

</body>
</html>