<?php
require_once '../controlador/UsuariosController.php';
$controller = new UsuariosController();
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

$plan = $controller->obtenerPaquetes();

if (isset($_GET['usuario'])) {
    $id_usuario = intval($_GET['usuario']); // Convierte a número para evitar inyecciones
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);

    if (!$usuario) {
        echo "El usuario no existe.";
        exit();
    }
} else {
    echo "No se recibió ningún usuario.";
    exit();
}
$planid = $controller->obtenerPlanPorId($usuario["id_usuario"]);


//$usuarioid = $controller->obtenerUsuarioPorId($id_usuario);
$error = '';
$tablaUsuario = $controller->obtenerUsuarioCompletoIndividual($usuario["id_usuario"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paquete1 = filter_var($_POST['id_paquete1'] ?? null, FILTER_VALIDATE_INT, ["options" => ["default" => null]]);
    $paquete2 = filter_var($_POST['id_paquete2'] ?? null, FILTER_VALIDATE_INT, ["options" => ["default" => null]]);
    $paquete3 = filter_var($_POST['id_paquete3'] ?? null, FILTER_VALIDATE_INT, ["options" => ["default" => null]]);
    $resultado = $controller->insertarPaquete($usuario["id_usuario"], $planid["id_plan"], $paquete1, $paquete2, $paquete3);

    if ($resultado !== true) {
        $error = $resultado; // Guarda el error si la inserción falla
    } else {
        $succes = $resultado; // Mensaje de éxit
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
    <h2>Paquetes Disponibles</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Paquete</th>
                <th>Nombre Paquete</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plan as $plan): ?>
                <tr>
                    <td><?= $plan['id_paquete'] ?></td>
                    <td><?= $plan['nombre_paquete'] ?></td>
                    <td><?= $plan['precio'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

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
        <h2>Selecciona un Paquete</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"> <?= htmlspecialchars($error) ?> </div>
        <?php elseif (!empty($succes)): ?>
            <div class="alert alert-success"> <?= htmlspecialchars($succes) ?> </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">
            <div class="mb-3">
                <label for="id_paquete1" class="form-label">Paquete 1</label>
                <input type="number" class="form-control" id="id_paquete1" name="id_paquete1" required>
            </div>
            <div class="mb-3">
                <label for="id_paquete2" class="form-label">Paquete 2</label>
                <input type="number" class="form-control" id="id_paquete2" name="id_paquete2">
            </div>
            <div class="mb-3">
                <label for="id_paquete3" class="form-label">Paquete 3</label>
                <input type="number" class="form-control" id="id_paquete3" name="id_paquete3">
            </div>
            <button type="submit" class="btn btn-primary">Contratar</button>
            <a href="../index_admin_opciones.php" class="btn btn-danger mt-3">Volver</a>
        </form>
</body>

</html>