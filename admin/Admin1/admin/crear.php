<?php
    require_once "../../../includes/common.php";
    mysqli_set_charset($con,"utf8");

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $proveedor = $_POST['proveedor'];
    $image = $_FILES['imagen'];

    if ($nombre === '') {
        $errores[] = 'Debes especificar el nombre';
    }
    if ($precio === '') {
        $errores[] = 'Debes especificar una precio';
    }
    if ($proveedor === '') {
        $errores[] = 'Debes especificar una proveedor';
    }
    if ($image === '') {
        $errores[] = 'Debes ingresar la imagen';
    }

    if (empty($errores)) {

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
        }
    
        $peticionInsertar = "INSERT INTO products (name, price, image) VALUES ('$nombre', '$precio', '$imgContent')";

        if (mysqli_query($con, $peticionInsertar)) {
            echo 'Datos insertados correctamente';
        } else {
            if (mysqli_errno($con) == 1062) { // Código de error para entradas duplicadas
                header('Location: mensaje_error.php');
                exit();
            } else {
                echo "Error al insertar datos: " . mysqli_error($con);
            }
        }
    } else {
        header("Location: mensaje_error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto </title>
</head>
<body>
    <a href="index.php">Regresar</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">nombre</label>
        <input type="text" name="nombre">
        <label for="">precio</label>
        <input type="number" name="precio">
        <label for="">Proveedor</label>
        <input type="text" name="proveedor">
        <label for="">imagen</label>
        <input type="file" accept="image/*" name="imagen">
        <input type="submit" value="subir">
</body>
</html>