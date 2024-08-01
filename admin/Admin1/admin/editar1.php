<?php
$conexion = mysqli_connect('localhost', 'root', '','jholsan_uniformes   ');

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Verificar si se ha proporcionado un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID no proporcionado.');
}

$id = mysqli_real_escape_string($conexion, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = mysqli_real_escape_string($conexion, $_POST['isbn']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);

    $sqlActualizar = "UPDATE libros SET isbn='$isbn', nombre='$nombre', autor='$autor', precio='$precio', editorial='$editorial' WHERE id=$id";

    if (mysqli_query($conexion, $sqlActualizar)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error actualizando el registro: " . mysqli_error($conexion);
    }
} else {
    $sql = "SELECT * FROM libros WHERE id=$id";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    $libro = mysqli_fetch_assoc($resultado);

    if (!$libro) {
        die('No se encontró un libro con el ID proporcionado.');
    }

    mysqli_free_result($resultado);
}

mysqli_close($conexion);
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
    <form method="post" action="">
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($libro['isbn']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($libro['nombre']); ?>">
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>">
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($libro['precio']); ?>">
        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" value="<?php echo htmlspecialchars($libro['editorial']); ?>">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
