<?php
// Incluye el archivo controlador para interactuar con los usuarios
require_once '../controlador/UsuariosController.php';

// Inicia la sesión para acceder a los datos guardados en ella
session_start();

// Verifica si el usuario está logueado, si no, lo redirige al inicio de sesión
if (!isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: inicio_sesion.php");
    exit();
}

// Crea una instancia del controlador de usuarios
$controller = new UsuariosController();

// Obtiene el ID del usuario desde la sesión
$idusuario = $_SESSION["usuario"]["id_usuario"];

// Obtiene los datos del usuario usando su ID
$usuario = $controller->obtenerUsuarioporid($idusuario);

// Verifica si el usuario existe
if (!$idusuario) {
    echo "Usuario no encontrado.";
    exit();
}

// Si el formulario es enviado mediante POST, se procesa la actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $correo = $_POST['correo'];
    
    // Llama al controlador para actualizar los datos del usuario en la base de datos
    $controller->editarUsuario($usuario['id_usuario'], $nombre, $apellidos, $correo);

    // Obtiene los datos actualizados del usuario
    $usuarioActualizado = $controller->obtenerUsuarioPorId($usuario['id_usuario']);

    // Actualiza la sesión con los datos modificados
    $_SESSION['usuario'] = $usuarioActualizado;

    // Redirige a la misma página y muestra un mensaje de éxito
    header("Location: editar_usuario.php?actualizado=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 450px;">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Editar Perfil</h3>
            </div>

            <div class="card-body">
                <?php if (isset($_GET['actualizado'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>¡Éxito!</strong> Perfil actualizado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                <?php endif; ?>

                <!-- Formulario para editar el perfil -->
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                        <a href="../index_usuario.php" class="btn btn-danger">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
