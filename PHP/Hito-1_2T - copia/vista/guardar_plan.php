<?php
require_once '../modelo/class_usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $edad = (int)$_POST['edad'];
    $suscripcion = $_POST['suscripcion'];
    $paquete = $_POST['paquete'];

    // Validaciones en PHP
    if ($edad < 18 && $paquete !== "infantil") {
        header("Location: seleccionar_plan.php?correo=$correo&edad=$edad&error=Solo los menores de edad pueden elegir el paquete infantil.");
        exit();
    }

    if ($paquete === "deportes" && $suscripcion !== "anual") {
        header("Location: seleccionar_plan.php?correo=$correo&edad=$edad&error=Para elegir el paquete de deportes, la suscripción debe ser anual.");
        exit();
    }

    $usuario = new Usuario();
    $usuario->actualizarPlanUsuario($correo, $suscripcion, $paquete);

    header("Location: login.php?registro_exitoso=1");
    exit();
} else {
    header("Location: seleccionar_plan.php?error=metodo_invalido");
    exit();
}
