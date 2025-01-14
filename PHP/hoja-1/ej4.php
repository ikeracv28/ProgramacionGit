<?php

/**
 * Ejercicio 4: Adivina el Número
Objetivo: Crear un juego en el que la computadora genera un número aleatorio y el usuario debe adivinarlo.
Pasos:
Generar un número aleatorio utilizando la función rand().
Pedir al usuario que ingrese un número.
Utilizar un bucle while para repetir el proceso hasta que el usuario adivine el número.
Indicar si el número ingresado es mayor, menor o igual al número secreto.

 */

<<<<<<< HEAD
$numero_aleatrotio = rand(1,50);

while(){

}
=======
// con esto generamos un numero random del 1 al 50
$numero_aleatorio = rand(1,50);
$numero_usuario =readline('Dime un numero: ');


// este bucle se repetira hasta que el usuario adivine el numero secreto
while($numero_usuario != $numero_aleatorio){
    if ($numero_usuario > $numero_aleatorio){
        echo "El número random es mas bajo, prueba otra vez" ."\n";
    }
    else if ($numero_usuario < $numero_aleatorio) {
        echo "El número random es mas alto, prueba otra vez" . "\n";
    }
    $numero_usuario = readline('Dime otro número: ');
}
echo "¡Lo has adivinado! El número secreto era " . $numero_aleatorio;
?>
>>>>>>> 9ca5b39704ed8c87db90f11afc913b5bd7c9b13b
