<?php 
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();
    $controller->agregarUsuario(
        $_POST['nombre'], 
        $_POST['apellido'], 
        $_POST['correo_electronico'], 
        $_POST['contraseña'],
        $_POST['edad']
    );
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Nuevo Usuario</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br>

        <label for="edad">Edad:</label>
        <input type="int" id="edad" name="edad" required><br>


        <input type="submit" value="Agregar Usuario">
    </form>
    <br>
    <a href="lista_usuarios.php">
</body>
</html>
