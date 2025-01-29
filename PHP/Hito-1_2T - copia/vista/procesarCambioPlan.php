<?php
require_once '../modelo/class_usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $suscripcion = $_POST['suscripcion'];
    $paquete = $_POST['paquete'];

    $usuario = new Usuario();
    $datosUsuario = $usuario->obtenerUsuarioPorCorreo($correo);

    if (!$datosUsuario) {
        header("Location: editar_plan.php?error=usuario_no_encontrado");
        exit();
    }

    if ($datosUsuario['edad'] < 18 && $paquete !== "infantil") {
        header("Location: editar_plan.php?error=Solo los menores pueden elegir el paquete infantil.");
        exit();
    }

    if ($paquete === "deportes" && $suscripcion !== "anual") {
        header("Location: editar_plan.php?error=Para el paquete deportes, la suscripción debe ser anual.");
        exit();
    }

    $usuario->actualizarPlanUsuario($correo, $suscripcion, $paquete);
    $_SESSION['usuario']['suscripcion'] = $suscripcion;
    $_SESSION['usuario']['paquete'] = $paquete;

    header("Location: perfil_usuario.php?mensaje=plan_actualizado");
    exit();
} else {
    header("Location: editar_plan.php?error=metodo_invalido");
    exit();
}
