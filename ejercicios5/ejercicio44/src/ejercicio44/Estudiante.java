package ejercicio44;

public class Estudiante extends Personal{
	String curso;
		
	public Estudiante() {
		this.nombre="desconocido";
		this.edad=0;
		this.curso="desconocido";
	}
		
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+" edad: "+edad+" curso: "+curso);
	}
}

