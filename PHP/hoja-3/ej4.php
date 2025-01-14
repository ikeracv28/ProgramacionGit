<?php

/**
 * Ejercicio 4: Tabla de Multiplicar con Validación
Escribe una función llamada tablaMultiplicar que reciba un número y:
Imprima la tabla de multiplicar del 1 al 10.
Si el número no es entero o es negativo, lanza un error.
Maneja los errores con try-catch.
Ejemplo de uso:
tablaMultiplicar(5); // Resultado: 5 x 1 = 5 ... 5 x 10 = 50
tablaMultiplicar(-2); // Resultado: Error: El número debe ser un entero positivo.
 */
function tablaMultiplicar($numero) {
    try {
        // Validar que el número sea un entero positivo
        if (!is_int($numero) || $numero <= 0) {
            throw new Exception("Error: El número debe ser un entero positivo.");
        }

        // Generar la tabla de multiplicar del 1 al 10
        echo "Tabla de multiplicar del $numero:\n";
        for ($i = 1; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . "\n";
        }
    } catch (Exception $e) {
        // Capturar el error y mostrar el mensaje
        echo $e->getMessage() . "\n";
    }
}

// Ejemplo de uso
tablaMultiplicar(5);   // Resultado: Tabla del 5
echo "\n";
tablaMultiplicar(-2);  // Resultado: Error
echo "\n";
tablaMultiplicar(2.5); // Resultado: Error