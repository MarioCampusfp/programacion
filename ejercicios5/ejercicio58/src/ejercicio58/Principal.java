package ejercicio58;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Persona ana = new Persona();
		ana.nombre="nombre";
		ana.edad=19;
		Persona carlos = new Estudiante();
		Persona jorge = new Profesor();
		carlos.mostrarDatos();
		jorge.mostrarDatos();
	}

}
