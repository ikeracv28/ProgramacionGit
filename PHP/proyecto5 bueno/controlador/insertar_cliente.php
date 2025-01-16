<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Crear la línea con los datos del cliente
    $linea = "$id,$nombre,$correo,$telefono\n";

    // Agregar la línea al archivo CSV
    file_put_contents("../datos/clientes.csv", $linea, FILE_APPEND);

    // Redirigir después de agregar el cliente
    header("Location: ../index.php?opcion=clientes");
    exit();
}
?>

