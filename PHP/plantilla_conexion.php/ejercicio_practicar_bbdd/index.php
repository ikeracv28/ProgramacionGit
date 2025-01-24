<?php
require_once 'class_conexion.php';
require_once 'class_socios.php';

$conexion = new Conexion();

if ($conexion->conexion) {
    echo "Conexión exitosa al club deportivo.";
} else {
    echo "Error al conectar.";
}

$conexion->cerrar();

/* si queremos llamar a la clase socios desde el index tendremos que añadir estas dos lineas 
y arriba del todo otro require_once 'class_socios.php' para llamar a la clase_socio
*/

$socios = new Socios();
$socios->obtenerSocios();

?>
