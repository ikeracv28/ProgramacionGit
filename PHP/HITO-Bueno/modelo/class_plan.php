<?php
require_once '../config/class_conexion.php';

class Plan
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }


public function agregarUsuarioPlan()
    {
        $query = "SELECT * from plan ";
        $resultado = $this->conexion->conexion->query($query);
        $plan = [];
        while ($fila = $resultado->fetch_assoc()) {
            $plan[] = $fila;
        }
        return $plan;
    }

    public function agregarPlanUsuario(/*$id_usuario,*/ $id_plan)
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



}

