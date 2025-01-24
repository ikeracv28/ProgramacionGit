<?php 
require_once '../controlador/SociosController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new SociosController();
    $controller->eliminarSocio(
        $_POST['id']
    );
    header("Location: lista_socios.php");
    exit();
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
    <form method="POST" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>
        <input type="submit" value="Eliminar socio">
    </form>
    <br>
    <a href="lista_socios.php">Volver al listado</a>
</body>
</html>