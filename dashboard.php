// admin/dashboard.php
<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido Admin, " . $_SESSION['admin_email'];
?>
