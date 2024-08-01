<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JHOLSAN | Uniformes Médicos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
         <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:150px">
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;" >
            <h1 style="color:white;">Bienvenido a Jholsan </h1>
            <p> Todos nuestros productos estan unidos para que no se te dificulte el buscarlos!</p>

            </div>
            </div>

        </div>
    </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" class="cosita">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->

    <!--Inicia Seccion de Filipinas -->
    <div class='row text-center'>


        <?php
        require_once "includes/common.php";
        mysqli_set_charset($con,"utf8");
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $search = $_POST["search_item"];
            $sql = "SELECT id, name, price, image FROM products WHERE name LIKE '%{$search}%' ORDER BY name DESC";
        } else {
            $sql = "SELECT id, name, price, image FROM products ORDER BY name DESC";
        
        }
        $result = mysqli_query($con,$sql);
        echo "<div class='row product-container'>";
        while($consulta  = mysqli_fetch_array($result)){
            $id = $consulta['id'];
            
            echo "
             <div class='product'><ul>
        <div class='card' style='width: 15rem;'>
        <img src = 'data:image/png;base64," . base64_encode($consulta['image']) . "' />
        <div class='card-body'>
        <h5 class='card-title'>$consulta[name]</h5>
        $$consulta[price]";
        if (!isset($_SESSION['email'])) {?>
            <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
            <?php
            } else {
            if (check_if_added_to_cart($id)) {
             echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
            } else {
                ?>
                <p><a href="cart-add.php?id=<?php echo $id ?>" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a><p>
                <?php
                }
            } echo "</div></div></div></ul>";
        }
        echo "</div>";
        ?>
    </div>

      <!--menu list ends-->
      <!-- footer-->
        <?php include 'includes/footer.php'?>
      <!--footer ends-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>