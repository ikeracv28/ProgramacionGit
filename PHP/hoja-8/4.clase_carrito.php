<?php
/*
4. Clase "Carrito de Compras":
Crea una clase Carrito con la propiedad productos (un array de productos).
Agrega los métodos:
agregarProducto($nombre, $precio, $cantidad): Añade un producto al carrito.
quitarProducto($nombre): Elimina un producto del carrito por su nombre.
calcularTotal(): Devuelve el precio total de los productos en el carrito.
mostrarDetalleCarrito(): Imprime los detalles de todos los productos con sus precios y cantidades.
Simula agregar y quitar productos y muestra el total.

*/
class Carrito {
    private $productos = []; // Array para almacenar los productos

    // Método para agregar un producto al carrito
    public function agregarProducto($nombre, $precio, $cantidad) {
        foreach ($this->productos as &$producto) {
            if ($producto['nombre'] === $nombre) {
                $producto['cantidad'] += $cantidad;
                return; // Si el producto ya existe, solo se incrementa la cantidad
            }
        }
        $this->productos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }

    // Método para quitar un producto del carrito
    public function quitarProducto($nombre) {
        foreach ($this->productos as $index => $producto) {
            if ($producto['nombre'] === $nombre) {
                unset($this->productos[$index]);
                $this->productos = array_values($this->productos); // Reindexar el array
                echo "Producto '{$nombre}' eliminado del carrito.\n";
                return;
            }
        }
        echo "Producto '{$nombre}' no encontrado en el carrito.\n";
    }

    // Método para calcular el total del carrito
    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    // Método para mostrar los detalles del carrito
    public function mostrarDetalleCarrito() {
        if (empty($this->productos)) {
            echo "El carrito está vacío.\n";
            return;
        }
        echo "=== Detalles del Carrito ===\n";
        foreach ($this->productos as $producto) {
            echo "Producto: {$producto['nombre']} - Precio: {$producto['precio']}€ - Cantidad: {$producto['cantidad']}\n";
        }
        echo "=============================\n";
    }
}

// Ejemplo de uso
$carrito = new Carrito();

// Agregar productos
$carrito->agregarProducto("Manzana", 1.5, 4);
$carrito->agregarProducto("Plátano", 1.2, 6);
$carrito->agregarProducto("Leche", 2.0, 2);

// Mostrar detalles del carrito
$carrito->mostrarDetalleCarrito();

// Quitar un producto
$carrito->quitarProducto("Plátano");

// Mostrar detalles del carrito actualizado
$carrito->mostrarDetalleCarrito();

// Calcular el total
echo "El total del carrito es: " . $carrito->calcularTotal() . "€\n";
