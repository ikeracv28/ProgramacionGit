<?php
// Incluimos el archivo donde está la clase eventos para usarla aquí
require_once '../modelo/class_evento.php';

// Esta clase se encarga de coordinar las acciones relacionadas con los eventos
class EventosController {
    // Guardamos una copia de la clase eventos para usarla en todos los métodos
    private $eventos;

    // Este método especial (el constructor) se ejecuta cuando creamos un objeto de esta clase
    public function __construct() {
        // Creamos un nuevo objeto de la clase eventos para poder usar sus funciones
        $this->eventos = new eventos();
    }

    // Este método sirve para agregar un nuevo eventos
    public function agregarEvento($nombre_evento, $fecha, $lugar) {
        // Llamamos al método de la clase eventos que agrega un eventos en la base de datos
        $this->eventos->agregarEvento($nombre_evento, $fecha, $lugar);
    }

    // Este método devuelve una lista de todos los eventos guardados
    public function listarEventos() {
        // Usamos el método de la clase eventos que recupera todos los eventos de la base de datos
        return $this->eventos->obtenerEventos();
    }

    // Este método obtiene la información de un eventos en específico (por su ID)
    public function obtenerEventoPorId($id_evento) {
        // Llamamos al método de la clase eventos que busca a un eventos según su ID
        return $this->eventos->obtenerEventoPorId($id_evento);
    }

    // Este método sirve para actualizar los datos de un eventos existente
    public function actualizarEventos($id_evento, $nombre_evento, $fecha, $lugar) {
        // Llamamos al método de la clase eventos que actualiza los datos del eventos
        $this->eventos->actualizarEventos($id_evento, $nombre_evento, $fecha, $lugar);
    }

    // Este método elimina a un eventos por su ID
    public function eliminarEvento($id_evento) {
        // Llamamos al método de la clase eventos que elimina al evento de la base de datos
        $this->eventos->eliminarEvento($id_evento);
    }
}
?>
