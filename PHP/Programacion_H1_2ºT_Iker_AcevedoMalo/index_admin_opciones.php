<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <!-- Contenedor Principal con margen y flexbox -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 py-5">
        <div class="card shadow-lg p-4 w-100" style="max-width: 800px; width: 100%; height: auto;">
            <!-- Cabecera del Card -->
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Opciones del Administrador</h3>
            </div>

            <!-- Cuerpo del Card -->
            <div class="card-body">
                <div class="list-group">
                    <!-- Opción 1 -->
                    <a href="../HITO-ADMIN/vista/alta_usuario.php" class="list-group-item list-group-item-action list-group-item-success d-flex align-items-center p-3">
                        <i class="bi bi-person-plus-fill me-2"></i> Añadir Usuario
                    </a>

                    <!-- Opción 2 -->
                    <a href="../HITO-ADMIN/vista/perfil_admin.php" class="list-group-item list-group-item-action list-group-item-primary d-flex align-items-center p-3">
                        <i class="bi bi-people-fill me-2"></i> Lista de Usuarios con Plan y Paquete
                    </a>

                    <!-- Opción 3 -->
                    <a href="../HITO-ADMIN/vista/lista_usuarios.php" class="list-group-item list-group-item-action list-group-item-info d-flex align-items-center p-3">
                        <i class="bi bi-person-lines-fill me-2"></i> Lista de Usuarios sin Plan y Paquete
                    </a>

                    <!-- Opción 4 (Salir) -->
                    <a href="index.php" class="list-group-item list-group-item-action list-group-item-danger text-center fw-bold mt-3 p-3">
                        <i class="bi bi-box-arrow-right"></i> Salir de la Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



