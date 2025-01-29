<?php
require_once '../modelo/class_usuario.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?error=no_sesion");
    exit();
}

$usuario = $_SESSION['usuario'];
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plan</title>
</head>
<body>
    <h2>Editar Plan y Paquete</h2>

    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="procesar_cambio_plan.php" method="POST">
        <input type="hidden" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
        <input type="hidden" name="edad" value="<?= htmlspecialchars($usuario['edad']) ?>">

        <label for="suscripcion">Duración de la suscripción:</label>
        <select name="suscripcion" id="suscripcion" required>
            <option value="mensual" <?= ($usuario['suscripcion'] == "mensual") ? "selected" : "" ?>>Mensual</option>
            <option value="anual" <?= ($usuario['suscripcion'] == "anual") ? "selected" : "" ?>>Anual</option>
        </select>

        <label for="paquete">Paquete:</label>
        <select name="paquete" id="paquete" required>
            <option value="basico" <?= ($usuario['paquete'] == "basico") ? "selected" : "" ?>>Básico</option>
            <option value="premium" <?= ($usuario['paquete'] == "premium") ? "selected" : "" ?>>Premium</option>
            
            <?php if ($usuario['edad'] < 18): ?>
                <option value="infantil" <?= ($usuario['paquete'] == "infantil") ? "selected" : "" ?>>Infantil</option>
            <?php endif; ?>

            <?php if ($usuario['suscripcion'] == "anual"): ?>
                <option value="deportes" <?= ($usuario['paquete'] == "deportes") ? "selected" : "" ?>>Deportes</option>
            <?php endif; ?>
        </select>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

