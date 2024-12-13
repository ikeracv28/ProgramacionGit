<?php
/**
 * Ejercicio 3: Validación de Contraseña
Enunciado: Crea un programa que valide si una contraseña cumple con ciertos criterios.
Objetivo: Practicar el uso de expresiones regulares y condicionales para validar datos de entrada.
Pasos:
Pedir al usuario que ingrese una contraseña.
Verificar si la contraseña tiene al menos 8 caracteres.
Verificar si la contraseña contiene al menos una letra mayúscula, una minúscula y un número.
Utilizar expresiones regulares para realizar estas verificaciones.
Si la contraseña cumple con todos los criterios, mostrar un mensaje de éxito.
 */

//Manera de hacerlo mas simple
do {
    $contraseña = readline("Introduce una contraseña: ");

    if (strlen($contraseña) < 8) {
        echo "ERROR: La contraseña debe tener al menos 8 caracteres.\n";
    } elseif (!preg_match("/[A-Z]/", $contraseña)) {
        echo "ERROR: La contraseña debe contener al menos una letra mayúscula.\n";
    } elseif (!preg_match("/[a-z]/", $contraseña)) {
        echo "ERROR: La contraseña debe contener al menos una letra minúscula.\n";
    } elseif (!preg_match("/[0-9]/", $contraseña)) {
        echo "ERROR: La contraseña debe contener al menos un número.\n";
    } else {
        echo "Contraseña válida.\n";
        break; // Sale del bucle cuando la contraseña es válida
    }
} while (true);



/** 
 * Otra manera de hacerlo
function validarContraseña($contraseña) {
    // Verificar si la contraseña tiene al menos 8 caracteres
    if (strlen($contraseña) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres.\n";
        return false;
    }
    
    // Verificar si la contraseña contiene al menos una letra mayúscula, una minúscula y un número
    $mayuscula = preg_match('/[A-Z]/', $contraseña);
    $minuscula = preg_match('/[a-z]/', $contraseña);
    $numero = preg_match('/[0-9]/', $contraseña);
    
    // Validar los criterios
    if ($mayuscula && $minuscula && $numero) {
        echo "La contraseña es válida.\n";
        return true; // Indica que la contraseña cumple los criterios
    } else {
        echo "La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un número.\n";
        return false;
    }
}

// Bucle para repetir hasta que la contraseña sea válida
do {
    // Pedir al usuario que ingrese una contraseña
    $contraseña = readline("Ingrese una contraseña: ");
} while (!validarContraseña($contraseña)); // Repite hasta que la contraseña sea válida

*/


