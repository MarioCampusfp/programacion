package ejercicio57;

public class Persona {
	String nombre;
	int edad;
		
	public Persona() {
		this.nombre="Desconocido";
		this.edad=0;
		System.out.println("este es el contructo del padre");
	}
		
	public Persona(String nombre, int edad) {
		this.nombre=nombre;
		this.edad=edad;
	}
		
	public String getNombre() {
		return nombre;
	}
		
	public void setNombre(String nombre1) {
		nombre=nombre1;
	}
		
	public double getEdad() {
		return edad;
	}
		
	public void setEdad(int numero) {
		edad+=numero;
	}
		
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+ " edad: "+ edad);
	}
}
