<?php

require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

$controller = new UsuariosController();
$usuario = null;
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $correo = $_POST['correo_electronico'];
    $edad = $_POST['edad'];

    // Actualizar usuario en la base de datos
    $controller->actualizarUsuario($usuario['id_usuario'], $nombre, $apellidos, $correo, $edad);

    // Obtener los datos actualizados
    $usuarioActualizado = $controller->obtenerUsuarioPorId($usuario['id_usuario']);

    // Actualizar los datos en la sesión
    $_SESSION['usuario'] = $usuarioActualizado;

    // Recargar la página automáticamente después de la actualización
    header("Location: perfil_admin.php?actualizado=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Editar Perfil</h1>

        <?php if (isset($_GET['actualizado'])): ?>
            <div class="alert alert-success">¡Perfil actualizado correctamente!</div>
        <?php endif; ?>

        <form method="POST" action="" class="mt-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="correo">Email:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="<?php echo $usuario['correo_electronico']; ?>" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo
                                                                                        $usuario['edad'];  ?>" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Perfil</button>
            <a href="../index_admin_opciones.php" class="btn btn-danger mt-3">Volver</a>

        </form>
    </div>
</body>

</html>