<?php
/**
 * Crear un registro de eventos: Diseña un programa que agregue una nueva línea con la fecha y hora actual cada vez que se ejecute. Usa un archivo llamado log.txt para almacenar el historial.
 */

function fechaHora(){
        // Abrir el archivo "log.txt" en modo "a" (append), lo que permite agregar al final del archivo sin sobrescribir

    $archivo = fopen("log.txt", "a");

    // Comprobamos si se pudo abrir el archivo correctamente
    if ($archivo) {
        // Escribir la fecha y hora actual, seguido de un salto de línea
        fwrite($archivo, date('Y-m-d H:i:s'). "\n");
        // Cerrar el archivo después de escribir
        fclose($archivo);
        // Mensaje de éxito 
        echo "Texto escrito con éxito.";
    } else {
        // Si no se pudo abrir el archivo, mostramos un mensaje de error
        echo "Error al abrir el archivo.";
    }
    
}
// Llamar a la función para que ejecute la acción
fechaHora();