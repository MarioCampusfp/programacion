<?php
class carrito{
    public $productos=array();

    public function agregarProducto($nombre, $precio, $cantidad){
        $this->productos[] = array("nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad);
    }
    public function quitarProducto($nombre){
        foreach ($this->productos as $key => $producto) {
            if ($producto['nombre'] == $nombre) {
                unset($this->productos[$key]);
                break;
            }
        }
        $this->productos = array_values($this->productos);
    }
    public function calcularTotal(){
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }
    public function mostrarDetalleCarrito(){
        foreach ($this->productos as $producto) {
            echo "Nombre: " . $producto['nombre'] . ", Precio: " . $producto['precio'] . ", Cantidad: " . $producto['cantidad'];
        }
    }
}
$carrito = new carrito;
$carrito->agregarProducto("Manzana", 1.5, 10);
$carrito->agregarProducto("Banana", 0.8, 5);
$carrito->agregarProducto("Naranja", 1.2, 8);
echo "Detalle del carrito:";
$carrito->mostrarDetalleCarrito();
echo "Total: " . $carrito->calcularTotal();
$carrito->quitarProducto("Banana");
echo "Detalle del carrito después de quitar Banana:";
$carrito->mostrarDetalleCarrito();
