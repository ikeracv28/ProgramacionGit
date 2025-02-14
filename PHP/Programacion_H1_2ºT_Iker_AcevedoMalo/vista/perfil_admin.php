<?php
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container-fluid mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h1 class="mb-0">Perfil Administrador</h1>
                <p class="mb-0">Listado de usuarios con paquetes y planes contratados</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Edad</th>
                                <th>Plan Activo</th>
                                <th>Precio Plan</th>
                                <th>Paquetes Activos</th>
                                <th>Precio Paquetes</th>
                                <th>Dispositivos</th>
                                <th>Cuota Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= $usuario['id_usuario'] ?></td>
                                    <td><?= $usuario['nombre'] ?></td>
                                    <td><?= $usuario['apellido'] ?></td>
                                    <td><?= $usuario['correo_electronico'] ?></td>
                                    <td><?= $usuario['edad'] ?></td>
                                    <td><?= $usuario['Plan_Obtenido'] ?></td>
                                    <td><?= $usuario['Coste_plan'] ?>€</td>
                                    <td><?= $usuario['Paquetes_Obtenidos'] ?></td>
                                    <td><?= $usuario['Precio_desglose'] ?>€</td>
                                    <td><?= $usuario['dispositivos'] ?></td>
                                    <td class="fw-bold"><?= $usuario['Precio_Total'] ?>€</td>
                                    <td>
                                        <a href="editar_plan_paquete.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <a href="eliminar_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="alta_usuario.php" class="btn btn-success">
                        <i class="bi bi-person-plus"></i> Agregar un nuevo usuario
                    </a>
                    <a href="../index_admin_opciones.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
