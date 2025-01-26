<?php 
// Incluimos el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/SociosController.php';

// Comprobamos si el formulario fue enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new SociosController();

    // Llamamos al método "eliminarSocio" del controlador, pasándole el ID del socio que queremos eliminar
    $controller->eliminarSocio(
        $_POST['id'] // Este ID viene del formulario, indica qué socio se va a eliminar
    );

    // Redirigimos al usuario a la página "lista_socios.php" después de eliminar al socio
    header("Location: lista_socios.php");
    exit(); // Finalizamos la ejecución del script para asegurarnos de que no se haga nada más después
    
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Socio</title>
</head>
<body>
    <h1>Eliminar Socio</h1>
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
    <a href="lista_socios.php">Volver al listado</a>
</body>
</html>
