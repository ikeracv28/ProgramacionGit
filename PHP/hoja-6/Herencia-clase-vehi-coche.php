<?php

/*
Herencia - Clase "Vehículo" y "Coche":
Crea una clase "Vehículo" con la propiedad marca y un método encender().
Crea una clase hija "Coche" que herede de "Vehículo" y agregue la propiedad modelo.
Instancia un objeto "Coche" y prueba ambos métodos y propiedades.
*/
class vehiculo{
    private $marca;

    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca_ext){
        $this->marca = $marca_ext;
    }
    public function encender(){
        echo "El vehículo está encendido.";
    }
}

class coche extends vehiculo{
    private $modelo;

    public function getmodelo(){
        return $this->modelo;
    }
    public function setmodelo($modelo_ext){
        $this->modelo = $modelo_ext;
    }
    public function encender2(){
        echo "El coche de marca " . $this->getMarca(). " y modelo ". $this->modelo. " suena brum brum";
    }
    
}

$vehiculo = new vehiculo();

$coche = new coche();
$coche -> setMarca('Mercedes');
$coche -> setmodelo('Clase A');
$coche -> encender2();
