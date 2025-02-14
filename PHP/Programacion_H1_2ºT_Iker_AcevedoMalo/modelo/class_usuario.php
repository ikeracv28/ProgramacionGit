<?php
require_once '../config/class_conexion.php'; // se importa la clase de conexión a la base de datos

class Usuario
{
    private $conexion; // objeto para la conexión con la base de datos

    public function __construct()
    {
        $this->conexion = new Conexion(); // se crea una instancia de la clase Conexion
    }

    // obtiene todos los planes de la base de datos
    public function agregarUsuarioPlan()
    {
        $query = "SELECT * from plan "; // consulta para seleccionar todos los planes
        $resultado = $this->conexion->conexion->query($query); // ejecuta la consulta
        $plan = []; // array para almacenar los resultados
        while ($fila = $resultado->fetch_assoc()) {
            $plan[] = $fila; // agrega cada fila de resultados al array
        }
        return $plan; // devuelve el array con los planes
    }

    // agrega un nuevo usuario a la base de datos
    public function agregarUsuarioC($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $query = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contraseña, edad) VALUES (?, ?, ?, SHA2(?, 256), ?)"; // consulta para insertar usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $contraseña, $edad); // enlaza los parámetros con la consulta

        if ($sentencia->execute()) { // si la ejecución es exitosa
            echo "Usuario agregado con éxito."; // muestra mensaje de éxito
        } else {
            echo "Error al agregar usuario: " . $sentencia->error; // muestra el error si no es exitoso
        }

        $sentencia->close(); // cierra la sentencia
    }

    // verifica si el correo ya está registrado
    public function correoExistente($correo)
    {
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE correo_electronico = ?"; // consulta para contar cuántos registros existen con ese correo
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("s", $correo); // enlaza el parámetro
        $sentencia->execute(); // ejecuta la consulta
        $resultado = $sentencia->get_result(); // obtiene el resultado
        $fila = $resultado->fetch_assoc(); // convierte el resultado en un array asociativo
        return $fila['total'] > 0; // devuelve true si ya existe el correo, de lo contrario, false
    }

    // obtiene el id de un usuario a partir de su correo
    public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT id_usuario FROM usuarios WHERE correo_electronico = ?"; // consulta para obtener el id del usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("s", $correo); // enlaza el parámetro
        $sentencia->execute(); // ejecuta la consulta
        $resultado = $sentencia->get_result(); // obtiene el resultado
        $fila = $resultado->fetch_assoc(); // convierte el resultado en un array asociativo

        // si encuentra al usuario, devuelve su id
        if ($fila) {
            return $fila['id_usuario']; 
        } else {
            return null; // si no encuentra al usuario, devuelve null
        }
    }

    // verifica las credenciales de inicio de sesión (correo y contraseña)
    public function verificarCredenciales($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo_electronico = ? AND contraseña = SHA2(?, 256)"; // consulta para verificar las credenciales
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("ss", $correo, $contraseña); // enlaza los parámetros
        $sentencia->execute(); // ejecuta la consulta
        $resultado = $sentencia->get_result(); // obtiene el resultado
        return $resultado->fetch_assoc(); // devuelve los datos del usuario si las credenciales son correctas
    }

    // actualiza el plan de un usuario
    public function actualizarPlanUsuario($correo, $id_plan)
    {
        $query = "UPDATE plan SET id_plan = ? WHERE correo_electronico = ?"; // consulta para actualizar el plan del usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("is", $id_plan, $correo); // enlaza los parámetros
        if ($sentencia->execute()) {
            return true; // si la actualización es exitosa, devuelve true
        } else {
            return false; // si hay un error, devuelve false
        }
    }

    // obtiene el plan de un usuario a partir de su correo
    public function obtenerPlanPorCorreo($correo)
    {
        $query = "SELECT p.* FROM plan p JOIN usuarios u ON p.id_plan = u.id_plan WHERE u.correo_electronico = ?"; // consulta para obtener el plan del usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("s", $correo); // enlaza el parámetro
        $sentencia->execute(); // ejecuta la consulta
        $resultado = $sentencia->get_result(); // obtiene el resultado
        return $resultado->fetch_assoc(); // devuelve el plan del usuario
    }

    // obtiene un paquete por su id
    public function obtenerPaquetePorId($id_paquete)
    {
        $query = "SELECT * FROM paquetes WHERE id_paquete = ?"; // consulta para obtener el paquete por id
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("i", $id_paquete); // enlaza el parámetro
        $sentencia->execute(); // ejecuta la consulta
        $resultado = $sentencia->get_result(); // obtiene el resultado
        return $resultado->fetch_assoc(); // devuelve los datos del paquete
    }

    // obtiene todos los usuarios
    public function obtenerUsuario()
    {
        $query = "SELECT * FROM usuarios"; // consulta para obtener todos los usuarios
        $resultado = $this->conexion->conexion->query($query); // ejecuta la consulta
        $usuarios = []; // array para almacenar los usuarios
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila; // agrega cada usuario al array
        }
        return $usuarios; // devuelve el array con los usuarios
    }

    // obtiene los usuarios completos con sus detalles de plan y paquetes
    public function obtenerUsuarioCompleto()
    {
        $query = "SELECT 
    u.*, 
    pl.nombre_plan AS Plan_Obtenido,
    pl.precio as Coste_plan, 
    CONCAT_WS(', ', p1.nombre_paquete, p2.nombre_paquete, p3.nombre_paquete) AS Paquetes_Obtenidos,
    CONCAT_WS(', ', p1.precio, p2.precio, p3.precio) AS Precio_desglose,
    pl.dispositivos,
    (pl.precio + IFNULL(p1.precio, 0) + IFNULL(p2.precio, 0) + IFNULL(p3.precio, 0)) AS Precio_Total
FROM Usuarios u
JOIN Resumen r ON u.id_usuario = r.id_usuario
JOIN Plan pl ON r.id_plan = pl.id_plan
LEFT JOIN Paquetes p1 ON r.id_paquete1 = p1.id_paquete
LEFT JOIN Paquetes p2 ON r.id_paquete2 = p2.id_paquete
LEFT JOIN Paquetes p3 ON r.id_paquete3 = p3.id_paquete"; // consulta compleja para obtener detalles completos

        $resultado = $this->conexion->conexion->query($query); // ejecuta la consulta
        $usuarios = []; // array para almacenar los usuarios
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila; // agrega cada usuario al array
        }
        return $usuarios; // devuelve el array con los usuarios completos
    }

    // elimina el plan de un usuario
    public function eliminarPlan($id_usuario)
    {
        $query = "DELETE FROM resumen WHERE id_usuario = ?"; // consulta para eliminar el resumen de un usuario
        $sentencia = $this->conexion->conexion->prepare($query); // prepara la consulta
        $sentencia->bind_param("i", $id_usuario); // enlaza el parámetro
        if ($sentencia->execute()) { // si la ejecución es exitosa
            echo "Usuario actualizado con éxito."; // muestra mensaje de éxito
        } else {
            echo "Error al actualizar Usuario: " . $sentencia->error; // muestra el error si no es exitoso
        }
        $sentencia->close(); // cierra la sentencia
    }

    // obtiene todos los paquetes disponibles
    public function obtenerPaquetes()
    {
        $query = "SELECT * from paquetes"; // consulta para obtener todos los paquetes
        $resultado = $this->conexion->conexion->query($query); // ejecuta la consulta
        $usuarios = []; // array para almacenar los paquetes
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila; // agrega cada paquete al array
        }
        return $usuarios; // devuelve el array con los paquetes
    }

    // obtiene los detalles completos de un usuario específico
    public function obtenerUsuarioCompletoIndividual($usuario)
    {
        $query = "SELECT 
    u.*, 
    pl.nombre_plan AS Plan_Obtenido,
    pl.precio as Coste_plan, 
    CONCAT_WS(', ', p1.nombre_paquete, p2.nombre_paquete, p3.nombre_paquete) AS Paquetes_Obtenidos,
    CONCAT_WS(', ', p1.precio, p2.precio, p3.precio) AS Precio_desglose,
    pl.dispositivos,
    (pl.precio + IFNULL(p1.precio, 0) + IFNULL(p2.precio, 0) + IFNULL(p3.precio, 0)) AS Precio_Total
FROM Usuarios u
JOIN Resumen r ON u.id_usuario = r.id_usuario
JOIN Plan pl ON r.id_plan = pl.id_plan
LEFT JOIN Paquetes p1 ON r.id_paquete1 = p1.id_paquete
LEFT JOIN Paquetes p2 ON r.id_paquete2 = p2.id_paquete
LEFT JOIN Paquetes p3 ON r.id_paquete3 = p3.id_paquete
    where u.id_usuario = ?"; // consulta compleja para obtener los detalles del usuario específico
        $stmt = $this->conexion->conexion->prepare($query); // prepara la consulta
        $stmt->bind_param("i", $usuario); // enlaza el parámetro
        $stmt->execute(); // ejecuta la consulta
        $result = $stmt->get_result(); // obtiene el resultado

        // retorna los resultados como un array asociativo
        $planes = $result->fetch_all(MYSQLI_ASSOC); 
        $stmt->close(); // cierra la sentencia
        return $planes; // devuelve los detalles completos del usuario
    }



    public function obtenerUltimoID($correo)
    {
        // preparamos la consulta para evitar inyecciones sql
        $query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);  // 's' porque el correo es un string
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
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
    
    public function obtenerPlanPorId($id_usuario)
    {
        // preparamos la consulta para obtener el plan asociado al usuario
        $query = "SELECT * FROM resumen WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);  // 'i' porque id_usuario es un entero
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }
    
    public function actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $edad)
    {
        // preparamos la consulta para actualizar los datos de un usuario
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo_electronico = ?, edad = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $edad, $id_usuario);  // 'ssssi' porque son 4 strings y un entero
    
        // si la consulta se ejecuta correctamente, mostramos un mensaje de éxito
        if ($sentencia->execute()) {
            echo "usuario actualizado con éxito.";
        } else {
            // si hay un error, mostramos el error que da la consulta
            echo "error al actualizar usuario: " . $sentencia->error;
        }
    
        $sentencia->close();  // cerramos la sentencia
    }
    
    public function eliminarUsuario($id_usuario)
    {
        // preparamos la consulta para eliminar un usuario por su id
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);  // 'i' porque id_usuario es un entero
    
        // si la consulta se ejecuta correctamente, mostramos un mensaje de éxito
        if ($sentencia->execute()) {
            echo "usuario eliminado con éxito.";
        } else {
            // si hay un error, mostramos el error que da la consulta
            echo "error al eliminar usuario: " . $sentencia->error;
        }
    
        $sentencia->close();  // cerramos la sentencia
    }
    
    public function iniciarSesion($correo, $password)
    {
        // preparamos la consulta para obtener el administrador por correo
        $query = "SELECT * FROM Administrador WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);  // 's' porque el correo es un string
        $stmt->execute();
        $resultado = $stmt->get_result();
        $admin = $resultado->fetch_assoc();
    
        // verificamos si la contraseña es correcta
        if ($admin && password_verify($password, $admin['contraseña'])) {
            // si todo es correcto, iniciamos la sesión
            session_start();  // iniciamos la sesión si no está iniciada
    
            // guardamos los datos del administrador en la sesión
            $_SESSION['id_admin'] = $admin['admin'];
            $stmt->close();  // cerramos la sentencia
            return $admin;  // devolvemos el admin si la contraseña es correcta
        } else {
            return false;  // si la contraseña o el correo son incorrectos, devolvemos false
        }
    }
    
    public function obtenerUsuarioSinPlan()
    {
        // preparamos la consulta para obtener los usuarios que no tienen plan
        $query = "SELECT u.* FROM usuarios u LEFT JOIN Resumen r ON u.id_usuario = r.id_usuario WHERE r.id_usuario IS NULL;";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
    
        // guardamos los usuarios que no tienen plan en un array
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
    
        return $usuarios;  // devolvemos los usuarios sin plan
    }
    
    public function obtenerPlanPorUsuario($id_usuario)
    {
        // preparamos la consulta para obtener el plan de un usuario por su id
        $query = "SELECT p.nombre_plan, p.duracion_suscripcion 
                  FROM resumen r 
                  JOIN plan p ON r.id_plan = p.id_plan 
                  WHERE r.id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);  // 'i' porque id_usuario es un entero
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();  // devolvemos el plan del usuario
    }
    
    public function insertarPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        // preparamos la consulta para actualizar los paquetes del usuario
        $query = "UPDATE resumen SET id_paquete1 = ?, id_paquete2 = ?, id_paquete3 = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("iiii", $id_paquete1, $id_paquete2, $id_paquete3, $id_usuario);  // 'iiii' porque son 3 enteros y un entero más
        return $stmt->execute();  // ejecutamos la consulta y devolvemos el resultado
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
