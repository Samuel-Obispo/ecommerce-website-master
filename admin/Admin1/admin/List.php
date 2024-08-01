<?php
    require_once "../../../includes/common.php";
    mysqli_set_charset($con,"utf8");

$errores = [];

// Eliminar registro si se envía una solicitud POST para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $sqlEliminar = "DELETE FROM products WHERE id=$id";

    if (mysqli_query($con, $sqlEliminar)) {
        echo "Registro eliminado con éxito";
    } else {
        echo "Error eliminando el registro: " . mysqli_error($con);
    }
}

// Obtener todos los registros de la tabla products
$sql = "SELECT * FROM products";
$resultado = mysqli_query($con, $sql);

if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de products</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        form {
            display: inline;
        }
        input[type="submit"] {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <a href="index.php">Regresar</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php while ($products = mysqli_fetch_assoc($resultado)): ?>
            <>
                <td><?php echo htmlspecialchars($products['id']); ?></td>
                <td><?php echo htmlspecialchars($products['name']); ?></td>
                <td><?php echo htmlspecialchars($products['price']); ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($products['id']); ?>">
                        <input type="submit" name="eliminar" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
mysqli_free_result($resultado);
mysqli_close($con);
?>
