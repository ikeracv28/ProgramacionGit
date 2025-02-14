<?php
require_once '../controlador/UsuariosController.php';  // incluimos el archivo del controlador

session_start();  // iniciamos la sesión

// verificamos si el usuario está logueado como admin
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");  // si no está logueado, lo redirigimos a la página de inicio de sesión
    exit();  // terminamos la ejecución del script
}

// verificamos si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();  // creamos una instancia del controlador de usuarios
    // llamamos al método agregarUsuario pasando los datos del formulario
    $controller->agregarUsuario(
        $_POST['nombre'],  // nombre del usuario
        $_POST['apellido'],  // apellido del usuario
        $_POST['correo_electronico'],  // correo electrónico del usuario
        $_POST['contraseña'],  // contraseña del usuario
        $_POST['edad']  // edad del usuario
    );
    header("Location: añadir_plan.php");  // redirigimos a la página de añadir plan después de agregar el usuario
    exit();  // terminamos la ejecución del script
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Agregar Nuevo Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="correo_electronico" class="form-label">Correo Electrónico:</label>
                                <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña:</label>
                                <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad:</label>
                                <input type="number" id="edad" name="edad" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Agregar Usuario
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>