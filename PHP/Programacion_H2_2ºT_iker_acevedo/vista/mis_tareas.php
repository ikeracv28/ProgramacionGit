<?php

require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: inicio_sesion.php");
    exit();
}

$controller = new UsuariosController();
$idusuario = $_SESSION["usuario"]["id_usuario"];
$usuario = $controller->obtenerUsuarioporid($idusuario);
if (!$idusuario) { // Verifico si el usuario existe
    echo "Usuario no encontrado.";
    exit();
}

$tablatareas = $controller->obtenerTareas($usuario["id_usuario"]);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<h2 class="text-center text-success mt-4">Mis Tareas</h2>
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
                    <td><?= htmlspecialchars($tareas['id_tarea']) ?></td>
                    <td><?= htmlspecialchars($tareas['descripcion']) ?></td>
                    <td><?= htmlspecialchars($tareas['estado']) ?></td>
                    <td>
                        <a href="editar_plan_paquete.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Marcar como completado
                        </a>
                        <a href="eliminar_tarea.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between mt-4">
    <a href="añadir_tarea.php" class="btn btn-success">
        Agregar un nueva tarea
    </a>
    <a href="../index_usuario.php" class="btn btn-warning mt-4 ">Volver</a>
</div>