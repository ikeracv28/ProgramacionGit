<?php
/**
 Declara una constante para el valor del IVA y úsala para calcular el precio total de un producto.
 */

const IVA = 0.21;

$precio_sin_IVA = 20;

$dinero_a_sumar = $precio_sin_IVA * IVA;

echo $precio_sin_IVA + $dinero_a_sumar;



