<?php 
require_once '../controlador/UsuariosController.php';

session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['administrador'])) {
    header("Location: inicio_sesion_admin.php");
    exit(); 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuariosController();
    $controller->añadirPlanUSuario(
        $_POST['id_plan'] 
        //$_POST['id_usuario'],
        /*$_POST['nombre_plan'], 
        $_POST['dispositivos'],
        $_POST['precio'],
        $_POST['duracion_suscripcion']*/
    );
    header("Location: añadir_paquete.php");
    exit();
}

    $controller = new UsuariosController();
    $plan = $controller->seleccionarPlan();
    if (isset($_GET['id'])) {
        $id_usuario = $_GET['id'];
    }
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
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th hidden>ID</th>
                    <th hidden>idusu</th>
                    <th>Nombre Plan</th>
                    <th>Dispositivos</th>
                    <th>Precio</th>
                    <th>Duracion Subscripción</th>
                    <th>Elección</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($plan as $plan): ?>
                    <tr>
                        <td hidden id="id_plan" name="id_plan"><?= $plan['id_plan'] ?></td>
                        <td hidden id="id_usuario" name="id_usuario"><?= $id_usuario ?></td>
                        <td id="nombre_plan" name="nombre_plan"><?= $plan['nombre_plan'] ?></td>
                        <td id="dispositivos" name="dispositivos"><?= $plan['dispositivos'] ?></td>
                        <td id="precio" name="precio"><?= $plan['precio'] ?></td>
                        <td id="duracion_suscripcion" name="duracion_suscripcion"><?= $plan['duracion_suscripcion'] ?></td>
                        <td>
                            <input type="checkbox" class="seleccion" onclick="seleccionarUnico(this)" value="<?= htmlspecialchars($plan['id_plan']) ?>">
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
        }
        // Actualizar el campo oculto con el ID del plan seleccionado
    
    </script>
    </div>
</body>
</html>