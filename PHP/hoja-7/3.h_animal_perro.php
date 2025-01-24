<?php
/*
3. Herencia - Clase "Animal" y "Perro":
Crea una clase Animal con la propiedad especie y un método emitirSonido().
Crea una clase hija Perro que herede de Animal y agregue la propiedad raza.
Instancia un objeto Perro y prueba los métodos y propiedades
*/
class animal{
    private $especie;
    public function getEspecie(){
        return $this->especie;
    }
    public function setEspecie($especie_ext){
        return $this->especie = $especie_ext;
    }
    public function emitirSonido(){
        echo "El " . $this->especie . " emite un sonido";
    }
}
class perro extends animal{
    private $raza;


    public function emitirSonido(){
        echo "El " . $this->getEspecie() . " de la raza " . $this->raza . " hace guau guau";
    }
    public function getRaza(){
        return $this->raza;
    }
    public function setRaza($raza_ext){
        return $this->raza = $raza_ext;
    }
}

$perro = new perro;
$perro ->setRaza("labrador");
$perro ->setEspecie("perro");
$perro ->emitirSonido();


