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
    public function getBase(){
        return $this->base;
    }
    public function setBase($base_ext){
        return $this->base = $base_ext;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function setAltura($altura_ext){
        return $this->altura = $altura_ext;
    }
    public function calcularArea(){
        echo "El area es: " . $this->base * $this->altura;
    }
}

$rectangulo = new rectangulo;
$rectangulo -> setBase(10);
$rectangulo -> setAltura(5);
$rectangulo -> calcularArea();
