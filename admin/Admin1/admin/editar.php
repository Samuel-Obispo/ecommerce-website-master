<?php
    require_once "../../../includes/common.php";
    mysqli_set_charset($con,"utf8");

$errores = [];

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
    <title>Lista de productos</title>
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
        .button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
        }
        .button-editar {
            background-color: #4CAF50;
        }
        .button-editar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Lista de productos</h1>
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
                    <a href="editar1.php?id=<?php echo htmlspecialchars($products['id']); ?>" class="button button-editar">Editar</a>
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
