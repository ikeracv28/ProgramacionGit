<?php
require_once '../config/class_conexion.php';

class Usuario
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



    public function agregarUsuarioC($nombre, $apellido, $correo_electronico, $contraseña, $edad)
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

    /*public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT id_usuario FROM usuarios WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario
    }*/

    public function obtenerUsuarioPorCorreo($correo)
{
    $query = "SELECT id_usuario FROM usuarios WHERE correo_electronico = ?";
    $sentencia = $this->conexion->conexion->prepare($query);
    $sentencia->bind_param("s", $correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $fila = $resultado->fetch_assoc();

    // Si el usuario existe, retorna solo el id_usuario
    if ($fila) {
        return $fila['id_usuario']; // Devuelve el id_usuario directamente
    } else {
        return null; // Si no encuentra el usuario, devuelve null
    }
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

    public function eliminarPlan($id_usuario)
    {
        $query = "DELETE FROM resumen WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);
        if ($sentencia->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar Usuario: " . $sentencia->error;
        }
        $sentencia->close();
    }

    public function obtenerPaquetes()
    {
        $query = "SELECT * from paquetes";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    

    public function obtenerUsuarioCompletoIndividual($usuario)
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
    LEFT JOIN Paquetes p3 ON r.id_paquete3 = p3.id_paquete 
    where u.id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Retorna todos los resultados como un array asociativo.
        $planes = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $planes;
    }

    public function obtenerUltimoID($correo)
    {
        $query = "SELECT id_usuario FROM usuarios where correo = $correo ";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
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
    public function obtenerPlanPorId($id_usuario)
    {
        $query = "SELECT * FROM resumen WHERE id_usuario = ?";
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
            $_SESSION['id_admin'] = $admin['administrador'];
            $stmt->close();

            return $admin; // Inicio de sesión exitoso
        } else {
            return false; // Contraseña o correo incorrectos
        }
    }


    public function obtenerUsuarioSinPlan()
    {
        $query = "SELECT u.* FROM usuarios u left join Resumen r ON u.id_usuario = r.id_usuario where r.id_usuario IS NULL;";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerPlanPorUsuario($id_usuario) {
        $query = "SELECT p.nombre_plan, p.duracion_suscripcion 
                  FROM resumen r 
                  JOIN plan p ON r.id_plan = p.id_plan 
                  WHERE r.id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    
    public function insertarPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3) {
        $query = "UPDATE resumen SET id_paquete1 = ?, id_paquete2 = ?, id_paquete3 = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("iiii", $id_paquete1, $id_paquete2, $id_paquete3, $id_usuario);
        return $stmt->execute();
    }
    
    public function insertarPaquete($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        // 1. Obtener información del usuario.
        // Consultamos la base de datos para obtener la información del usuario según su ID.
        // Esto nos permitirá acceder a datos clave como la edad del usuario, que es importante para las restricciones de paquetes.
        $usuario = $this->obtenerUsuarioPorId($id_usuario);
        if (!$usuario) {
            return "Usuario no encontrado."; // Si el usuario no existe, terminamos la ejecución con un mensaje de error.
        }
        $edad = $usuario['edad']; // Guardamos la edad del usuario para las validaciones posteriores.

        // 2. Obtener información del plan.
        // Consultamos la base de datos para obtener el plan de suscripción del usuario.
        // Necesitamos conocer el nombre del plan y la duración de la suscripción para aplicar las reglas de selección de paquetes.

            $querypl = "SELECT * FROM Plan WHERE id_plan = ?";
            $stmt = $this->conexion->conexion->prepare($querypl);
            $stmt->bind_param("i", $id_plan);
            $stmt->execute();
    
            // Retorna el primer resultado como un array asociativo.
            $plan = $stmt->get_result()->fetch_assoc();
        
        if (!$plan) {
            return "Plan no encontrado."; // Si el plan no existe, terminamos la ejecución con un mensaje de error.
        }
        $nombrePlan = $plan['nombre_plan']; // Nombre del plan (Ejemplo: "Básico", "Premium", etc.)
        $duracionPlan = $plan['duracion_suscripcion']; // Duración de la suscripción (Ejemplo: "Mensual", "Anual")

        // 3. Obtener información de los paquetes seleccionados.
        // Guardamos los IDs de los paquetes en un array para recorrerlos de manera más sencilla.
        $paquetesSeleccionados = [$id_paquete1, $id_paquete2, $id_paquete3];

        // Creamos un array vacío donde guardaremos los paquetes que realmente existen en la base de datos.
        $paquetesValidos = [];

        // Recorremos los paquetes seleccionados para verificar si existen en la base de datos.
        foreach ($paquetesSeleccionados as $id_paquete) {
            if ($id_paquete) { // Solo validamos si el paquete no es NULL.
                // Consultamos la base de datos para obtener el nombre del paquete correspondiente al ID.
                $sqlPaquete = "SELECT nombre_paquete FROM Paquetes WHERE id_paquete = ?";
                $stmtPaquete = $this->conexion->conexion->prepare($sqlPaquete);
                $stmtPaquete->bind_param("i", $id_paquete);
                $stmtPaquete->execute();
                $resultadoPaquete = $stmtPaquete->get_result();
                $paquete = $resultadoPaquete->fetch_assoc();

                if ($paquete) { // Si el paquete existe, lo añadimos a la lista de paquetes válidos.
                    $paquetesValidos[] = $paquete['nombre_paquete'];
                }
            }
        }

        // 4. Validaciones según las reglas establecidas.

        // Regla 1: Si el usuario es menor de 18 años, solo puede seleccionar el Pack Infantil.
        if ($edad < 18) {
            // Si seleccionó más de un paquete o el Pack Infantil no está incluido en la lista, se rechaza la solicitud.
            if (count($paquetesValidos) > 1 || !in_array("Infantil", $paquetesValidos)) {
                return "Los menores de 18 años solo pueden contratar el Pack Infantil.";
            }
        }

        // Regla 2: Si el usuario tiene el Plan Básico, solo puede seleccionar un paquete adicional.
        if ($nombrePlan === "Básico" && count($paquetesValidos) > 1) {
            return "Los usuarios del Plan Básico solo pueden seleccionar un paquete adicional.";
        }

        // Regla 3: Si el usuario selecciona el Pack Deporte, su suscripción debe ser de 1 año.
        if (in_array("Deporte", $paquetesValidos) && $duracionPlan !== "Anual") {
            return "El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año.";
        }

        // 5. Si todas las validaciones son correctas, actualiza la tabla Resumen.
        // En este paso actualizamos la tabla `Resumen`, asociando los paquetes seleccionados con el usuario y su plan.
        $sqlUpdate = "UPDATE Resumen SET id_paquete1 = ?, id_paquete2 = ?, id_paquete3 = ? WHERE id_usuario = ? AND id_plan = ?";
        $stmtUpdate = $this->conexion->conexion->prepare($sqlUpdate);

        // Asociamos los valores a los parámetros de la consulta SQL para evitar inyección de SQL.
        $stmtUpdate->bind_param("iiiii", $id_paquete1, $id_paquete2, $id_paquete3, $id_usuario, $id_plan);

        // Ejecutamos la actualización en la base de datos.
        if ($stmtUpdate->execute()) {
            return "Paquete actualizado correctamente."; // Confirmamos que la actualización fue exitosa.
        } else {
            return "Error al actualizar el paquete."; // Si hubo un error en la ejecución, se informa.
        }
    }
}



