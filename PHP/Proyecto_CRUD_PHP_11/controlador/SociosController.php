<?php
// Incluimos el archivo donde está la clase Socio para usarla aquí
require_once '../modelo/class_socio.php';

// Esta clase se encarga de coordinar las acciones relacionadas con los socios
class SociosController {
    // Guardamos una copia de la clase Socio para usarla en todos los métodos
    private $socio;

    // Este método especial (el constructor) se ejecuta cuando creamos un objeto de esta clase
    public function __construct() {
        // Creamos un nuevo objeto de la clase Socio para poder usar sus funciones
        $this->socio = new Socio();
    }

    // Este método sirve para agregar un nuevo socio
    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        // Llamamos al método de la clase Socio que agrega un socio en la base de datos
        $this->socio->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    // Este método devuelve una lista de todos los socios guardados
    public function listarSocios() {
        // Usamos el método de la clase Socio que recupera todos los socios de la base de datos
        return $this->socio->obtenerSocios();
    }

    // Este método obtiene la información de un socio en específico (por su ID)
    public function obtenerSocioPorId($id_socio) {
        // Llamamos al método de la clase Socio que busca a un socio según su ID
        return $this->socio->obtenerSocioPorId($id_socio);
    }

    // Este método sirve para actualizar los datos de un socio existente
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        // Llamamos al método de la clase Socio que actualiza los datos del socio
        $this->socio->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    // Este método elimina a un socio por su ID
    public function eliminarSocio($id_socio) {
        // Llamamos al método de la clase Socio que elimina al socio de la base de datos
        $this->socio->eliminarSocio($id_socio);
    }
}
?>
