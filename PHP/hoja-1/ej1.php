<?php

/**
 * Ejercicio 1: Calculadora Básica
Objetivo: Crear un programa que realice operaciones aritméticas básicas (suma, resta, multiplicación, división) según la elección del usuario.
Pasos:
Pedir al usuario que ingrese dos números.
Pedir al usuario que seleccione la operación a realizar.
Utilizar estructuras condicionales (if, else) para realizar la operación correspondiente y mostrar el resultado.

 */
do{
    $eleccion = readline('Elige una de las siguiente opciones: 1-suma, 2-resta, 3-multiplicación, 4-division, 5-salir: ');
    if ($eleccion == 5){
        echo 'adios';
        break;
    }

    if (in_array($eleccion, [1,2,3,4])){
        $numero1 = readline('dime el primer número: ');
        $numero2 = readline('dime el segundo número: ');

        if ($eleccion == 1) {
            echo $numero1 + $numero2 . "\n";
        }
        else if ($eleccion == 2) {
            echo $numero1 - $numero2 . "\n";
        }
        else if ($eleccion == 3) {
            echo $numero1 * $numero2 . "\n";
        }
        else if ($eleccion == 4) {
            echo $numero1 / $numero2 . "\n";
        }
    } else {
        echo 'opcion incorrecta' . "\n";
    }
} while ($eleccion != 5);