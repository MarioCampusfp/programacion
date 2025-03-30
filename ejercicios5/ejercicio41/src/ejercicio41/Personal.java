package ejercicio41;

public class Personal {
	String nombre;
	int edad;
	
	public Personal(String nombre, int edad) {
		this.nombre=nombre;
		this.edad=edad;
	}
	
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+ " edad: "+ edad);
	}
}
