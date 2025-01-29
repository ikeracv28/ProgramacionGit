<?php
$error = isset($_GET['error']) ? $_GET['error'] : '';
$mensaje = isset($_GET['registro_exitoso']) ? 'Registro exitoso. Ahora puedes iniciar sesión.' : '';
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

    <?php if ($mensaje): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="inicioSesion.php" method="POST">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
