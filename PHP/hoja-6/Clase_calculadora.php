<?php
/*
Clase "Calculadora":
Crea una clase "Calculadora" con métodos sumar(), restar(), multiplicar() y dividir().
Agrega validaciones para evitar la división por cero.
Crea una instancia de la clase y realiza varias operaciones matemáticas.

*/

class calculadora{
    private $numero1;
    private $numero2;
    public function getNumero1(){
        return $this->numero1;
    }
    public function setNumero2($numero2_ext){
        return $this->numero2 = $numero2_ext;
    }
    public function getNumero2(){
        return $this->numero2;
    }
    public function setNumero1($numero1_ext){
        return $this->numero1 = $numero1_ext;
    }
    public function sumar(){
        echo $this->numero1 + $this->numero2 . "\n";
    }
    public function restar(){
        echo $this->numero1 - $this->numero2 . "\n";
    }
    public function multiplicar(){
        echo $this->numero1 * $this->numero2 .  "\n";
    }
    public function dividir(){
        if  ($this->numero1 or $this->numero2 !== 0){
            echo $this->numero1 / $this->numero2;
        }
        else 
            echo "No se puede dividir entre 0";
    }

}

$calculadora = new calculadora();
$calculadora ->setNumero1(readline("Dime el primer número: "));
$calculadora ->setNumero2(readline("Dime el segundo número: "));
$calculadora ->sumar();
$calculadora ->restar();
$calculadora ->multiplicar();
$calculadora ->dividir();
