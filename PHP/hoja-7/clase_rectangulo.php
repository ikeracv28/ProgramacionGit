<?php
/*
2. Clase "Rectángulo":
Crea una clase Rectángulo con las propiedades base y altura.
Agrega un método calcularArea() que devuelva el área del rectángulo.
Crea un objeto de la clase y calcula el área de un rectángulo con base = 10 y altura = 5.
*/

class rectangulo{
    private $base;
    private $altura;

    public function calcularArea(){
        return $this->base * $this->altura;
    }
}

$rectangulo = new rectangulo;
$rectangulo ->setBase(readline("Dime la base: "));
$rectangulo ->setAltura(readline("Dime la altura: "));
echo $rectangulo -> calcularArea();