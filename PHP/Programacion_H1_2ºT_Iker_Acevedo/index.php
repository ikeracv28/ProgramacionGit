<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Personalización adicional -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
        }
        .btn {
            font-size: 1.1rem;
            padding: 12px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
        .list-group-item {
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        .list-group-item a {
            font-size: 1.2rem;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
        }
        .list-group-item a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container text-center mt-5">
        <h1 class="mb-4">StreamWeb</h1>
        <div class="list-group">
            <div class="list-group-item">
                <a href="index_admin.php" class="btn btn-primary w-100">
                    <i class="bi bi-house-door"></i> Administrador
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
