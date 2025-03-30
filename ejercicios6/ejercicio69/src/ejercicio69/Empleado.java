package ejercicio69;

public class Empleado implements Identificable{
	String nombre;
	int id;
	public void mostrarIdentidad() {
		System.out.println("el nombre del empleado es "+nombre+" y su id es "+ id);
	}
}
