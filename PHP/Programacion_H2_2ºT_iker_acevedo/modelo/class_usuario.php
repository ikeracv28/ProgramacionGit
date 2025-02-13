<?php
require_once '../config/class_conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }



    public function agregarUsuario($nombre, $apellido, $correo, $contraseña){
        $contraseñaSegura = password_hash($contraseña, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)"; // consulta para insertar usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("ssss", $nombre, $apellido, $correo, $contraseñaSegura); // enlaza los parámetros con la consulta

       // Ejecuta la consulta y maneja posibles errores
       if ($sentencia->execute()) {
        return true;
    } else {
        error_log("Error al agregar Usuarios: " . $sentencia->error);
        return false;
        $sentencia->close(); // cierra la sentencia
    }
    }

    public function iniciarSesion($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $usuario = $resultado->fetch_assoc();

        // Verifica la contraseña
        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            // Inicia la sesión
            session_start(); // Asegúrate de llamar a session_start al inicio del script

            // Guarda los datos del usuario en la sesión
            $_SESSION['id_usuario'] = $usuario['usuario'];
            $sentencia->close();

            return $usuario; // Inicio de sesión exitoso
        } else {
            return false; // Contraseña o correo incorrectos
        }
    }

    public function obtenerUsuarioPorId($id_usuario)
    {
        // preparamos la consulta para obtener un usuario por su id
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);  // 'i' porque id_usuario es un entero
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }

    public function editarUsuario($id_usuario, $nombre, $apellido, $correo)
    {
        // preparamos la consulta para actualizar los datos de un usuario
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("sssi", $nombre, $apellido, $correo,  $id_usuario);  // 'ssssi' porque son 4 strings y un entero
    
        // si la consulta se ejecuta correctamente, mostramos un mensaje de éxito
        if ($sentencia->execute()) {
            echo "usuario actualizado con éxito.";
        } else {
            // si hay un error, mostramos el error que da la consulta
            echo "error al actualizar usuario: " . $sentencia->error;
        }
    
        $sentencia->close();  // cerramos la sentencia
    }

    public function agregarTareas($id_usuario, $descripcion){
        $query = "INSERT INTO tarea (id_usuario, descripcion) VALUES (?, ?)"; // consulta para insertar tarea
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("is", $id_usuario, $descripcion); // enlaza los parámetros con la consulta

       // Ejecuta la consulta y maneja posibles errores
       if ($sentencia->execute()) {
        return true;
    } else {
        error_log("Error al agregar Usuarios: " . $sentencia->error);
        return false;
        $sentencia->close(); // cierra la sentencia
    }
    }



    public function obtenerTareas($id_usuario){
        // preparamos la consulta para obtener las asociadas al usuario
        $query = "SELECT * FROM tarea WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);  // 'i' porque id_tarea es un entero
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $tareas = $resultado->fetch_all(MYSQLI_ASSOC);
        $sentencia->close();
        return $tareas;

    }

    public function añadirTarea($id_usuario, $descripcion){
        $query = "INSERT INTO tarea (id_usuario, descripcion) VALUES (?, ?)"; // consulta para insertar tarea
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("is", $id_usuario, $descripcion); // enlaza los parámetros con la consulta

       // Ejecuta la consulta y maneja posibles errores
       if ($sentencia->execute()) {
        return true;
    } else {
        error_log("Error al agregar la tarea: " . $sentencia->error);
        return false;
        $sentencia->close(); // cierra la sentencia
    }



}



    










}