<?php
// Incluir la clase de conexión a la base de datos
require_once '../config/class_conexion.php';

// Definir la clase Socio
class Socio {
    // Propiedad para mantener la conexión a la base de datos
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
    }

    // Método para agregar un nuevo socio a la base de datos
    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        // Consulta SQL para insertar un nuevo socio
        $query = "INSERT INTO socios (nombre, apellido, email, telefono, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)";
        // Preparar la declaración SQL
        $sentencia = $this->conexion->conexion->prepare($query);
        // Vincular parámetros a la consulta SQL
        $sentencia->bind_param("sssss", $nombre, $apellido, $email, $telefono, $fecha_nacimiento);

        // Ejecutar la consulta y verificar el éxito
        if ($sentencia->execute()) {
            echo "Socio agregado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al agregar socio: " . $sentencia->error; // Mensaje de error
        }

        // Cerrar la declaración
        $sentencia->close();
    }

    // Método para obtener todos los socios de la base de datos
    public function obtenerSocios() {
        $query = "SELECT * FROM socios"; // Consulta SQL para seleccionar todos los socios
        $resultado = $this->conexion->conexion->query($query); // Ejecutar la consulta
        $socios = []; // Array para mantener los socios

        // Obtener cada fila y agregarla al array
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        return $socios; // Devolver el array de socios
    }

    // Método para obtener un socio por su ID
    public function obtenerSocioPorId($id_socio) {
        $query = "SELECT * FROM socios WHERE id_socio = ?"; // Consulta SQL para seleccionar un socio por ID
        $sentencia = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $sentencia->bind_param("i", $id_socio); // Vincular el parámetro ID
        $sentencia->execute(); // Ejecutar la consulta
        $resultado = $sentencia->get_result(); // Obtener el conjunto de resultados
        return $resultado->fetch_assoc(); // Devolver los datos del socio
    }

    // Método para actualizar la información de un socio
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $query = "UPDATE socios SET nombre = ?, apellido = ?, email = ?, telefono = ?, fecha_nacimiento = ? WHERE id_socio = ?"; // Consulta SQL para actualizar un socio
        $sentencia = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $sentencia->bind_param("sssssi", $nombre, $apellido, $email, $telefono, $fecha_nacimiento, $id_socio); // Vincular parámetros

        // Ejecutar la consulta y verificar el éxito
        if ($sentencia->execute()) {
            echo "Socio actualizado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al actualizar socio: " . $sentencia->error; // Mensaje de error
        }

        // Cerrar la declaración
        $sentencia->close();
    }

    // Método para eliminar un socio de la base de datos
    public function eliminarSocio($id_socio) {
        $query = "DELETE FROM socios WHERE id_socio = ?"; // Consulta SQL para eliminar un socio
        $stmt = $this->conexion->conexion->prepare($query); // Preparar la declaración SQL
        $stmt->bind_param("i", $id_socio); // Vincular el parámetro ID

        // Ejecutar la consulta y verificar el éxito
        if ($stmt->execute()) {
            echo "Socio eliminado con éxito."; // Mensaje de éxito
        } else {
            echo "Error al eliminar socio: " . $stmt->error; // Mensaje de error
        }

        // Cerrar la declaración
        $stmt->close();
    }
}
?>
