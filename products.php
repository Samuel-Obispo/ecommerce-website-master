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
        <img src='/images/$IMAGEEN' class='img-fluid pb-1'  alt='imagen de $consulta[name]'>
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

        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/filipinaPrincesa.png" alt="" class="img-fluid pb-1" >
                <div class="figure-caption">
                    <h6> <?php  ?> </h6>
                    <h6>Precio: $600.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(1)) {
                     echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                        ?>
                        <p><a href="cart-add.php?id=1" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a><p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>



        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/filipinaSegal.png" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Filipina Médica de Mujer Segal</h6>
                    <h6>Precio: $700.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(2)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                         } else {
                        ?>
                        <p><a href="cart-add.php?id=2" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                         }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/filipinahombre.png" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Filipina Médica de Hombre</h6>
                    <h6>Precio: $695.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(3)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        <p><a href="cart-add.php?id=3" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/filipinaSegal1.png" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Filipina Médica de Hombre Segal</h6>
                    <h6>Precio: $799.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(4)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=4" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--Inicia Seccion de Quirurgicos -->
    <div class="row text-center" id="shirt">
            <div class="col-md-3 col-6 py-3" >
                <div class="card">
                    <img src="images/pijamaQuirurgicaH.png" alt="" class="img-fluid pb-1"  >
                    <div class="figure-caption">
                    <h6>Pijama Quirúrgica de Hombre</h6>
                    <h6>Precio: $1000.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(5)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        <p><a href="cart-add.php?id=5" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 py-3">
                <div class="card">
                    <img src="images/quirurgicoH.png" alt="" class="img-fluid pb-1" >
                    <div class="figure-caption">
                    <h6>Pijama Quirúrgica de Hombre Antibacterial</h6>
                    <h6>Precio: $1,349.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(6)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        <p><a href="cart-add.php?id=6" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                    }
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 py-3">
                <div class="card">
                    <img src="images/quirurgicaM.png" alt="" class="img-fluid pb-1">
                    <div class="figure-caption">
                        <h6>Pijama Quirúrgica de Mujer</h6>
                        <h6>Precio: $600.00</h6>
                        <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(7)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p><a href="cart-add.php?id=7" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 py-3" >
                <div class="card">
                    <img src="images/antibacterialM.png" alt="" class="img-fluid pb-1">
                    <div class="figure-caption">
                        <h6>Pijama Quirúrgica de Mujer Catherine Antibacterial</h6>
                        <h6>Precio: $1349.00</h6>
                        <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white" value="">Añadir al carrito</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(8)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        <p><a href="cart-add.php?id=8" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                        <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!--Inicia Seccion de Bata -->
        <div class="row text-center" id="shoes" >
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <img src="images/bataParigi.png" alt="" class="img-fluid pb-1">
                        <div class="figure-caption">
                            <h6>Bata Médica de Mujer Parigi</h6>
                            <h6>Precio: $799.00</h6>
                            <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(9)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p><a href="cart-add.php?id=9" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <img src="images/bataAntib.png" alt="" class="img-fluid pb-1">
                        <div class="figure-caption">
                            <h6>Bata Médica de Mujer Musa Dama Win Antibacterial</h6>
                            <h6>Precio: $869.00</h6>
                            <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(10)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                     <p><a href="cart-add.php?id=10" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                     <?php
                    }
                    }
                    ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 py-3">
                    <div class="card">
                        <img src="images/toledo.png" alt="" class="img-fluid pb-1">
                        <div class="figure-caption">
                            <h6>Bata Médica de Hombre Toledo</h6>
                            <h6>Precio: $799.00</h6>
                            <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(11)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p><a href="cart-add.php?id=11" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 py-3" >
                    <div class="card">
                        <img src="images/waterproof.png" alt="" class="img-fluid pb-1">
                        <div class="figure-caption">
                        <h6>Bata Médica de Hombre Wet Free Waterproof</h6>
                    <h6>Precio: $499.00</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(12)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    </p><a href="cart-add.php?id=12" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Inicia Seccion de Accesorios -->
            <div class="row text-center" id="headphones">
                    <div class="col-md-3 col-6 py-3" >
                        <div class="card">
                            <img src="images/liso.png" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Gorro Quirúrgico Unisex Liso</h6>
                                <h6>Precio: $149.00</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(13)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p> <a href="cart-add.php?id=13" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/cangurera.png" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Cangurera Quirúrgica Unisex Loulou</h6>
                                <h6>Precio: $199.00</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(14)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    </p><a href="cart-add.php?id=14" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/unisex.png" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Cofia Quirúrgica Unisex Protect</h6>
                                <h6>Precio: $99.00</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white " >Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(15)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    </p><a href="cart-add.php?id=15" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                   <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/protect.png" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Gorro Protect Unisex</h6>
                                <h6>Precio: $149.00</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Añadir al carrito</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(16)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p> <a href="cart-add.php?id=16" name="add" value="add" class="btn btn-warning  text-white">Añadir al carrito</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
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