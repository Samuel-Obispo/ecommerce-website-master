<h1?php
require ("includes/common.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jholsan | Uniformes Médicos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
</head>
<body style="overflow-x:hidden; padding-bottom:100px;">
  <?php
        include 'includes/header_menu.php';
    ?>
  <div>
    <div class="container mt-5 ">
      <div class="row justify-content-around">
        <div class="col-md-5 mt-3">
          <h1 class="text-dark pt-3 title"> ¿Quiénes somos?</h1>
          <hr />
          <img
            src="images/jholsan.png"
            class="img-fluid d-block rounded mx-auto image-thumbnail">
          <p class="mt-2">En JHOLSAN, nos dedicamos a proporcionar uniformes médicos de alta calidad que combinan comodidad,
             durabilidad y estilo. Con más de 20 años de experiencia en el sector, nos hemos consolidado como líderes en la industria, 
             ofreciendo soluciones que satisfacen las necesidades de profesionales de la salud en todo el país.</p>
        </div>
        <div class="col-md-5 mt-3">
          <span class="text-dark pt-3">
            <h1 class="title">Nuestra Misión</h1>
          </span>
          <hr>
          <p>
          Nuestra misión es mejorar la experiencia de trabajo de los profesionales de la salud, 
          ofreciéndoles uniformes que no solo cumplan con los estándares más altos de calidad y funcionalidad,
           sino que también reflejen su profesionalismo y dedicación
          </p>

          <span class="text-dark pt-3"></span>
            <h1 class="title">Nuestra Visión</h1> 
          <p>Aspiramos a ser la marca de referencia en uniformes médicos, reconocida por nuestra innovación, 
            excelencia en el servicio al cliente y compromiso con la satisfacción del usuario</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container pb-3">
  </div>
  <div class="container mt-3 d-flex justify-content-center card pb-3 col-md-6">

    <form class="col-md-12"  method="POST" name="_next">
      <h3 class="text-dark pt-3 title mx-auto">Contactanos</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Correo</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingresa tu correo"
          name="email">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mensaje</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5"></textarea>
      </div>
      <input type="hidden" name="_next" value="http://localhost/foody/about.php" />
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>


  </div>
  <!--footer -->
  <?php include 'includes/footer.php'?>
  <!--footer end-->


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
  });
  $(document).ready(function () {

    if (window.location.href.indexOf('#login') != -1) {
      $('#login').modal('show');
    }

  });
</script>
<?php if(isset($_GET['error'])){ $z=$_GET['error']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
<?php if(isset($_GET['errorl'])){ $z=$_GET['errorl']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
</html>
