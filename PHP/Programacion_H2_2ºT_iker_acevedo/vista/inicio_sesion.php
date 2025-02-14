<?php

// Incluye el archivo del controlador, que contiene las funciones necesarias para gestionar los socios
require_once '../controlador/UsuariosController.php';

// Inicia la sesión para gestionar datos del usuario logueado
session_start();

$controller = new UsuariosController();
$error_message = null; // Variable para mensajes de error

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge el correo y la contraseña del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Intenta iniciar sesión con las credenciales proporcionadas
    $usuario = $controller->iniciarSesion($correo, $contraseña);
    
    // Si el usuario no se encuentra, muestra un mensaje de error
    if (!$usuario) {
        $error_message = "Datos equivocados, prueba de nuevo."; // Mensaje de error
    } else {
        // Si el usuario existe, se guarda en la sesión y se redirige al inicio del usuario
        $_SESSION['usuario'] = $usuario;
        header("Location: ../index_usuario.php"); // Redirige a la página principal del usuario
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Enlace a Bootstrap para el diseño de la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo claro para la página */
        }
        .container {
            max-width: 400px; /* Ancho máximo para el contenedor */
            margin-top: 100px; /* Espaciado desde la parte superior */
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil en la tarjeta */
        }
        .form-label {
            font-weight: 500; /* Ajuste en el peso de las etiquetas de formulario */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <!-- Muestra el mensaje de error si existe -->
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <!-- Formulario de inicio de sesión -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>

            <div class="text-center mt-3">
                <a href="registrar_usuario.php" class="text-decoration-none">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

