<?php
/*
4. Herencia - Clase "Producto" y "Electrodoméstico":
Crea una clase Producto con propiedades nombre y precio.
Crea un método mostrarDetalles() que imprima los datos del producto.
Crea una clase hija Electrodoméstico que añada la propiedad consumo y sobrescriba el método mostrarDetalles().
Instancia un Producto y un Electrodoméstico y muestra sus detalles.
*/

class producto{
    private $nombre;
    private $precio;
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre_ext){
        return $this->nombre = $nombre_ext;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio_ext){
        return $this->precio = $precio_ext;
    }
    public function mostrarDetalles(){
        echo "El nombre del producto es " . $this->nombre . " y el precio es " . $this->precio;
    }
}
class electrodomestico extends producto{
    private $consumo;
    public function getConsumo(){
        return $this->consumo;
    }
    public function setConsumo($consumo_ext){
        return $this->consumo = $consumo_ext;
    }
    public function mostrarDetalles(){
        echo "El nombre del producto es " . $this->getNombre() . " el precio es " . $this->getPrecio() . " y su consumo es de " . $this->consumo;
    }
}

$producto = new producto;
$electrodomestico = new electrodomestico;
$electrodomestico -> setNombre("lavadora");
$electrodomestico -> setPrecio(300);
$electrodomestico -> setConsumo(40);
$electrodomestico -> mostrarDetalles();