<?php
/*
1. Clase "Banco":
Crea una clase CuentaBancaria con las propiedades titular, saldo y tipoDeCuenta.
Agrega los métodos:
depositar($cantidad): Incrementa el saldo en la cantidad especificada.
retirar($cantidad): Reduce el saldo si la cantidad es menor o igual al saldo disponible.
mostrarInfo(): Muestra los datos del titular, el tipo de cuenta y el saldo actual.
Crea una instancia de CuentaBancaria, realiza varias operaciones y muestra la información final.
*/

class cuentaBancaria{
    private $titular;
    private $saldo;
    private $tipoDeCuenta;
    public function __construct($titular_ext, $saldo_ext, $tipoDeCuenta_ext){
        $this->titular = $titular_ext;
        $this->saldo = $saldo_ext;
        $this->tipoDeCuenta = $tipoDeCuenta_ext;
    }
    public function depositar($cantidad){
        echo "Tu saldo actual es de: " . $this->saldo . "€\n";
        $this->saldo += $cantidad;
        echo "TU nuevo saldo es de: " . $this->saldo . "€\n";
    }
    public function retirar($cantidad){
        echo "Tu saldo actual es de: " . $this->saldo . "€\n";
        if($cantidad <= $this->saldo){
            $this->saldo -= $cantidad;
            echo "TU nuevo saldo es de: " . $this->saldo . "€\n";
        }
        else
            echo "No puedes retirar mas dinero del que dispones";
        }
    public function mostrarInfo(){
        echo "El nombre del titular es " . $this->titular . ", el tipo de cuenta es de " . $this->tipoDeCuenta . " y el saldo disponible es de: " . $this->saldo . "€" ;
    }
}
$cuentaBancaria = new cuentaBancaria("Iker", 15000, "Debito");
$cuentaBancaria ->depositar(5000);
$cuentaBancaria ->retirar(7000);
$cuentaBancaria ->mostrarInfo();