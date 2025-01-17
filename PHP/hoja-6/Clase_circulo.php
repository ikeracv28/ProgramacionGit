<?php
/*
Clase "Círculo":
Crea una clase "Círculo" con la propiedad radio.
Agrega un método calcularArea() que devuelva el área del círculo.
Crea un objeto de la clase y calcula el área de un círculo con radio 5.
*/

class circulo{
    private $radio;
    public function CalcularArea(){
        return 3.14*$this->radio* $this->radio;
    }

    public function getRadio(){
        return $this->radio;
    }
    public function setRadio($radio_ext){
        $this->radio = $radio_ext;
}
}
$este_circulo = new circulo();

$este_circulo-> setRadio(45);

echo $este_circulo->CalcularArea();