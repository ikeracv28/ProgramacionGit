<?php
// Incluimos el archivo del controlador, que contiene las funciones para gestionar los datos de los eventos
require_once '../controlador/EventosController.php';

// Creamos una instancia del controlador para trabajar con los eventos
$controller = new EventosController();

// Obtenemos la lista de eventos desde la base de datos llamando al método correspondiente del controlador
$eventos = $controller->listarEventos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Eventos</title>

        <!-- Incluimos Bootstrap para estilizar la tabla y los botones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Eventos Registrados</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $eventos): ?>
                    <tr>
                        <td><?= $eventos['id_evento'] ?></td>
                        <td><?= $eventos['nombre_evento'] ?></td>
                        <td><?= $eventos['fecha'] ?></td>
                        <td><?= $eventos['lugar'] ?></td>
                        <td>
                            <a href="editar_evento.php?id=<?= $eventos['id_evento'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_evento.php?id=<?= $eventos['id_evento'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="alta_evento.php" class="btn btn-primary">Agregar un nuevo evento</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>