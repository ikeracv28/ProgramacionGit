<?php

require_once '../controlador/UsuariosController.php';

// Inicia sesión y verifica si el usuario está logueado
session_start();
if (!isset($_SESSION['usuario'])) {
    session_destroy(); // Si no está logueado, destruye la sesión y redirige
    header("Location: inicio_sesion.php");
    exit();
}

$controller = new UsuariosController(); // Crea una instancia del controlador de usuarios
$idusuario = $_SESSION["usuario"]["id_usuario"]; // Obtiene el id del usuario desde la sesión
$usuario = $controller->obtenerUsuarioporid($idusuario); // Obtiene los datos del usuario de la base de datos
if (!$idusuario) { // Si no se encuentra el usuario, muestra mensaje de error
    echo "Usuario no encontrado.";
    exit();
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $descripcion = $_POST['descripcion']; // Toma la descripción de la tarea del formulario

    // Intenta agregar la tarea usando el método del controlador
    $resultado = $controller->añadirTarea($usuario['id_usuario'], $descripcion);
    if (!$resultado) { // Si no se pudo agregar la tarea, muestra mensaje de error
        $error_message = "No se ha podido agregar la tarea.";
    } else {
        $success_message = "Tarea añadida con éxito"; // Si la tarea se agrega correctamente, muestra mensaje de éxito
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h3 class="mb-0"><i class="bi bi-pencil-square"></i> Agregar Nueva Tarea</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error_message)): ?>
                            <!-- Muestra alerta de error si no se pudo agregar la tarea -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <?= htmlspecialchars($error_message) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif (!empty($success_message)): ?>
                            <!-- Muestra alerta de éxito si la tarea fue añadida correctamente -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill"></i>
                                <?= htmlspecialchars($success_message) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label"><i class="bi bi-card-text"></i> Descripción de la tarea:</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="bi bi-plus-circle"></i> Agregar Tarea
                                </button>

                                <a href="mis_tareas.php" class="btn btn-warning btn-lg shadow-sm">
                                    <i class="bi bi-arrow-left"></i> Volver
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>

</html>
