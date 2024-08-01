// admin/login.php
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];

    // Credenciales de administrador hardcodeadas
    $admin_email = "Admin12@gmail.com";
    $admin_password = "Admin123";

    if ($input_email === $admin_email && $input_password === $admin_password) {
        // Credenciales válidas
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $input_email;
        header("Location: admin/Admin1/admin/index.php");
        exit();
    } else {
        // Credenciales incorrectas
        echo "Invalid email or password.";
    }
}
?>
