<?php
require_once '../config/class_conexion.php';

class Paquete
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }


public function agregarUsuarioPaquete()
    {
        $query = "SELECT * from paquete ";
        $resultado = $this->conexion->conexion->query($query);
        $plan = [];
        while ($fila = $resultado->fetch_assoc()) {
            $plan[] = $fila;
        }
        return $plan;
    }

}