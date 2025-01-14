<?php
/**
 * Ejercicio 3: Buscar Elemento en un Array
Crea una función llamada buscarElemento que reciba dos parámetros: un array y un valor a buscar.
Si el valor está en el array, devuelve su posición.
Si no está, lanza un error personalizado indicando que no se encontró el elemento.
Usa un manejador personalizado de errores para mostrar el mensaje.
Ejemplo de uso:
$array = ["manzana", "naranja", "pera"];
echo buscarElemento($array, "pera"); // Resultado: 2
echo buscarElemento($array, "plátano"); // Resultado: Error: El elemento no se encuentra en el array.

 */

function buscarElemento($array, $valor) {
    try {
        // Buscar la posición del valor en el array
        $posicion = array_search($valor, $array);

        // Si array_search devuelve false, el valor no está en el array
        if ($posicion === false) {
            // Lanzar una excepción con un mensaje personalizado
            throw new Exception("Error: El elemento '$valor' no se encuentra en el array.");
        }

        // Retornar la posición si el valor fue encontrado
        return $posicion;
    } catch (Exception $e) {
        // Mostrar el mensaje de error capturado por la excepción
        return $e->getMessage();
    }
}

// Ejemplo de uso
$array = ["manzana", "naranja", "pera"];
echo buscarElemento($array, "pera"); // Resultado: 2
echo "\n";
echo buscarElemento($array, "plátano"); // Resultado: Error: El elemento 'plátano' no se encuentra en el array.
