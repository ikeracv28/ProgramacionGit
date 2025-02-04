<?php 
// Incluimos el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

// Comprobamos si el formulario fue enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new UsuariosController();

    // Llamamos al método "eliminarSocio" del controlador, pasándole el ID del socio que queremos eliminar
    $controller->eliminarUsuario(
        $_POST['id'] // Este ID viene del formulario, indica qué socio se va a eliminar
    );

    // Redirigimos al usuario a la página "index_admin_opciones.php" después de eliminar al socio
    header("Location: perfil_admin.php");
    exit(); // Finalizamos la ejecución del script para asegurarnos de que no se haga nada más después
    
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <!-- Formulario para eliminar un socio -->
    <form method="POST" action="">
        <!-- Campo para ingresar el ID del socio a eliminar -->
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>
        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Eliminar socio">
    </form>
    <br>
    <!-- Enlace para regresar al listado de socios -->
    <a href="perfil_admin.php">Volver al listado</a>
</body>
</html>
