<?php
// Incluimos el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

// Comprobamos si el formulario fue enviado mediante el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Creamos una instancia del controlador de socios
    $controller = new UsuariosController();

    // Llamamos al método "eliminarSocio" del controlador, pasándole el ID del socio que queremos eliminar
    $controller->eliminarUsuario(
        $_POST['id'] // Este ID viene del formulario, indica qué socio se va a eliminar
    );

    // Redirigimos al usuario a la página "index_admin_opciones.php" después de eliminar al socio
    header("Location: perfil_admin.php");
    exit(); // Finalizamos la ejecución del script para asegurarnos de que no se haga nada más después

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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-danger text-white text-center">
                        <h3 class="mb-0">Eliminar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID del Usuario:</label>
                                <input type="text" id="id" name="id" class="form-control form-control-lg" placeholder="Ingrese el ID" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="bi bi-trash"></i> Eliminar Usuario
                                </button>
                                <a href="perfil_admin.php" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-arrow-left"></i> Volver al Listado
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
