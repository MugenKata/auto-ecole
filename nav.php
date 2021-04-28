<!DOCTYPE html>
<html>
<head>
    <title>autoecole</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="lib/main.css" rel="stylesheet">
    <script src="lib/main.js"></script> 
    <style type="text/css">
          #calendar {
               max-width: 1100px;
               margin: 0 auto;
          }
     </style>
</head>

<header>
  <div class="row"style="background-color:black;height: 70px;">
  <div class="container" >
<h2 style="text-align: center;margin-top:auto;color: white;" >
  Auto-Ecole
</h2>
  </div>
  </div>

</header>
<body>

<?= $content; ?>

<div class="d-flex justify-content-center mt-4">
    <div class="col-auto">
        <?= Alerts::getFlash(); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>