<?php
// Clase que gestiona la conexión a la base de datos
class Conexion {
    // Propiedades privadas que almacenan los datos de conexión
    private $servidor = 'localhost'; // Dirección del servidor de base de datos
    private $usuario = 'root'; // Usuario de la base de datos
    private $password = '1234'; // Contraseña del usuario
    private $base_datos = 'club_deportivo'; // Nombre de la base de datos a conectar

    // Propiedad pública que contendrá la conexión
    public $conexion;

    // Constructor: se ejecuta automáticamente al crear un objeto de esta clase
    public function __construct() {
        // Se crea una nueva conexión usando la clase mysqli
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        // Verifica si hubo un error al intentar conectar con la base de datos
        if ($this->conexion->connect_error) {
            // Si hay un error, se detiene la ejecución del script y se muestra el mensaje de error
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para cerrar la conexión a la base de datos
    public function cerrar() {
        $this->conexion->close(); // Se cierra la conexión usando el método close() de mysqli
    }
}
?>

