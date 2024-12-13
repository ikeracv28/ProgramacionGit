<?php
/** 
Ejercicio 5: Simulador de Dado
Enunciado: Crea un programa que simule el lanzamiento de un dado de seis caras.
Objetivo: Practicar la generación de números aleatorios y la simulación de eventos aleatorios.
Pasos:
Utilizar la función rand() para generar un número aleatorio entre 1 y 6.
Imprimir el número obtenido, simulando el resultado del lanzamiento del dado.
*/
//Creamos la funcion del juego
function dado(){
    //Generamos un número aleatorio entre 1 y 6
$juego_dado = rand(1,6);
//Imprimimos el resultado del juego
echo "El dado ha caído en el número $juego_dado";
}
//Llamamos a la funcion del juego
dado();
