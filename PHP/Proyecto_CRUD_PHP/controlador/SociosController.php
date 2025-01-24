<?php
require_once '../modelo/class_socio.php';

class SociosController {
    private $socio;

    public function __construct() {
        $this->socio = new Socio();
    }

    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->socio->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function listarSocios() {
        return $this->socio->obtenerSocios();
    }

    public function obtenerSocioPorId($id_socio) {
        return $this->socio->obtenerSocioPorId($id_socio);
    }

    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->socio->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function eliminarSocio($id_socio) {
        $this->socio->eliminarSocio($id_socio);
    }
}


?>