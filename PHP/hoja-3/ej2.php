<?php
/**
 * Ejercicio 2: Validación de Email
Escribe una función llamada validarEmail que reciba una dirección de correo electrónico como parámetro y:
Devuelva "Válido" si la dirección es válida.
Devuelva un mensaje de error si no lo es.
Registra los errores en un archivo errores.log.
Ejemplo de uso:
echo validarEmail("correo@ejemplo.com"); // Resultado: Válido
echo validarEmail("correo_invalido"); // Resultado: Error registrado en errores.log

 */

function validarEmail($email) {
    // Validar el formato del correo electrónico usando filter_var
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido";
    } else {
        // Registrar el error en un archivo de log
        $mensajeError = "Correo inválido: $email\n";
        file_put_contents("errores.log", $mensajeError, FILE_APPEND); // Agrega el error al log
        return "Error: Correo no válido. Revisar errores.log.";
    }
}

// Ejemplo de uso
echo validarEmail("correo@ejemplo.com"); // Resultado: Válido
echo "\n";
echo validarEmail("correo_invalido"); // Resultado: Error registrado en errores.log
