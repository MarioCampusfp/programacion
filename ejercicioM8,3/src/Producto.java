import java.io.*;

public class Producto implements Serializable{
	String nombre;
	double precio;
	
	public Producto(String nombre,double precio) {
		this.nombre=nombre;
		this.precio=precio;
	}
}
