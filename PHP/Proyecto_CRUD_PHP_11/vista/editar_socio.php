<?php 
// Incluimos el archivo del controlador para gestionar las operaciones con los socios
require_once '../controlador/SociosController.php';

// Verificamos si el formulario fue enviado (se usa el método POST para enviar datos al servidor)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new SociosController();

    // Llamamos al método "actualizarSocio" del controlador, pasando los datos enviados por el formulario
    $controller->actualizarSocio(
        $_POST['id'],               // ID del socio que queremos actualizar
        $_POST['nombre'],           // Nuevo nombre del socio
        $_POST['apellido'],         // Nuevo apellido del socio
        $_POST['email'],            // Nuevo email del socio
        $_POST['telefono'],         // Nuevo teléfono del socio
        $_POST['fecha_nacimiento']  // Nueva fecha de nacimiento del socio
    );

    // Redirigimos al usuario a la página "lista_socios.php" después de actualizar al socio
    header("Location: lista_socios.php");
    exit(); // Detenemos la ejecución del script para asegurar la redirección
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Socio</title>
</head>
<body>
    <h1>Editar Socio</h1>
    <!-- Formulario para editar los datos de un socio -->
    <form method="POST" action="">
        <!-- Campo para el ID del socio (esto identifica al socio que vamos a editar) -->
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <!-- Campo para editar el nombre del socio -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <!-- Campo para editar el apellido del socio -->
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <!-- Campo para editar el email del socio -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <!-- Campo para editar el teléfono del socio -->
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <!-- Campo para editar la fecha de nacimiento del socio -->
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Editar socio">
    </form>
    <br>
    <!-- Enlace para volver al listado de socios -->
    <a href="lista_socios.php">Volver al listado</a>
</body>
</html>

