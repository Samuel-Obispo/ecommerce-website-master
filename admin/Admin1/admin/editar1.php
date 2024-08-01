<?php
    require_once "../../../includes/common.php";
    mysqli_set_charset($con,"utf8");

$errores = [];


// Verificar si se ha proporcionado un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID no proporcionado.');
}

$id = mysqli_real_escape_string($con, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $proveedor = $_POST['proveedor'];
    $image = $_FILES['imagen'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $image = $_FILES['imagen']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $sqlActualizar = "UPDATE products SET name = '$nombre', price = '$precio', image='$imgContent' WHERE id=$id";
    

    if (mysqli_query($con, $sqlActualizar)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . mysqli_error($con);
    }
} else {
    $sql = "SELECT * FROM products WHERE id=$id";
    $resultado = mysqli_query($con, $sql);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($con));
    }

    $libro = mysqli_fetch_assoc($resultado);

    if (!$libro) {
        die('No se encontró un producto con el ID proporcionado.');
    }

    mysqli_free_result($resultado);
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Editar un producto</h1>
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
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
