<?php
/**
Ejercicio 4: Generador de Nombres Aleatorios
Enunciado: Crea un programa que genere nombres aleatorios a partir de listas de nombres y apellidos.
Objetivo: Practicar el manejo de arrays y la generación de números aleatorios.
Pasos:
Crear dos arrays, uno con nombres y otro con apellidos.
Generar un número aleatorio para seleccionar un nombre y otro para seleccionar un apellido.
Concatenar el nombre y el apellido para formar un nombre completo aleatorio.
 */
//creamos las variables
$nombres = ["iker","rafa", "richi", "marcos", "alejandro"];
$apellidos = ["acevedo", "medina", "skater", "perez", "tovar"];

//generamos un número aleatorio para seleccionar un nombre
$nombre_aleatorio = rand(0, count($nombres) - 1); 

//generamos un número aleatorio para seleccionar un apellido
$apellido_aleatorio = rand(0, count($apellidos) - 1);

// concatenar el nombre y el apellido para formar un nombre completo aleatorio
$nombreCompleto = $nombres[$nombre_aleatorio] . " " . $apellidos[$apellido_aleatorio];
//imprimir el nombre completo aleatorio
echo $nombreCompleto;
