<?php

/**
 * Escribe una función recursiva que calcule la suma de los primeros n números naturales.
 */

function sumaRecursiva($n) {
    // Condición base: si n es 0, la suma es 0
    if ($n == 0) {
        return 0;
    }
    // Llamada recursiva: suma el número actual con el resultado de la función para n-1
    return $n + sumaRecursiva($n - 1);
}

// Ejemplo: Calcular la suma de los primeros 5 números naturales
$n = 5;
echo "La suma de los primeros $n números naturales es: " . sumaRecursiva($n);


// otra menera de hacerlo ///////////////////////

function suma($num){
    $contador = 0;
    for ($i = 1; $i <= $num; $i++){
        $contador += $i;
    }
    return $contador;
}
$num = readline("Hasta que numero quieres sumar: ");
$cifra = suma($num);
echo $cifra;