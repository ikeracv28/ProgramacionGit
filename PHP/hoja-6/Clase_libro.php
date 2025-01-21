<?php

/*
Ejercicios para practicar POO en PHP:
Clase "Libro":
Crea una clase "Libro" con las propiedades título, autor y número de páginas.
Agrega un método mostrarInfo() que imprima la información completa del libro.
Crea una instancia de "Libro" y prueba el método.

*/

class libro {
    private $titulo;
    private $autor;
    private $numero_paginas;
    
    public function getTitulo(){
        return $this->titulo;
    }
    public function getautor(){
        return $this->autor;
    }
    public function getnumero_paginas(){
        return $this->numero_paginas;
    }
    public function setTitulo($titulo_ext){
        $this->titulo = $titulo_ext;
    }
    public function setautor($autor_ext){
        $this->autor = $autor_ext;
    }
    public function setnumero_paginas($numero_paginas_ext){
        $this->numero_paginas = $numero_paginas_ext;
    }

    public function mostrarInfo(){
        echo "El titulo de este libro es ". $this->titulo . " y fue escrito por " . $this->autor . " y tiene " . $this->numero_paginas . " paginas";
    }
}


$libro_Lazarillo_de_Tormes = new libro();

$libro_Lazarillo_de_Tormes-> setTitulo("Lazarillo_de_Tormes");
$libro_Lazarillo_de_Tormes->setautor("Mateo Aleman");
$libro_Lazarillo_de_Tormes->setnumero_paginas(300);
$libro_Lazarillo_de_Tormes-> mostrarInfo();


