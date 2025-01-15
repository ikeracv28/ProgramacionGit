<?php
/**
 * Crea un script que registre un mensaje de error en un archivo de log cuando falle una operación de lectura de un archivo.
 */


function leerArchivo($nombreArchivo) {
    try {
        $contenido = file_get_contents($nombreArchivo);
        if ($contenido === false) {
            throw new Exception("No se pudo leer el archivo.");
        }
        echo "Contenido del archivo:\n$contenido";
    } catch (Exception $e) {
        file_put_contents('error_log.txt', "Error: " . $e->getMessage() . " en '$nombreArchivo' en " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        echo "Se ha registrado un error al intentar leer el archivo.\n";
    }
}

leerArchivo('archivo.txt'); // Cambia esto por el nombre del archivo que deseas leer