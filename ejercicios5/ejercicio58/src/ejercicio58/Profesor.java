package ejercicio58;

public class Profesor extends Persona{
String asignatura;
	
	public Profesor() {
		super();
		this.asignatura="Desconocido";
		super.mostrarDatos();
	}
	@Override
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+ " edad: "+ edad+ " asignatura: "+ asignatura);
	}
}
