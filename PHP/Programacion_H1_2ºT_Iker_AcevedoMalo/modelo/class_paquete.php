<?php
// se incluye la clase de conexión para interactuar con la base de datos
require_once '../config/class_conexion.php';

class Paquete
{
    // propiedad para guardar la instancia de la conexión a la base de datos
    private $conexion;

    // constructor, se crea la conexión al instanciar la clase
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    // método para agregar paquetes a un usuario (básicamente obtiene todos los paquetes disponibles)
    public function agregarUsuarioPaquete()
    {
        $query = "SELECT * from paquete "; // consulta para obtener todos los paquetes
        $resultado = $this->conexion->conexion->query($query);
        $plan = []; // se crea un array para almacenar los resultados

        // se recorren las filas obtenidas y se añaden al array
        while ($fila = $resultado->fetch_assoc()) {
            $plan[] = $fila;
        }

        // devolvemos los paquetes obtenidos
        return $plan;
    }

    // método para agregar un paquete a un usuario (aquí estamos insertando un nuevo registro en la tabla "resumen")
    public function añadirPaqueteUSuario($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        // consulta para insertar un nuevo registro en la tabla "resumen"
        $query = "INSERT INTO resumen (id_plan) VALUES (?)";
        //$query = "INSERT INTO resumen (id_usuario, id_plan) VALUES (?, ?)"; // opción para insertar usuario también, si es necesario
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_plan); // vinculamos el id del plan que recibimos al parámetro

        // ejecutamos la consulta y verificamos si fue exitosa
        if ($sentencia->execute()) {
            echo "plan seleccionado con éxito."; // mensaje de éxito
        } else {
            echo "error al seleccionar plan: " . $sentencia->error; // mensaje de error si no se ejecutó correctamente
        }

        $sentencia->close(); // cerramos la sentencia
    }

    // método para actualizar los paquetes de un usuario en la tabla "resumen"
    public function actualizarPaquetesUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        // consulta para actualizar los paquetes del usuario
        $query = "UPDATE resumen SET id_paquete1 = ?, id_paquete2 = ?, id_paquete3 = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("iiis", $id_paquete1, $id_paquete2, $id_paquete3, $id_usuario); // vinculamos los parámetros

        // ejecutamos la consulta y devolvemos un valor booleano según si fue exitosa o no
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>

