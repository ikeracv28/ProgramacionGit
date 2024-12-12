<?php

/**
 * Ejercicio 3: Número Primo
Objetivo: Determinar si un número ingresado por el usuario es primo.
Pasos:
Pedir al usuario que ingrese un número.
Utilizar un bucle for para verificar si el número es divisible por algún número entre 2 y la mitad del número ingresado.
Si el número solo es divisible por 1 y por sí mismo, es primo.

 */

$numero = readline("Ingrese un numero: ");
function numeroprimo($numero){
    // primero, verificamos si el número es menor o igual a 1, ya que los números menores a 2 no pueden ser primos.
    if ($numero <= 1){
        echo "El numero $numero no es primo.\n";
        return;  // Salimos de la función, ya que no es necesario continuar.
    }
    // empezamos un bucle desde 2 hasta la mitad del número (no es necesario chequear más allá de la mitad)
    for ($i = 2; $i <= $numero / 2; $i++){
        // si encontramos un número que divida al número sin dejar resto (es decir, que el resultado de la división sea exacto)
        if ($numero % $i == 0){
             // si el número es divisible por $i, entonces no es primo
            echo "El numero $numero  no es primo";
            return;
        }
        
    } 
    // si el número no fue divisible por ningún número entre 2 y su mitad, entonces es primo
    echo "El numero $numero es primo.\n";
}  
// llamamos a la funcion
numeroprimo($numero);

/**
 * Otra manera de hacerlo
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

*/