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

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary">Paquetes Disponibles</h2>
        <div class="table-responsive">
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
                            <td><?= htmlspecialchars($plan['id_paquete']) ?></td>
                            <td><?= htmlspecialchars($plan['nombre_paquete']) ?></td>
                            <td><?= htmlspecialchars($plan['precio']) ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-center text-success mt-4">Paquetes del Usuario</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
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
                    <?php foreach ($tablaUsuario as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id_usuario']) ?></td>
                            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                            <td><?= htmlspecialchars($usuario['apellido']) ?></td>
                            <td><?= htmlspecialchars($usuario['correo_electronico']) ?></td>
                            <td><?= htmlspecialchars($usuario['edad']) ?></td>
                            <td><?= htmlspecialchars($usuario['Plan_Obtenido']) ?></td>
                            <td><?= htmlspecialchars($usuario['Paquetes_Obtenidos']) ?></td>
                            <td><?= htmlspecialchars($usuario['dispositivos']) ?></td>
                            <td><?= htmlspecialchars($usuario['Precio_Total']) ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-center text-warning mt-4">Selecciona un Paquete</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-info text-center"> <?= htmlspecialchars($error) ?> </div>
        <?php elseif (!empty($succes)): ?>
            <div class="alert alert-success text-center"> <?= htmlspecialchars($succes) ?> </div>
        <?php endif; ?>

        <form method="POST" class="mt-4">
            <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">
            <div class="row">
                <div class="col-md-4">
                    <label for="id_paquete1" class="form-label">Paquete 1</label>
                    <input type="number" class="form-control" id="id_paquete1" name="id_paquete1" required>
                </div>
                <div class="col-md-4">
                    <label for="id_paquete2" class="form-label">Paquete 2</label>
                    <input type="number" class="form-control" id="id_paquete2" name="id_paquete2">
                </div>
                <div class="col-md-4">
                    <label for="id_paquete3" class="form-label">Paquete 3</label>
                    <input type="number" class="form-control" id="id_paquete3" name="id_paquete3">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-50">Contratar</button>
                <a href="../index_admin_opciones.php" class="btn btn-danger mt-3 w-50">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
