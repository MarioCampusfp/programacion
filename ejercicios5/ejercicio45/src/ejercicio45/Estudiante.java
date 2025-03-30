package ejercicio45;

public class Estudiante extends Personal{
	String curso;
		
	public Estudiante() {
		super();
		this.curso="desconocido";
		System.out.println("este es el contructo del hijo");
	}
		
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+" edad: "+edad+" curso: "+curso);
	}
}