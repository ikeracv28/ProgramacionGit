<?php
require_once '../config/class_conexion.php'; // Se incluye la clase de conexión a la base de datos

class Usuario
{
    private $conexion; // Declaración de la variable que mantendrá la conexión

    // Constructor de la clase que inicializa la conexión a la base de datos
    public function __construct()
    {
        $this->conexion = new Conexion(); // Establece la conexión a la base de datos
    }

    // Método para agregar un nuevo usuario
    public function agregarUsuario($nombre, $apellido, $correo, $contraseña)
    {
        $contraseñaSegura = password_hash($contraseña, PASSWORD_DEFAULT); // Se encripta la contraseña para mayor seguridad
        $query = "INSERT INTO usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)"; // Consulta SQL para insertar el nuevo usuario
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta para ejecución
        $sentencia->bind_param("ssss", $nombre, $apellido, $correo, $contraseñaSegura); // Enlaza los parámetros con la consulta

        // Ejecuta la consulta y maneja posibles errores
        if ($sentencia->execute()) {
            return true; // Si la inserción es exitosa, retorna true
        } else {
            error_log("Error al agregar Usuarios: " . $sentencia->error); // Si ocurre un error, lo registra
            return false; // Retorna false si hubo un error
        }
        $sentencia->close(); // Cierra la sentencia después de la ejecución
    }

    // Método para iniciar sesión de un usuario
    public function iniciarSesion($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo = ?"; // Consulta SQL para buscar el usuario por correo
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("s", $correo); // Enlaza el parámetro del correo
        $sentencia->execute(); // Ejecuta la consulta
        $resultado = $sentencia->get_result(); // Obtiene el resultado de la consulta
        $usuario = $resultado->fetch_assoc(); // Obtiene los datos del usuario

        // Verifica la contraseña
        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            // Inicia la sesión si la contraseña es correcta
            session_start(); // Inicia la sesión en PHP
            $_SESSION['id_usuario'] = $usuario['usuario']; // Guarda el ID del usuario en la sesión

            return $usuario; // Retorna los datos del usuario si la sesión fue exitosa
        } else {
            return false; // Si las credenciales no son correctas, retorna false
        }
    }

    // Método para obtener los datos de un usuario por su ID
    public function obtenerUsuarioPorId($id_usuario)
    {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?"; // Consulta para obtener un usuario por ID
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("i", $id_usuario);  // 'i' porque id_usuario es un entero
        $sentencia->execute(); // Ejecuta la consulta
        $resultado = $sentencia->get_result(); // Obtiene el resultado de la consulta
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario
    }

    // Método para editar los datos de un usuario
    public function editarUsuario($id_usuario, $nombre, $apellido, $correo)
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ? WHERE id_usuario = ?"; // Consulta SQL para actualizar datos
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("sssi", $nombre, $apellido, $correo,  $id_usuario);  // Enlaza los parámetros con la consulta

        // Ejecuta la consulta y maneja posibles errores
        if ($sentencia->execute()) {
            echo "usuario actualizado con éxito."; // Muestra mensaje si la actualización es exitosa
        } else {
            echo "error al actualizar usuario: " . $sentencia->error; // Si ocurre un error, muestra el mensaje de error
        }
        $sentencia->close(); // Cierra la sentencia después de la ejecución
    }

    // Método para agregar una tarea a un usuario
    public function agregarTareas($id_usuario, $descripcion)
    {
        $query = "INSERT INTO tarea (id_usuario, descripcion) VALUES (?, ?)"; // Consulta SQL para insertar tarea
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("is", $id_usuario, $descripcion); // Enlaza los parámetros con la consulta

        // Ejecuta la consulta y maneja posibles errores
        if ($sentencia->execute()) {
            return true; // Si la tarea se agrega correctamente, retorna true
        } else {
            error_log("Error al agregar Usuarios: " . $sentencia->error); // Si ocurre un error, lo registra
            return false; // Retorna false si hubo un error
        }
        $sentencia->close(); // Cierra la sentencia
    }

    // Método para obtener las tareas de un usuario
    public function obtenerTareas($id_usuario)
    {
        $query = "SELECT * FROM tarea WHERE id_usuario = ?"; // Consulta para obtener las tareas del usuario
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("i", $id_usuario);  // Enlaza el parámetro id_usuario
        $sentencia->execute(); // Ejecuta la consulta
        $resultado = $sentencia->get_result(); // Obtiene el resultado de la consulta
        $tareas = $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve todas las tareas en un arreglo asociativo
        $sentencia->close(); // Cierra la sentencia
        return $tareas; // Retorna las tareas obtenidas
    }

    // Método para añadir una nueva tarea
    public function añadirTarea($id_usuario, $descripcion)
    {
        $query = "INSERT INTO tarea (id_usuario, descripcion) VALUES (?, ?)"; // Consulta SQL para insertar tarea
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("is", $id_usuario, $descripcion); // Enlaza los parámetros con la consulta

        // Ejecuta la consulta y maneja posibles errores
        if ($sentencia->execute()) {
            return true; // Si la tarea se agrega correctamente, retorna true
        } else {
            error_log("Error al agregar la tarea: " . $sentencia->error); // Si ocurre un error, lo registra
            return false; // Retorna false si hubo un error
        }
        $sentencia->close(); // Cierra la sentencia
    }

    // Método para eliminar una tarea
    public function eliminarTarea($id_tarea)
    {
        $query = "DELETE FROM tarea WHERE id_tarea = ?"; // Consulta SQL para eliminar la tarea
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("i", $id_tarea); // Enlaza el parámetro id_tarea
        // Ejecuta la consulta y verifica el éxito
        if ($sentencia->execute()) {
            echo "Tarea eliminado con éxito."; // Muestra mensaje si la tarea se elimina correctamente
        } else {
            echo "Error al eliminar Tarea: " . $sentencia->error; // Muestra mensaje de error si falla la eliminación
        }
    }

    // Método para marcar una tarea como completada
    public function completarTarea($id_tarea)
    {
        $query = "UPDATE tarea SET estado = 'completado' WHERE id_tarea = ?"; // Consulta SQL para actualizar el estado de la tarea
        $sentencia = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $sentencia->bind_param("i", $id_tarea); // Enlaza el parámetro id_tarea
        $sentencia->execute(); // Ejecuta la consulta
        return true; // Retorna true si la tarea se marca como completada
    }
}
