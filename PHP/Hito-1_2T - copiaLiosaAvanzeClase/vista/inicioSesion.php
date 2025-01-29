<?php
require_once '../modelo/class_usuario.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $usuario = new Usuario();
    $datosUsuario = $usuario->verificarCredenciales($correo, $contraseña);

    if ($datosUsuario) {
        $_SESSION['usuario'] = $datosUsuario;
        header("Location: perfil_usuario.php");
        exit();
    } else {
        header("Location: login.php?error=credenciales_invalidas");
        exit();
    }
} else {
    header("Location: login.php?error=metodo_invalido");
    exit();
}
