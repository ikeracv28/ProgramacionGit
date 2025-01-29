<?php
require_once '../modelo/class_usuario.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?error=no_sesion");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
</head>
<body>
    <h2>Bienvenido, <?= htmlspecialchars($usuario['nombre']) ?> <?= htmlspecialchars($usuario['apellido']) ?></h2>

    <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo_electronico']) ?></p>
    <p><strong>Edad:</strong> <?= htmlspecialchars($usuario['edad']) ?></p>
    <p><strong>Suscripción:</strong> <?= htmlspecialchars($plan['nombre']) ?></p>
    <p><strong>Paquete:</strong> <?= htmlspecialchars($paquete['nombre']) ?></p>

    <a href="editar_usuario.php">Editar usuario</a>
    <a href="editar_plan.php">Cambiar Plan/Paquete</a> |
    <a href="darse_baja.php">Darse de Baja</a> |
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
