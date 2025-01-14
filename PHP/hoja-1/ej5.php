<?php
/**
 * Ejercicio 5: Pirámide de Números
Objetivo: Imprimir una pirámide de números utilizando bucles anidados.
Pasos:
Pedir al usuario que ingrese la altura de la pirámide.
Utilizar dos bucles anidados para imprimir los números en forma de pirámide.
 */

// le decimos al usuario que nos diga la altura de la piramide
$altura_piramide = readline('dime la altura de la piramide: ');

// Bucle de fuera: controla las filas de la pirámide
// El bucle inicia en 1 y se ejecuta hasta la altura ingresada por el usuario
for ($i=1; $i <= $altura_piramide; $i++) {

     // Bucle interno: imprime los números en cada fila
    // Este bucle recorre desde 1 hasta el número de la fila actual ($i)
    for ($x=1; $x <= $i; $x++){
        echo $x . " "; // Imprimimos el número actual seguido de un espacio
    }
    echo "\n"; 

}