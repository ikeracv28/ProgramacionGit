<?php

/**
 * Ejercicio 3: Número Primo
Objetivo: Determinar si un número ingresado por el usuario es primo.
Pasos:
Pedir al usuario que ingrese un número.
Utilizar un bucle for para verificar si el número es divisible por algún número entre 2 y la mitad del número ingresado.
Si el número solo es divisible por 1 y por sí mismo, es primo.

 */

$numero = (int)readline('Dime un numero para verificar si es primo: ');

$esPrimo = true;

// Verificar si el número es menor que 2, directamente no es primo
if ($numero < 2) {
    $esPrimo = false;
} else {
    // Bucle para verificar divisibilidad
    for ($i = 2; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false;
            break;
        }
    }
}

// Resultado
if ($esPrimo) {
    echo "El número $numero es primo.\n";
} else {
    echo "El número $numero no es primo.\n";
}
