<?php
// se incluye la clase de conexión para interactuar con la base de datos
require_once '../config/class_conexion.php';

class Plan
{
    // propiedad para guardar la instancia de la conexión a la base de datos
    private $conexion;

    // constructor, se crea la conexión al instanciar la clase
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    //comentadoporque estoy haciendo pruebas
    /*public function agregarUsuarioPlan()
    {
        $query = "SELECT * from plan "; // consulta para obtener todos los planes
        $resultado = $this->conexion->conexion->query($query);
        $plan = []; // array donde se almacenarán los planes

        // recorremos los resultados y los añadimos al array
        while ($fila = $resultado->fetch_assoc()) {
            $plan[] = $fila;
        }

        // devolvemos todos los planes encontrados
        return $plan;
    }*/

    // método para agregar un plan a un usuario en la tabla "resumen"
    public function agregarPlanUsuario($id_usuario, $id_plan)
    {
        // consulta para insertar un nuevo registro en la tabla "resumen", asociando al usuario con un plan
        $query = "INSERT INTO resumen (id_usuario, id_plan) VALUES (?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ii", $id_usuario, $id_plan); // vinculamos los parámetros del usuario y el plan

        // ejecutamos la consulta y devolvemos un valor booleano según si fue exitosa o no
        if ($sentencia->execute()) {
            return true; // si la ejecución fue exitosa, devolvemos true
        } else {
            // si hay un error, devolvemos false y el mensaje de error
            return false . $sentencia->error;
        }

        $sentencia->close(); // cerramos la sentencia
    }
}
?>

