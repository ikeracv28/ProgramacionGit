<?php

// Incluimos el archivo del controlador que contiene las funciones necesarias para gestionar los usuarios y tareas
require_once '../controlador/UsuariosController.php';

// Iniciamos la sesión para manejar la autenticación y las variables de sesión
session_start();

// Verificamos si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, destruimos la sesión y redirigimos al inicio de sesión
    session_destroy();
    header("Location: inicio_sesion.php");
    exit();
}

// Creamos una instancia del controlador
$controller = new UsuariosController();

// Obtenemos el ID del usuario desde la sesión
$idusuario = $_SESSION["usuario"]["id_usuario"];

// Obtenemos los datos del usuario mediante su ID
$usuario = $controller->obtenerUsuarioporid($idusuario);

// Verificamos si el usuario existe, si no, mostramos un mensaje y detenemos la ejecución
if (!$idusuario) {
    echo "Usuario no encontrado.";
    exit();
}

// Comprobamos si se ha enviado el formulario para eliminar una tarea
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_tarea'])) {
    // Obtenemos el ID de la tarea a eliminar
    $id_tarea = $_POST['eliminar_tarea'];
    // Llamamos al controlador para eliminar la tarea
    $controller->eliminarTarea($id_tarea);
}

// Comprobamos si se ha enviado el formulario para marcar una tarea como completada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['completar_tarea'])) {
    // Obtenemos el ID de la tarea a completar
    $id_tarea = $_POST['completar_tarea'];
    // Llamamos al controlador para marcar la tarea como completada
    $controller->completarTarea($id_tarea);
    // Redirigimos para refrescar la página y mostrar la tarea actualizada
    header("Location: mis_tareas.php");
    exit();
}

// Obtenemos las tareas del usuario actual
$tablatareas = $controller->obtenerTareas($usuario["id_usuario"]);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <!-- Enlace a Bootstrap para estilizar la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <!-- Título de la página -->
        <h2 class="text-center text-success mb-4">Mis Tareas</h2>

        <!-- Mensaje de éxito si lo hay -->
        <?php if (isset($mensaje) && $mensaje): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $mensaje ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Tabla de tareas -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Tarea</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tablatareas as $tareas): ?>
                                <tr>
                                    <!-- Mostramos el ID, la descripción y el estado de la tarea -->
                                    <td><?= htmlspecialchars($tareas['id_tarea']) ?></td>
                                    <td><?= htmlspecialchars($tareas['descripcion']) ?></td>
                                    <td><?= htmlspecialchars($tareas['estado']) ?></td>
                                    <td>
                                        <!-- Si la tarea no está completada, mostramos la opción para marcarla como completada -->
                                        <?php if ($tareas['estado'] !== 'completado') : ?>
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="completar_tarea" value="<?= $tareas['id_tarea'] ?>">
                                                <button type="submit" class="btn btn-warning btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que quieres marcar esta tarea como completada?');">
                                                    Marcar como completado
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                        <!-- Botón para eliminar la tarea -->
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="eliminar_tarea" value="<?= $tareas['id_tarea'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que quieres eliminar esta tarea?');">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botones para agregar una nueva tarea o volver al índice -->
        <div class="d-flex justify-content-center mt-4">
            <a href="añadir_tarea.php" class="btn btn-success mx-2">
                Agregar una nueva tarea
            </a>
            <a href="../index_usuario.php" class="btn btn-warning mx-2">
                Volver
            </a>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

