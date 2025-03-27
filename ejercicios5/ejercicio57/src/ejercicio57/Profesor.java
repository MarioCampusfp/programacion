package ejercicio57;

public class Profesor extends Persona{
	String asignatura;
	
	public Profesor() {
		this.nombre="Desconocido";
		this.edad=0;
		this.asignatura="Desconocido";
		super.mostrarDatos();
	}
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+ " edad: "+ edad+ " asignatura"+ asignatura);
	}
}
