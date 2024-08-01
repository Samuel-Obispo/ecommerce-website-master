<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jholsan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .options {
            list-style: none;
            padding: 0;
            text-align: center;
        }
        .options li {
            display: inline-block;
            margin-right: 10px;
        }
        .options li a {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .options li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ventana de administrador</h1>
        <ul class="options">
            <li><a href="crear.php">Registrar un producto</a></li>
            <li><a href="editar.php">Editar un producto</a></li>
            <li><a href="list.php">Eliminar un producto</a></li>
            
        </ul>
    </div>
</body>
</html>
