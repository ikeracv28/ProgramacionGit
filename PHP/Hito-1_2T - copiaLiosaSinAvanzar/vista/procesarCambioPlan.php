<?php
require_once '../modelo/class_usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $suscripcion = $_POST['suscripcion'];
    $paquete = $_POST['paquete'];
    $edad = $_POST['edad'];

    $usuario = new Usuario();
    $datosUsuario = $usuario->obtenerUsuarioPorCorreo($correo);

    if (!$datosUsuario) {
        header("Location: editar_plan.php?error=Usuario no encontrado.");
        exit();
    }

    // Validaciones
    if ($edad < 18 && $paquete !== "infantil") {
        header("Location: editar_plan.php?error=Los menores de 18 solo pueden elegir el paquete Infantil.");
        exit();
    }

    if ($paquete === "deportes" && $suscripcion !== "anual") {
        header("Location: editar_plan.php?error=El paquete Deportes solo está disponible para suscripciones anuales.");
        exit();
    }

    // Actualizar plan en la base de datos
    $usuario->actualizarPlanUsuario($correo, $suscripcion, $paquete);
    
    // Actualizar datos en sesión
    $_SESSION['usuario']['suscripcion'] = $suscripcion;
    $_SESSION['usuario']['paquete'] = $paquete;

    header("Location: dashboard.php?mensaje=Plan actualizado correctamente.");
    exit();
} else {
    header("Location: editar_plan.php?error=Método no permitido.");
    exit();
}

