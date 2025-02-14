<?php
require_once '../config/class_conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function agregarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $query = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contraseña, edad) VALUES (?, ?, ?, SHA2(?, 256), ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $contraseña, $edad);

        if ($sentencia->execute()) {
            echo "Usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function correoExistente($correo)
    {
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['total'] > 0; // Devuelve true si el correo ya está registrado
    }

    public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT * FROM usuarios WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario
    }

    public function verificarCredenciales($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo_electronico = ? AND contraseña = SHA2(?, 256)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ss", $correo, $contraseña);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario si las credenciales son válidas
    }

    public function actualizarPlanUsuario($correo, $id_plan)
    {
        $query = "UPDATE plan SET id_plan = ? WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("is", $id_plan, $correo);
        if ($sentencia->execute()) {
            return true; // Devuelve verdadero si la actualización fue exitosa
        } else {
            return false; // Devuelve falso si hubo un error
        }
    }

    public function obtenerPlanPorCorreo($correo)
    {
        $query = "SELECT p.* FROM plan p JOIN usuarios u ON p.id_plan = u.id_plan WHERE u.correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve el plan del usuario
    }

    public function obtenerPaquetePorId($id_paquete)
    {
        $query = "SELECT * FROM paquetes WHERE id_paquete = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_paquete);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve el paquete
    }

    public function obtenerUsuario()
    {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuarioCompleto()
    {
        $query = "SELECT 
    u.*, 
    pl.nombre_plan AS Plan_Obtenido,
    CONCAT_WS(', ', p1.nombre_paquete, p2.nombre_paquete, p3.nombre_paquete) AS Paquetes_Obtenidos,
    pl.dispositivos,
    (pl.precio + IFNULL(p1.precio, 0) + IFNULL(p2.precio, 0) + IFNULL(p3.precio, 0)) AS Precio_Total
    FROM Usuarios u
    JOIN Resumen r ON u.id_usuario = r.id_usuario
    JOIN Plan pl ON r.id_plan = pl.id_plan
    LEFT JOIN Paquetes p1 ON r.id_paquete1 = p1.id_paquete
    LEFT JOIN Paquetes p2 ON r.id_paquete2 = p2.id_paquete
    LEFT JOIN Paquetes p3 ON r.id_paquete3 = p3.id_paquete ";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuarioPorId($id_usuario)
    {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $edad)
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo_electronico = ?, edad = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $edad, $id_usuario);

        if ($sentencia->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar Usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function eliminarUsuario($id_usuario)
    {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);

        if ($sentencia->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar Usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function iniciarSesion($correo, $password)
    {
        $query = "SELECT * FROM Administrador WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $admin = $resultado->fetch_assoc();

        // Verifica la contraseña
        if ($admin && $password) {
            // Inicia la sesión
            session_start(); // Asegúrate de llamar a session_start al inicio del script

            // Guarda los datos del usuario en la sesión
            $_SESSION['id_admin'] = $admin['admin'];
            $stmt->close();

            return $admin; // Inicio de sesión exitoso
        } else {
            return false; // Contraseña o correo incorrectos
        }
    }

}


