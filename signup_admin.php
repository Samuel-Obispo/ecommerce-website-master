<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jholsan_uniformes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$admin_username = "admin";
$admin_password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO users_admin (username, password) VALUES ('$admin_username', '$admin_password')";

if ($conn->query($sql) === TRUE) {
    echo "Se ha registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

