package ejercicio58;



public class Estudiante extends Persona{
	String curso;
		
	
	public Estudiante() {
		super();
		this.curso="desconocido";
		//System.out.println("este es el contructo del hijo");
	}
	@Override	
	public void mostrarDatos() {
		System.out.println("nombre: "+ nombre+" edad: "+edad+" curso: "+curso);
	}
}
