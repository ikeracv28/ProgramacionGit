<?php 
require_once '../controlador/UsuariosController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();
    $controller->actualizarUsuario(
        $_POST['id'],
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
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <input type="submit" value="Editar Usuario">
    </form>
    <br>
    <a href="lista_usuarios.php">Volver al listado</a>
</body>
</html>