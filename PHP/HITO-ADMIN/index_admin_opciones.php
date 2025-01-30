

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
        <h1 class="text-center">Opciones Administrador</h1>
        
        <div class="list-group mt-4">
            <a href="../HITO-ADMIN/vista/alta_usuario.php" class="list-group-item list-group-item-action">Añadir Usuario</a>
            <a href="../HITO-ADMIN/vista/lista_usuarios.php" class="list-group-item list-group-item-action">Mostrar Lista de Usuarios Sin Registro Completo</a>
            <a href="../HITO-ADMIN/vista/perfil_admin.php" class="list-group-item list-group-item-action">Mostrar Lista de Usuarios Con Registro Completo</a>
            <a href="index.php" class="list-group-item list-group-item-action text-danger">Salir de la Sesión</a>
        </div>
    </div>
</body>
</html>
