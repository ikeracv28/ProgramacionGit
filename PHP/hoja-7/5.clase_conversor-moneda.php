<?php
/*
5. Clase "ConversorMoneda":
Crea una clase ConversorMoneda con métodos convertirDolaresAEuros() y convertirEurosADolares().
Utiliza un factor de conversión fijo para ambas operaciones.
Crea una instancia de la clase y realiza varias conversiones.

*/

class conversorMoneda{
    private $dolares;
    private $euros;
    public function getDolares(){
        return $this->dolares;
    }
    public function setDolares($dolares_ext){
        return $this->dolares = $dolares_ext;
    }
    public function getEuros(){
        return $this->euros;
    }
    public function setEuros($euros_ext){
        return $this->euros = $euros_ext;
    }
    public function convertirDolaresAEuros(){
        echo "La conversion de " . $this->dolares . " dolares a euros es: " . $this->dolares / 0.97;
    }
    public function convertirEurosADolares(){
        echo "\n" ."La conversion de " . $this->euros . " euros a dolares es: " . $this->euros * 0.97;
    }

}

$conversorMoneda = new conversorMoneda();
$conversorMoneda -> setDolares(55);
$conversorMoneda -> setEuros(110);
$conversorMoneda -> convertirDolaresAEuros();
$conversorMoneda -> convertirEurosADolares();
