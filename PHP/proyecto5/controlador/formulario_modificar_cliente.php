<?php
require_once 'funciones.php';

$archivo = "../datos/clientes.csv"; // Asegúrate de que la ruta sea correcta
$clientes = leerClientes($archivo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>
<body>
    <h1>Modificar Cliente</h1>
    <form action="editar_cliente.php" method="POST">
        <label for="id">ID del Cliente a Modificar:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Seleccionar</button>
    </form>
</body>
</html>