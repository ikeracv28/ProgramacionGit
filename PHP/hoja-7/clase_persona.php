<?php

/*
1. Clase "Persona":
Crea una clase Persona con las propiedades nombre, edad y género.
Agrega un método presentar() que imprima una presentación con los datos de la persona.
Crea una instancia de Persona y prueba el método presentar().
*/
class persona {
    private $nombre;
    private $edad;
    private $genero;

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre_ext){
        $this->nombre = $nombre_ext;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function setEdad($edad_ext){
        $this->edad = $edad_ext;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function setGenero($genero_ext){
        $this->genero = $genero_ext;
    }
    public function presentar(){
        echo "Hola soy " . $this->nombre . " tengo " . $this->edad . " años y soy " . $this->genero;
    }
}

$persona = new persona();
$persona -> setNombre("Iker");
$persona -> setEdad(21);
$persona -> setGenero("Hombre");
$persona -> presentar();
