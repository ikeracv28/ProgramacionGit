<?php
/**
 * Buscar una palabra en un archivo: Crea un script que busque una palabra específica en un archivo y muestre cuántas veces aparece.

 */

function buscarPalabra($archivo, $palabra) {
    $contador = 0; // Contador para las apariciones de la palabra

    // Abrir el archivo en modo lectura
    $archivo = fopen($archivo, "r");
    if ($archivo) {
        // Leer el archivo línea por línea
        while (($linea = fgets($archivo)) !== false) {
            // Contar cuántas veces aparece la palabra en la línea actual
            $contador += substr_count(strtolower($linea), strtolower($palabra));
        }
        fclose($archivo); // Cerrar el archivo
    } else {
        echo "No se pudo abrir el archivo.";
        return;
    }

    // Mostrar el resultado
    echo "La palabra '$palabra' aparece $contador veces en el archivo '$archivo'.";
}

// Ejemplo de uso
$archivo = "usuario.txt";
$palabra = "creado";
buscarPalabra($archivo, $palabra);