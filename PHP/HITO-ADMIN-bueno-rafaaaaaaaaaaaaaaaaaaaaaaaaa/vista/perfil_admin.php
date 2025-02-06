<?php
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

$controller = new UsuariosController();
$usuarios = $controller->obtenerUsuarioCompleto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Perfil Administrador</h1>
        <h2>Este es el listado de usuarios con paquetes y con plan contratado</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña</th>
                    <th>Edad</th>
                    <th>Paquetes Activo</th>
                    <th>Plan Activo</th>
                    <th>Dispositivos Disponibles</th>
                    <th>Cuota Cuenta</th>
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
                        <td><?= $usuarios['contraseña'] ?></td>
                        <td><?= $usuarios['edad'] ?></td>
                        <td><?= $usuarios['Plan_Obtenido'] ?></td>
                        <td><?= $usuarios['Paquetes_Obtenidos'] ?></td>
                        <td><?= $usuarios['dispositivos'] ?></td>
                        <td><?= $usuarios['Precio_Total'] ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuarios['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_usuario.php?id=<?= $usuarios['id_usuario'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
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