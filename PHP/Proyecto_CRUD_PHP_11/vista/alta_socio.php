<?php 
// Incluimos el archivo del controlador que gestiona los socios
require_once '../controlador/EventoController.php';

// Verificamos si el método usado para enviar datos al servidor es POST (cuando el formulario se envía)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new SociosController();
    
    // Llamamos al método "agregarSocio" del controlador y le pasamos los datos enviados por el formulario
    $controller->agregarSocio(
        $_POST['nombre'],           // Nombre del socio
        $_POST['apellido'],         // Apellido del socio
        $_POST['email'],            // Correo electrónico del socio
        $_POST['telefono'],         // Teléfono del socio
        $_POST['fecha_nacimiento']  // Fecha de nacimiento del socio
    );
    
    // Redirigimos al usuario a la página "lista_socios.php" después de agregar el socio
    header("Location: lista_socios.php");
    exit(); // Detenemos la ejecución del script para asegurarnos de que no se ejecute más código después de la redirección
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Evento</title>
</head>
<body>
    <h1>Agregar Nuevo Evento</h1>
    <!-- formulario para coger los datos del Evento nuevo -->
    <form method="POST" action="">

        <!-- Campo para el nombre del Evento -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <!-- Campo para el apellido del Evento -->
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <!-- Campo para el email del Evento -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <!-- Campo para el teléfono del Evento -->
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <!-- Campo para la fecha de nacimiento del Evento -->
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Agregar Evento">
    </form>
    <br>
    <!-- Enlace para volver al listado de Evento -->
    <a href="lista_socios.php">Volver al listado</a>
</body>
</html>


