<?php
require_once '../controlador/UsuariosController.php';  // se incluye el archivo del controlador de usuarios
session_start();  // iniciamos la sesión

$controller = new UsuariosController();  // se crea una instancia del controlador de usuarios
$error_message = null;  // inicializamos la variable para el mensaje de error

// verificamos si el formulario ha sido enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // obtenemos los datos del formulario de inicio de sesión
    $correo = $_POST['correo'];  
    $contraseña = $_POST['contraseña'];  

    // intentamos iniciar sesión con los datos proporcionados
    $administrador = $controller->iniciarSesion($correo, $contraseña);  
    // si no se encuentra el administrador, mostramos un mensaje de error
    if (!$administrador) {
        $error_message = "Datos equivocados, prueba de nuevo.";  // asignamos el mensaje de error
    } else {
        // si la autenticación es exitosa, almacenamos los datos del administrador en la sesión
        $_SESSION['admin'] = $administrador;  
        header("Location: ../index_admin_opciones.php");  // redirigimos al panel de opciones del administrador
        exit();  // terminamos la ejecución del script
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Estilos adicionales -->
    <style>
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 450px;
            margin-top: 100px;
        }

        h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
        }

        .form-control {
            font-size: 1rem;
            padding: 15px;
            border-radius: 8px;
        }

        .btn {
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #0069d9;
            transform: scale(1.05);
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container .mb-3 label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <!-- Mensaje de éxito (si lo hay) -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
            <?php endif; ?>

            <!-- Mensaje de error (si lo hay) -->
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <!-- Formulario de inicio de sesión -->
            <form action="inicio_sesion_admin.php" method="POST">
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
        </div>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
