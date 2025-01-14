<?php
/**
 * Ejercicio 1: Contador de Palabras
Enunciado: Crea un programa que cuente el número de palabras en una cadena de texto ingresada por el usuario.
Objetivo: Practicar el manejo de cadenas y el uso de bucles para iterar sobre los caracteres.
Pasos:
Pedir al usuario que ingrese una frase.
Inicializar un contador de palabras en 0.
Recorrer cada carácter de la frase.
Si el carácter es un espacio, incrementar el contador de palabras.
Al finalizar, sumar 1 al contador de palabras (para contar la última palabra).
Imprimir el número total de palabras.
 */

//Aqui pedimos la frase
$frase = readline('Escribeme una frase: ');
//Aqui inicializamos el contador de palabras
$palabras = 0;
//Aqui recorremos cada carácter de la frase
for($i= 0; $i<strlen($frase); $i++){
    //Si el carácter es un espacio, incrementamos el contador de palabras
    if($frase[$i] == ' '){
        $palabras++;
        }
        }
        //Aqui sumamos 1 al contador de palabras para contar la última palabra
        $palabras++;
        echo "La frase tiene $palabras palabras.";
        