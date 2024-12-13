<?php
/**
 * Ejercicio 2: Ordenamiento de Array
Enunciado: Crea un programa que ordene un array de números de forma ascendente.
Objetivo: Practicar algoritmos de ordenamiento (por ejemplo, burbuja) y el manejo de arrays.
Pasos:
Crear un array de números aleatorios.
Utilizar un doble bucle para comparar cada elemento con los demás y realizar intercambios si están en el orden incorrecto (algoritmo de burbuja).
Imprimir el array ordenado.

 */

 // Crear un array de números aleatorios
$array = [];
$tamaño = 10; // Tamaño del array

// Llenamos el array con números aleatorios entre 1 y 100
for ($i = 0; $i < $tamaño; $i++) {
    $array[] = rand(1, 100);
}

// Imprimimos el array original
echo "Array original: \n";
print_r($array);

// Algoritmo de burbuja para ordenar el array
for ($i = 0; $i < count($array) - 1; $i++) {
    for ($j = 0; $j < count($array) - $i - 1; $j++) {
        if ($array[$j] > $array[$j + 1]) {
            // Intercambiamos los elementos si están en el orden incorrecto
            $temp = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $temp;
        }
    }
}

// Imprimimos el array ordenado
echo "\nArray ordenado (ascendente): \n";
print_r($array);

