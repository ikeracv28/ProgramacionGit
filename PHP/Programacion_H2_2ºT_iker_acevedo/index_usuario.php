<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f5;
        }
        .container {
            max-width: 600px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1 class="display-4 text-primary mb-4">Bienvenido, Usuario</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <h5 class="card-title mb-4">Selecciona una opción</h5>
                <div class="d-flex justify-content-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item">
                            <a href="vista/mis_tareas.php" class="btn btn-info w-100 py-3">Mis Tareas</a>
                        </li>
                        <li class="list-group-item">
                            <a href="vista/editar_usuario.php" class="btn btn-warning w-100 py-3">Editar Datos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="vista/cerrar_sesion.php" class="btn btn-danger w-100 py-3">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional para funcionalidad extra como dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
