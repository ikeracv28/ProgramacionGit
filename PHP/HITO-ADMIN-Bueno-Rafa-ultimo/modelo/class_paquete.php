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


    public function añadirPaqueteUSuario($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        $query = "INSERT INTO resumen (id_plan) VALUES (?)";
        //$query = "INSERT INTO resumen (id_usuario, id_plan) VALUES (?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_plan);

        if ($sentencia->execute()) {
            echo "Plan seleccionado con éxito.";
        } else {
            echo "Error al seleccionar plan: " . $sentencia->error;
        }

        $sentencia->close();
    }
    public function actualizarPaquetesUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        $query = "UPDATE resumen SET id_paquete1 = ?, id_paquete2 = ?, id_paquete3 = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("iiis", $id_paquete1, $id_paquete2, $id_paquete3, $id_usuario);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
