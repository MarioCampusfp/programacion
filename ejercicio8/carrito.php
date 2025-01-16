<?php
class carrito{
    public $productos=array();

    public function agregarProducto($nombre, $precio, $cantidad){
        array_push($this->productos,$nombre,$precio,$cantidad);
    }
    public function quitarProducto($nombre){}
    public function calcularTotal(){}
    public function mostrarDetalleCarrito(){}
}