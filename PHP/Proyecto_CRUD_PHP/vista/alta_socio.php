<?php 
require_once '../controlador/SociosController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new SociosController();
    $controller->agregarSocio(
        $_POST['nombre'], 
        $_POST['apellido'], 
        $_POST['email'], 
        $_POST['telefono'], 
        $_POST['fecha_nacimiento']
    );
    header("Location: lista_socios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Socio</title>
</head>
<body>
    <h1>Agregar Nuevo Socio</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <input type="submit" value="Agregar Socio">
    </form>
    <br>
    <a href="lista_socios.php">Volver al listado</a>
</body>
</html>


