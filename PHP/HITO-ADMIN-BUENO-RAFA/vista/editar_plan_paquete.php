<?php
require_once '../controlador/UsuariosController.php';
$controller = new UsuariosController();
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

$plan = $controller-> obtenerPaquetes();



if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);


    if (!$usuario) {
        echo "El usuario no existe.";
        exit();
    }
} else {
    echo "No se recibió ningún usuario.";
    exit();
}


//$usuarioid = $controller->obtenerUsuarioPorId($id_usuario);
$error = '';
$tablaUsuario = $controller->obtenerUsuarioCompletoIndividual($usuario["id_usuario"]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id_usuario = intval($_POST['id']); // Convertir a número entero
        $controller->eliminarPlan($id_usuario);
        header("Location: añadir_plan.php");
        exit();
    } else {
        echo "Error: ID de usuario no válido.";
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
<body>    
<table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
            <h2>Paquetes del usuario</h2>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Edad</th>
                    <th>Paquetes Activo</th>
                    <th>Plan Activo</th>
                    <th>Dispositivos Disponibles</th>
                    <th>Cuota Cuenta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tablaUsuario as $tablaUsuario): ?>
                    <tr>
                        <td><?= $tablaUsuario['id_usuario'] ?></td>
                        <td><?= $tablaUsuario['nombre'] ?></td>
                        <td><?= $tablaUsuario['apellido'] ?></td>
                        <td><?= $tablaUsuario['correo_electronico'] ?></td>
                        <td><?= $tablaUsuario['edad'] ?></td>
                        <td><?= $tablaUsuario['Plan_Obtenido'] ?></td>
                        <td><?= $tablaUsuario['Paquetes_Obtenidos'] ?></td>
                        <td><?= $tablaUsuario['dispositivos'] ?></td>
                        <td><?= $tablaUsuario['Precio_Total'] ?></td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($usuario['id_usuario']); ?>" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Plan y Paquete</button>
        </form>
        
</html>