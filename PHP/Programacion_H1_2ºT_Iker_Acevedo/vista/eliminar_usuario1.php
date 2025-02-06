<?php
// Incluimos el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

// Variable para mostrar mensaje de éxito
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new UsuariosController();

    // Llamamos al método "eliminarSocio" del controlador, pasándole el ID del socio que queremos eliminar
    $controller->eliminarUsuario($_POST['id']);

    // Mensaje de éxito
    $mensaje = "Usuario eliminado con éxito.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Eliminar Usuario</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= htmlspecialchars($mensaje) ?>
            </div>
            <div class="text-center">
                <a href="lista_usuarios.php">
                    <button class="btn btn-primary">Volver atrás</button>
                </a>
            </div>
        <?php else: ?>
            <!-- Formulario para eliminar un usuario -->
            <div class="card shadow-lg p-4">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Eliminar usuario</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="text-center">
                <a href="lista_usuarios.php" class="btn btn-secondary">Volver al listado</a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
