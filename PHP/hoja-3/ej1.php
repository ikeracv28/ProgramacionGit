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

$numero1 = readline("Dime el primer numero para realizar la operacion: ");
$numero2 = readline("Dime el segundo numero para realizar la operacion: ");

function calculadora($numero1, $numero2, $operador) {
    $numero1 = float($numero1);
    $numero1 = float($numero2);
    switch($operador){
        case  "+":
            return $numero1 + $numero2;
        case  "-":
            return $numero1 - $numero2;
        case  "*":
            return $numero1 * $numero2;
        case  "/":
            if ($numero2 == 0){
                echo "Error, no se puede dividir entre 0";
            }
            else {
            return $numero1 / $numero2;
        }

    }












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