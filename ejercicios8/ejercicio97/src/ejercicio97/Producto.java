package ejercicio97;

import java.io.Serializable;

public class Producto implements Serializable{
	String nombre;
	double precio;
	String categoria;
	
	public Producto(String nombre, double precio, String categoria) {
		this.categoria=categoria;
		this.nombre=nombre;
		this.precio=precio;
	}
	
	public String Mostrar() {
		return "Nombre: " + nombre + ", Precio: " + precio + ", Categoría: " + categoria;
	}
}
