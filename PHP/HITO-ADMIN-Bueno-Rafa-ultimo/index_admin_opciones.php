<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones Administrador</title>
    <!-- Enlace a Bootstrap (solo CSS, sin JavaScript) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Opciones Administrador</h1>

        <!-- Lista de opciones -->
        <div class="list-group">
            <a href="../HITO-ADMIN/vista/alta_usuario.php" class="list-group-item list-group-item-action list-group-item-success">Añadir Usuario</a>
            <a href="../HITO-ADMIN/vista/perfil_admin.php" class="list-group-item list-group-item-action list-group-item-primary">Mostrar Lista de Usuarios con Plan y Paquete</a>
            <a href="../HITO-ADMIN/vista/lista_usuarios.php" class="list-group-item list-group-item-action list-group-item-info">Mostrar Lista de Usuarios sin Plan y Paquete</a>
            <a href="index.php" class="list-group-item list-group-item-action text-danger">Salir de la Sesión</a>
        </div>
    </div>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>