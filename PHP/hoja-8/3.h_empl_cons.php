<?php
/*
3. Herencia - Clase "Empleado" y "Consultor":
Crea una clase Empleado con las propiedades nombre, sueldo y aniosExperiencia.
Agrega los métodos:
calcularBonus(): Devuelve un bonus del 5% del sueldo por cada 2 años de experiencia.
mostrarDetalles(): Imprime los detalles del empleado.
Crea una clase hija Consultor que agregue la propiedad horasPorProyecto y sobrescriba el método calcularBonus() para sumar un bonus adicional si trabaja más de 100 horas por proyecto.
Instancia un Empleado y un Consultor y compara sus bonificaciones.
*/
class empleado{
    private $nombre;
    private $sueldo;
    private $añosExperiencia;
    public function __construct($nombre_ext, $sueldo_ext, $añosExperiencia_ext){
        $this->nombre = $nombre_ext;
        $this->sueldo = $sueldo_ext;
        $this->añosExperiencia = $añosExperiencia_ext;
    }
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
    public function setAños($añosExperiencia_ext){
        return $this->añosExperiencia = $añosExperiencia_ext;
    }
    public function getAños(){
        return $this->añosExperiencia;
    }
    public function mostrarDetalles(){
        echo "El nombre del empleado es " . $this->nombre . ", su sueldo es de " . $this->sueldo . "€ y tiene " . $this->añosExperiencia . " años de experiencia. \n";
    }
    public function calcularBonus(){
        echo "El bonus que tiene es de " . $this->sueldo * 0.05 * ($this->añosExperiencia/2) . "€\n";
    }
    
}
class consultor extends empleado{
    private $horasPorProyecto;
    public function getHoras(){
        return $this->horasPorProyecto;
    }
    public function setHoras($horasPorProyecto_ext){
        return $this->horasPorProyecto = $horasPorProyecto_ext;
    }

    public function calcularBonus(){
        if($this->horasPorProyecto >=100){
            echo "El bonus que tiene es de " . $this->getSueldo() * 0.15 * ($this->getAños() /2) . "\n";
        }
        else
            echo "El bonus que tiene es de " . $this->getSueldo() * 0.05 * ($this->getAños()/2) . "\n";
        }

    }

$empleado = new empleado("Rafa", 3000, 4);
$empleado ->mostrarDetalles();
$empleado ->calcularBonus();

$consultor = new consultor("Iker", 6500, 8);
$consultor ->mostrarDetalles();
$consultor ->calcularBonus();
