<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1 class="display-4 text-primary mb-4">Bienvenido a la Página de Inicio</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <h5 class="card-title mb-3">¿Qué te gustaría hacer?</h5>
                <div class="d-flex justify-content-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item">
                            <a href="vista/inicio_sesion.php" class="btn btn-primary w-100 py-3">Iniciar Sesión</a>
                        </li>
                        <li class="list-group-item">
                            <a href="vista/registrar_usuario.php" class="btn btn-success w-100 py-3">Registrarse</a>
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
