<?php
require_once '../modelo/class_usuario.php';
session_start();

// Verificar que llegan los datos esperados
if (!isset($_GET['correo']) || !isset($_GET['edad'])) {
    header("Location: alta_usuario.php?error=falta_datos");
    exit();
}

$correo = $_GET['correo'];
$edad = (int)$_GET['edad']; // Convertimos edad a entero
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Plan</title>
</head>
<body>
    <h2>Selecciona tu plan y paquete</h2>

    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="guardar_plan.php" method="POST">
        <input type="hidden" name="correo" value="<?= htmlspecialchars($correo) ?>">
        <input type="hidden" name="edad" value="<?= $edad ?>">

        <label for="suscripcion">Duración de la suscripción:</label>
        <select name="suscripcion" required>
            <option value="mensual">Mensual</option>
            <option value="anual">Anual</option>
        </select>

        <label for="paquete">Paquete:</label>
        <select name="paquete" required>
            <option value="basico">Básico</option>
            <option value="premium">Premium</option>
            <option value="infantil" <?= ($edad < 18) ? 'selected' : '' ?>>Infantil</option>
            <option value="deportes">Deportes</option>
        </select>

        <button type="submit">Confirmar Plan</button>
    </form>
</body>
</html>
