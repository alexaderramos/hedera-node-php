<?php
session_start();

if (isset($_SESSION['token'])) {
    header('Location: /dashboard.php');
    exit();
}else{
    header('Location: /login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <h1>Bienvenido a la Aplicación de Gestión de Tokens</h1>
    <p>Por favor, regístrate o inicia sesión para acceder a tu panel.</p>
    
    <a href="/login.php">Iniciar Sesión</a> |
    <a href="/register.php">Registrarse</a>
</body>
</html>
