<?php 
// Incluimos el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

// Variable para mostrar mensaje de éxito
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new UsuariosController();

    // Llamamos al método "eliminarSocio" del controlador, pasándole el ID del socio que queremos eliminar
    $controller->eliminarUsuario($_POST['id']); 

    // Mensaje de éxito
    $mensaje = "Usuario eliminado con éxito.";
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

    <?php if (!empty($mensaje)): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
        <a href="perfil_admin.php">
            <button>Volver atrás</button>
        </a>
    <?php else: ?>
        <!-- Formulario para eliminar un usuario -->
        <form method="POST" action="">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required><br>
            <input type="submit" value="Eliminar usuario">
        </form>
        <br>
        <a href="lista_usuarios.php">Volver al listado</a>
    <?php endif; ?>

</body>
</html>

