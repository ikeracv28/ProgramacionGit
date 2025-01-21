<?php
/*
Herencia - Clase "Empleado" y "Gerente":
Crea una clase "Empleado" con propiedades nombre y sueldo.
Crea un método mostrarDetalles() que imprima los datos del empleado.
Crea una clase hija "Gerente" que añada la propiedad departamento y sobrescriba el método mostrarDetalles() para incluir el departamento.
Instancia un "Gerente" y un "Empleado" y muestra sus detalles.
*/

class empleado{
    private $nombre;
    private $sueldo;

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre_ext){
        return $this->nombre = $nombre_ext;
    }
    public function getSueldo(){
        return $this->sueldo;
    }
    public function setSueldo($sueldo_ext){
        return $this->sueldo = $sueldo_ext;
    }
    public function mostrarDetalles(){
        echo "El nombre del empleado es ". $this->nombre. " y su sueldo es " .$this->sueldo;
    }
}

class gerente extends empleado{
    private $departamento;
    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepartamento($departamento_ext){
        return $this->departamento = $departamento_ext;
    }
    public function mostrarDetalles(){
        echo  "\n El nombre del gerente es ". $this->getNombre(). ", su sueldo es " .$this->getSueldo(). " y su departamento es ". $this->departamento;
    }
}

$empleado = new empleado();
$empleado->setNombre("rafa");
$empleado->setSueldo(4000);
$empleado->mostrarDetalles();

$gerente = new gerente();
$gerente->setNombre("iker");
$gerente->setSueldo(6000);
$gerente->setDepartamento("RRHH");
$gerente->mostrarDetalles();

