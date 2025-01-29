<?php
require_once '../modelo/class_usuario.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?error=no_sesion");
    exit();
}

$correo = $_SESSION['usuario']['correo'];
$usuario = new Usuario();
$usuario->eliminarUsuario($correo);

session_destroy();
header("Location: index.php?mensaje=usuario_eliminado");
exit();
