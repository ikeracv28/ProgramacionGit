<?php
/*
2. Clase "Gestor de Tareas":
Crea una clase Tarea con las propiedades nombre, descripcion, fechaLimite y estado.
Agrega los métodos:
marcarComoCompletada(): Cambia el estado de la tarea a "completada".
editarDescripcion($nuevaDescripcion): Permite cambiar la descripción de la tarea.
mostrarTarea(): Imprime toda la información de la tarea.
Crea una lista de tareas en un array y realiza operaciones para marcar tareas como completadas.
*/
class tarea{
    private $nombre;
    private $descripcion;
    private $fechaLimite;
    private $estado;

    public function __construct($nombre_ext, $descripcion_ext, $fechaLimite_ext, $estado_ext){
        $this->nombre = $nombre_ext;
        $this->descripcion =$descripcion_ext;
        $this->fechaLimite =$fechaLimite_ext;
        $this->estado =$estado_ext;
    }
    public function marcarComoCompletada(){
        $this->estado = "completada";
        echo "La tarea " . $this->nombre . " ha sido completada \n";
    }
    public function editarDescripcion($nuevaDescripcion){
        $this->descripcion = $nuevaDescripcion;
        echo "La descripción de la tarea " . $this->nombre . " ha sido actualizada. \n";
    }
    public function mostrarTarea(){
        echo "Nombre: " . $this->nombre . "\n";
        echo "Descripción: ".$this->descripcion ."\n";
        echo "Fecha Límite: " . $this->fechaLimite. "\n";
        echo "Estado: " . $this->estado .  "\n";
    }
}

$tareas = [
    new Tarea("Comprar alimentos", "Comprar leche, pan y huevos", "2025-01-25", "pendiente"),
    new Tarea("Estudiar PHP", "Repasar clases y objetos", "2025-01-22", "pendiente"),
    new Tarea("Pagar facturas", "Pagar la factura de luz y agua", "2025-01-27", "pendiente")
    ];

echo "=== Lista de Tareas ===\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

// Marcar la primera tarea como completada
$tareas[0]->marcarComoCompletada();

// Editar la descripción de la segunda tarea
$tareas[1]->editarDescripcion("Repasar clases, objetos y herencia en PHP");

// Mostrar las tareas actualizadas
echo "\n=== Tareas Actualizadas ===\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}
