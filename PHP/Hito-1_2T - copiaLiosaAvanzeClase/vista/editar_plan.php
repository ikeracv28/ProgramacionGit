<?php
require_once '../modelo/class_usuario.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?error=no_sesion");
    exit();
}

$usuario = $_SESSION['usuario'];

// Verificar si el usuario es menor de edad
if ($usuario['edad'] < 18) {
    // Redirigir a la página de selección de plan infantil
    header("Location: seleccionar_plan.php?error=solo_plan_infantil");
    exit();
}

// Aquí va el resto del código para mostrar los planes disponibles
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plan</title>
</head>
<body>
    <h2>Editar Plan</h2>
    <!-- Aquí puedes agregar el formulario para editar el plan -->
</body>
</html>
