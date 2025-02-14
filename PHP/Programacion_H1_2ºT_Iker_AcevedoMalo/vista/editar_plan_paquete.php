<?php
require_once '../controlador/UsuariosController.php';  // se incluye el archivo del controlador de usuarios
$controller = new UsuariosController();  // se crea una instancia del controlador de usuarios
session_start();  // iniciamos la sesión

// verificamos si el usuario está logueado como admin
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");  // si no está logueado, redirigimos a la página de inicio de sesión
    exit();  // terminamos la ejecución del script
}

// obtenemos los paquetes disponibles para asignar al usuario
$plan = $controller->obtenerPaquetes();  

// si existe un parámetro 'id' en la URL
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];  // asignamos el valor del parámetro 'id' a la variable $id_usuario
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);  // obtenemos los datos del usuario con el ID proporcionado

    // si no se encuentra el usuario, mostramos un mensaje de error
    if (!$usuario) {
        echo "El usuario no existe.";
        exit();  // terminamos la ejecución del script
    }
} else {
    echo "No se recibió ningún usuario.";  // si no se recibe el ID del usuario, mostramos un mensaje de error
    exit();  // terminamos la ejecución del script
}

// obtenemos la información completa del usuario
$tablaUsuario = $controller->obtenerUsuarioCompletoIndividual($usuario["id_usuario"]);

$error = '';  // inicializamos la variable de error (no se usa en este fragmento, pero se declara por si se necesita más adelante)

// si el formulario se ha enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // verificamos si el parámetro 'id' está presente y es un número
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id_usuario = intval($_POST['id']);  // convertimos el ID del usuario a número entero
        $controller->eliminarPlan($id_usuario);  // eliminamos el plan asignado al usuario
        header("Location: añadir_plan.php?usuario=" . urlencode($usuario["id_usuario"]));  // redirigimos a la página de añadir plan con el ID del usuario
        exit();  // terminamos la ejecución del script
    } else {
        echo "Error: ID de usuario no válido.";  // si el ID del usuario no es válido, mostramos un mensaje de error
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h2 class="mb-0">Paquetes del Usuario</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo Electrónico</th>
                                <th>Edad</th>
                                <th>Plan Activo</th>
                                <th>Paquetes Activos</th>
                                <th>Dispositivos</th>
                                <th>Cuota Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($tablaUsuario as $usuario): ?>
                                <tr>
                                    <td><?= $usuario['id_usuario'] ?></td>
                                    <td><?= $usuario['nombre'] ?></td>
                                    <td><?= $usuario['apellido'] ?></td>
                                    <td><?= $usuario['correo_electronico'] ?></td>
                                    <td><?= $usuario['edad'] ?></td>
                                    <td><?= $usuario['Plan_Obtenido'] ?></td>
                                    <td><?= $usuario['Paquetes_Obtenidos'] ?></td>
                                    <td><?= $usuario['dispositivos'] ?></td>
                                    <td class="fw-bold"><?= $usuario['Precio_Total'] ?>€</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Formulario de eliminación -->
                <form method="POST" class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="id" class="form-label">ID del usuario:</label>
                            <input type="text" name="id" class="form-control form-control-lg" placeholder="Ingrese el ID" required>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="bi bi-trash"></i> Editar Plan y Paquete
                        </button>
                        <a href="../vista/perfil_admin.php" class="btn btn-secondary btn-lg">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
