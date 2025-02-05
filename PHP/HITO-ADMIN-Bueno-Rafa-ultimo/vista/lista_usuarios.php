<?php
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

$controller = new UsuariosController();
$usuarios = $controller->listarUsuariosSinPlan();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1>Usuarios Registrados Sin Plan Y Sin Paquete</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Edad</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuarios): ?>
                    <tr>
                        <td><?= $usuarios['id_usuario'] ?></td>
                        <td><?= $usuarios['nombre'] ?></td>
                        <td><?= $usuarios['apellido'] ?></td>
                        <td><?= $usuarios['correo_electronico'] ?></td>
                        <td><?= $usuarios['edad'] ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuarios['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_usuario1.php?id=<?= $usuarios['id_usuario'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            <a href="../vista/añadir_plan.php?id=<?= $usuarios['id_usuario'] ?>" class="btn btn-info btn-sm">Añadir Plan y Paquete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="alta_usuario.php" class="btn btn-primary">Agregar un nuevo usuario</a>
        <a href="../index_admin_opciones.php" class="btn btn-primary">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>