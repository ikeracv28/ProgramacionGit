<?php 
// Incluimos el archivo del controlador que gestiona los eventos
require_once '../controlador/EventosController.php';

// Verificamos si el método usado para enviar datos al servidor es POST (cuando el formulario se envía)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de eventos
    $controller = new EventosController();
    
    // Llamamos al método "agregarevento" del controlador y le pasamos los datos enviados por el formulario
    $controller->actualizarEventos(
        $_POST['id_evento'],
        $_POST['nombre_evento'],          
        $_POST['fecha'],        
        $_POST['lugar']
    );
    
    // Redirigimos al usuario a la página "lista_eventos.php" después de agregar el evento
    header("Location: lista_eventos.php");
    exit(); // Detenemos la ejecución del script para asegurarnos de que no se ejecute más código después de la redirección
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
</head>
<body>
    <h1>Editar  Evento</h1>
    <!-- formulario para coger los datos del evento nuevo -->
    <form method="POST" action="">

        <!-- Campo para el nombre del evento -->
        <label for="id_evento">ID:</label>
        <input type="text" id="id_evento" name="id_evento" required><br>

        <!-- Campo para el nombre del evento -->
        <label for="nombre_evento">Nombre:</label>
        <input type="text" id="nombre_evento" name="nombre_evento" required><br>

        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        
        <label for="lugar">Lugar:</label>
        <input type="text" id="lugar" name="lugar" required><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Editar Evento">
    </form>
    <br>
    <!-- Enlace para volver al listado de eventos -->
    <a href="lista_eventos.php">Volver al listado</a>
</body>
</html>