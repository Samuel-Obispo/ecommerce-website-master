<?php
require_once ('../includes/common.php');

// ID de la imagen a recuperar
$id = $_GET['id']; // Cambia esto según sea necesario

// Consulta para recuperar la imagen
$sql = "SELECT image FROM products WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($imagen);
$stmt->fetch();
$ima=base64_encode($imagen);
// Cerrar la conexión
$stmt->close();
$con->close();
$imagin = "data:image/jpeg;base64, $ima";

echo $imagin;
// Mostrar la imagen
echo "<image src=' $imagin'>";
?>

