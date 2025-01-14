<?php
/**
 * Ejercicio 1: Calculadora con Manejo de Errores
Crea una función llamada calculadora que reciba tres parámetros: dos números y un operador (+, -, *, /).
La función debe realizar la operación indicada.
Si el operador es / y el divisor es 0, debe generar un mensaje de error personalizado.
Usa try-catch para manejar el error.
Ejemplo de uso:
echo calculadora(10, 0, '/'); // Resultado: Error: No se puede dividir entre cero.
*/


// Leer los números y el operador desde el usuario
$numero1 = readline("Dime el primer número para realizar la operación: ");
$numero2 = readline("Dime el segundo número para realizar la operación: ");
$operador = readline("Dime el operador (+, -, *, /): ");

// Crear una función calculadora
function calculadora($numero1, $numero2, $operador) {
    // Convertir los valores a float
    $numero1 = floatval($numero1);
    $numero2 = floatval($numero2);

    try {
        // Verificar el operador y realizar la operación
        switch ($operador) {
            case "+":
                return $numero1 + $numero2; // Suma
            case "-":
                return $numero1 - $numero2; // Resta
            case "*":
                return $numero1 * $numero2; // Multiplicación
            case "/":
                if ($numero2 == 0) {
                    // Lanza una excepción si el divisor es 0
                    throw new Exception("Error: No se puede dividir entre cero.");
                }
                return $numero1 / $numero2; // División
            default:
                // Lanza una excepción si el operador no es válido
                throw new Exception("Error: Operador no válido. Usa +, -, *, o /.");
        }
    } catch (Exception $e) {
        // Manejar errores y devolver el mensaje de la excepción
        return $e->getMessage();
    }
}

// Llamar a la función y mostrar el resultado
$resultado = calculadora($numero1, $numero2, $operador);
echo "Resultado: $resultado\n";
/** 
    try {
        if($operador == "+"){
            echo $numero1 + $numero2;
        }
        elseif ($operador == "-"){
            echo $numero1 - $numero2;
        }
        elseif ($operador == "*"){
            echo $numero1 * $numero2;
        }
        elseif ($operador == "/"){
            echo $numero1 / $numero2;
            if ($numero2 == 0) {
                throw new Exception("No se puede dividir entre cero.");
            }
            return $numero1 / $numero2;
        try {
            echo dividir($numero1, $numero2);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        }
    }
}
*/