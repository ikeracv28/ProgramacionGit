<?php
require_once '../controlador/UsuariosController.php';
session_start();

$controller = new UsuariosController();
$error_message = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $administrador = $controller->iniciarSesion($correo, $contraseña);
    if (!$administrador) {
        $error_message = "Datos equivocados, prueba de nuevo.";
    } else {
        $_SESSION['administrador'] = $administrador;
        header("Location: ../index_admin_opciones.php"); // Corrección de redirección
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>

    <form action="inicio_sesion_admin.php" method="POST"> <!-- Corregido -->
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
