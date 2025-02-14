<?php
require_once '../controlador/UsuariosController.php';  // incluimos el archivo del controlador



// verificamos si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();  // creamos una instancia del controlador de usuarios
    // llamamos al método agregarUsuario pasando los datos del formulario
    $controller->agregarUsuario(
        $_POST['nombre'],  // nombre del usuario
        $_POST['apellido'],  // apellido del usuario
        $_POST['correo'],  // correo electrónico del usuario
        $_POST['contraseña']  // contraseña del usuario
    );
    header("Location: ../index.php");  // redirigimos a la página de añadir plan después de agregar el usuario
    exit();  // terminamos la ejecución del script
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4">Registrar Usuario</h2>

            <!-- Mensaje de éxito (si lo hay) -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
            <?php endif; ?>

            <!-- Mensaje de error (si lo hay) -->
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <!-- Formulario de registro -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="confirmar_contraseña" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="confirmar_contraseña" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="inicio_sesion.php" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

