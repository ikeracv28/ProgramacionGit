<?php
// Incluir la clase de conexión a la base de datos
require_once '../config/class_conexion.php';

// Definir la clase eventos
class eventos {
    // Propiedad para mantener la conexión a la base de datos
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
    }

    // Método para agregar un nuevo evento a la base de datos
    public function agregarEvento($nombre_evento, $fecha, $lugar) {
        // Consulta SQL para insertar un nuevo evento
        $query = "INSERT INTO eventos (nombre_evento, fecha, lugar) VALUES (?, ?, ?)";
        // Preparar la declaración SQL
        $sentencia = $this->conexion->conexion->prepare($query);
        // Vincular parámetros a la consulta SQL
        $sentencia->bind_param("sss", $nombre_evento, $fecha, $lugar);

        // Ejecutar la consulta y verificar el éxito
        if ($sentencia->execute()) {
            echo "Evento agregado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al agregar evento: " . $sentencia->error; // Mensaje de error
        }

        // Cerrar la declaración
        $sentencia->close();
    }

    // Método para obtener todos los eventos de la base de datos
    public function obtenerEventos() {
        $query = "SELECT * FROM eventos"; // Consulta SQL para seleccionar todos los eventos
        $resultado = $this->conexion->conexion->query($query); // Ejecutar la consulta
        $eventos = []; // Array para mantener los eventos

        // Obtener cada fila y agregarla al array
        while ($fila = $resultado->fetch_assoc()) {
            $eventos[] = $fila;
        }
        return $eventos; // Devolver el array de eventos
    }

    // Método para obtener un evento por su ID
    public function obtenerEventoPorId($id_evento) {
        $query = "SELECT * FROM eventos WHERE id_evento = ?"; // Consulta SQL para seleccionar un evento por ID
        $sentencia = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $sentencia->bind_param("i", $id_evento); // Vincular el parámetro ID
        $sentencia->execute(); // Ejecutar la consulta
        $resultado = $sentencia->get_result(); // Obtener el conjunto de resultados
        return $resultado->fetch_assoc(); // Devolver los datos del evento
    }

    // Método para actualizar la información de un evento
    public function actualizarEventos($id_evento, $nombre_evento, $fecha, $lugar) {
        $query = "UPDATE eventos SET nombre_evento = ?, fecha = ?, lugar = ? WHERE id_evento = ?"; // Consulta SQL para actualizar un evento
        $sentencia = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $sentencia->bind_param("sssi", $nombre_evento, $fecha, $lugar, $id_evento); // Vincular parámetros

        // Ejecutar la consulta y verificar el éxito
        if ($sentencia->execute()) {
            echo "Evento actualizado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al actualizar Evento: " . $sentencia->error; // Mensaje de error
        }

        // Cerrar la declaración
        $sentencia->close();
    }

    // Método para eliminar un socio de la base de datos
    public function eliminarEvento($id_evento) {
        $query = "DELETE FROM eventos WHERE id_evento = ?"; // Consulta SQL para eliminar un socio
        $stmt = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $stmt->bind_param("i", $id_evento); // Vincular el parámetro ID

        // Ejecutar la consulta y verificar el éxito
        if ($stmt->execute()) {
            echo "Evento eliminado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al eliminar Evento: " . $stmt->error; // Mensaje de error
        }

        // Cerrar la declaración
        $stmt->close();
    }
}
?>
