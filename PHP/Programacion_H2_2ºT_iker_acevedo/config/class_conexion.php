<?php
class Conexion {
    // definimos las variables que guardarán los datos de conexión
    private $servidor = 'localhost'; 
    private $usuario = 'root'; 
    private $password = '1234'; 
    private $base_datos = 'Hito_2'; 
    public $conexion; // aquí guardaremos la conexión a la base de datos

    // constructor de la clase
    public function __construct() {
        // intentamos establecer la conexión con la base de datos usando los datos anteriores
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        // comprobamos si hay algún error en la conexión
        if ($this->conexion->connect_error) {
            // si hay error, detenemos la ejecución y mostramos el error
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // método para cerrar la conexión a la base de datos
    public function cerrar() {
        // cerramos la conexión cuando ya no la necesitemos
        $this->conexion->close();
    }
}
?>
