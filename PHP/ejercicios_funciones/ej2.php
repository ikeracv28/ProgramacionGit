<?php
/**
 * Crea una función que reciba un nombre y devuelva un saludo personalizado.
 */

$saludo = function($nombre) {
    return "Hola, $nombre, es un gusto conocerte ";
};
echo $saludo("iker");
