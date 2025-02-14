<?php
require_once '../controlador/UsuariosController.php';  // se incluye el archivo del controlador de usuarios
$controller = new UsuariosController();  // se crea una instancia del controlador de usuarios
session_start();  // iniciamos la sesión

// verificamos si el usuario está logueado como admin
if (!isset($_SESSION['admin'])) {
    header("Location: inicio_sesion_admin.php");  // si no está logueado, redirigimos a la página de inicio de sesión
    exit();  // terminamos la ejecución del script
}

// si existe un parámetro 'id' en la URL
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];  // asignamos el valor del parámetro 'id' a la variable $id_usuario
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);  // obtenemos los datos del usuario con el ID proporcionado
}

// si existe un parámetro 'usuario' en la URL
if (isset($_GET['usuario'])) {
    $id_usuario = intval($_GET['usuario']);  // convertimos el parámetro 'usuario' a entero para evitar inyecciones
    $usuario = $controller->obtenerUsuarioPorId($id_usuario);  // obtenemos los datos del usuario con el ID proporcionado
}

// si se envió un formulario mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idplan = $_POST['id_plan'];  // obtenemos el ID del plan seleccionado por el usuario

    // intentamos añadir el plan al usuario
    $resultado = $controller->añadirPlanUSuario($usuario["id_usuario"], $idplan);
    if ($resultado === true) {
        // si el resultado es verdadero, redirigimos a la página de añadir paquete
        header("Location: añadir_paquete.php?usuario=" . urlencode($usuario["id_usuario"]));
        exit();  // terminamos la ejecución del script
    } else {
        echo "Error al añadir el plan al usuario.";  // si ocurrió un error, mostramos un mensaje
    }
}

// obtenemos los planes disponibles
$plan = $controller->seleccionarPlan();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Planes Disponibles</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="id_plan" id="id_plan_input"> 

                            <table class="table table-striped table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Nombre Plan</th>
                                        <th>Dispositivos</th>
                                        <th>Precio</th>
                                        <th>Duración Suscripción</th>
                                        <th class="text-center">Elección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($plan as $plan): ?>
                                        <tr>
                                            <td><?= $plan['nombre_plan'] ?></td>
                                            <td><?= $plan['dispositivos'] ?></td>
                                            <td><?= $plan['precio'] ?></td>
                                            <td><?= $plan['duracion_suscripcion'] ?></td>
                                            <td class="text-center">
                                                <input type="checkbox" class="form-check-input seleccion" onclick="seleccionarUnico(this)" value="<?= $plan['id_plan'] ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-50 mt-3">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>
