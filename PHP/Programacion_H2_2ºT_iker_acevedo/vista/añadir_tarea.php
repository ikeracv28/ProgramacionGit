<?php

require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: inicio_sesion.php");
    exit();
}

$controller = new UsuariosController();
$idusuario = $_SESSION["usuario"]["id_usuario"];
$usuario = $controller->obtenerUsuarioporid($idusuario);
if (!$idusuario) { // Verifico si el usuario existe
    echo "Usuario no encontrado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $descripcion = $_POST['descripcion'];


    // Actualizar usuario en la base de datos
    $resultado = $controller->añadirTarea($usuario['id_usuario'], $descripcion);
    if (!$resultado) {
        $error_message = "No se ha podido agreagar la tarea.";
    } else {
        $error_message = "Tarea añadida con éxito";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-success">
                                <?= htmlspecialchars($error_message) ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion de la tarea:</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 ">
                                Agregar Tarea
                            </button>

                            <a href="mis_tareas.php" class="btn btn-warning mt-3 ">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>