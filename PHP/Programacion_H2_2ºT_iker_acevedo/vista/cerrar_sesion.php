<?php
// Inicia la sesión
session_start();

// Destruye todos los datos de la sesión actual, cerrando la sesión
session_destroy();

// Redirige al usuario a la página principal (index.php)
header("Location: ../index.php");

// Termina el script para asegurarse de que no se ejecute más código después de la redirección
exit();
