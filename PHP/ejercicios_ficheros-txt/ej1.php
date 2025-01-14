<?php
/**
 * Contar las líneas de un archivo: Escribe un programa en PHP que lea un archivo de texto y cuente cuántas líneas tiene.

 */

$archivo = fopen("usuario.txt", "r"); // Abrir el archivo en modo lectura

if ($archivo){
    $contador = 0; // Inicializamos el contador en 0
    while(($linea = fgets($archivo)) !==false) {
        $contador += 1; // Incrementamos el contador en cada línea
    }
    fclose($archivo); // Cerramos el archivo después de terminar
    echo "El archivo tiene $contador lineas.";  // Mostramos el resultado
} else {
    echo "No se pudo abrir el archivo.";    // En caso de error al abrir el archivo
}
