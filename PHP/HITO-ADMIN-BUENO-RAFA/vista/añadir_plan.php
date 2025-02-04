<?php 
require_once '../controlador/UsuariosController.php';
$controller = new UsuariosController();
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idplan=$_POST['id_plan'] ;

    $resultado=$controller->añadirPlanUSuario($usuario["id_usuario"],$idplan);
    if ($resultado === true) {
        header("Location: añadir_paquete.php?usuario=" . urlencode($usuario["id_usuario"]));
        exit();
    } else {
        echo "Error al añadir el plan al usuario.";
    }
    
}

    $plan = $controller->seleccionarPlan();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Plan</title>
</head>
<body>
<div class="container mt-4">
        <h1>Planes Disponibles</h1>
        <form method="POST" action="">
    <input type="hidden" name="id_plan" id="id_plan_input"> <!-- Se llenará con JS -->
    
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre Plan</th>
                <th>Dispositivos</th>
                <th>Precio</th>
                <th>Duración Suscripción</th>
                <th>Elección</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plan as $plan): ?>
                <tr>
                    <td><?= $plan['nombre_plan'] ?></td>
                    <td><?= $plan['dispositivos'] ?></td>
                    <td><?= $plan['precio'] ?></td>
                    <td><?= $plan['duracion_suscripcion'] ?></td>
                    <td>
                        <input type="checkbox" class="seleccion" onclick="seleccionarUnico(this)" value="<?= $plan['id_plan'] ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" onclick="obtenerSeleccionados()">Enviar</button>
</form>           

<script>
    function seleccionarUnico(seleccionado) {
        document.querySelectorAll(".seleccion").forEach(checkbox => {
            if (checkbox !== seleccionado) {
                checkbox.checked = false;
            }
        });
        document.getElementById("id_plan_input").value = seleccionado.checked ? seleccionado.value : "";
    }
</script>

    </div>
</body>
</html>
