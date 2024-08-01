<?php
require "includes/common.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Jholsan | Uniformes Médicos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <?php
        include 'includes/header_menu.php';
        ?>
        <div class="d-flex flex-column justify-content-center align-items-center align-self-center" style="height:100vh">
            <div class="justify-content-center align-items-center">
                <table class="table table-striped table-bordered table-hover ">
                    <?php
                    $sum = 0;
                    $user_id = $_SESSION['user_id'];
                    $query = " SELECT products.price AS Price, products.id, products.name AS Name FROM users_products JOIN products ON users_products.item_id = products.id WHERE users_products.user_id='$user_id' and status='Confirmed'";
                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) >= 1) {
                    ?>
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $sum += $row["Price"];
                                $id = $row["id"] . ", ";
                                echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>$ " . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
                            }
                            $id = rtrim($id, ", ");
                            echo "<tr><td></td><td>Total</td><td>$ " . $sum . "</td><td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td></tr>";
                            ?>
                        </tbody>
                    <?php
                    } else {
                        echo "<img src='images/emptycart.png' class='cart' height='200' width='250'><br/>";
                        echo "<div class='text-bold  h5'>Añade articulos a tu carrito!</div>";
                    }
                    ?>
                    <?php
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--footer -->
        <?php include 'includes/footer.php' ?>
        <!--footer end-->

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    $(document).ready(function() {

        if (window.location.href.indexOf('#login') != -1) {
            $('#login').modal('show');
        }

    });
</script>
<?php if (isset($_GET['error'])) {
    $z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";
} ?>
<?php if (isset($_GET['errorl'])) {
    $z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";
} ?>

</html>