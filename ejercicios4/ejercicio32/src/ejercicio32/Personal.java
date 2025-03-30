package ejercicio32;

public class Personal {
	String nombre;
	int edad;
	
	public Personal() {
		this.nombre="Desconocido";
		this.edad=0;
	}
	
	public Personal(String nombre) {
		this.nombre=nombre;
		this.edad=0;
	}
	
	public Personal(String nombre, int edad) {
		this.nombre=nombre;
		this.edad=edad;
	}
	
	public void mostrarDatos() {
		System.out.println("el nombre del usuario es "+ nombre + " y su edad es "+ edad);
	}
}
