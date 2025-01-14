<?php
/**
 * Ejercicio 5: Conversión de Temperaturas
Crea una función llamada convertirTemperatura que reciba dos parámetros: un valor numérico y la unidad de conversión ("C" para convertir a Celsius o "F" para convertir a Fahrenheit).
La función debe realizar la conversión:
Fahrenheit a Celsius: (valor - 32) * 5/9
Celsius a Fahrenheit: (valor * 9/5) + 32
Si la unidad no es "C" ni "F", lanza un error personalizado.
Registra los errores en un archivo errores.log.
Ejemplo de uso:
echo convertirTemperatura(100, "C"); // Resultado: 37.78
echo convertirTemperatura(0, "F"); // Resultado: 32
echo convertirTemperatura(25, "X"); // Resultado: Error registrado en errores.log

 */

 function convertirTemperatura($valor, $unidad) {
    try {
        // Validar si la unidad es "C" o "F"
        if ($unidad !== "C" && $unidad !== "F") {
            throw new Exception("Error: Unidad de conversión no válida. Usa 'C' o 'F'.");
        }

        // Realizar la conversión
        if ($unidad === "C") {
            // Convertir de Fahrenheit a Celsius
            $resultado = ($valor - 32) * 5 / 9;
            return round($resultado, 2) . " °C"; // Redondear a 2 decimales
        } elseif ($unidad === "F") {
            // Convertir de Celsius a Fahrenheit
            $resultado = ($valor * 9 / 5) + 32;
            return round($resultado, 2) . " °F"; // Redondear a 2 decimales
        }
    } catch (Exception $e) {
        // Registrar el error en un archivo de log
        $logFile = "errores.log";
        file_put_contents($logFile, $e->getMessage() . "\n", FILE_APPEND);
        // Mostrar el mensaje de error
        return $e->getMessage();
    }
}

// Ejemplo de uso
echo convertirTemperatura(100, "C") . "\n"; // Resultado: 37.78 °C
echo convertirTemperatura(0, "F") . "\n";   // Resultado: 32 °F
echo convertirTemperatura(25, "X") . "\n";  // Resultado: Error registrado en errores.log