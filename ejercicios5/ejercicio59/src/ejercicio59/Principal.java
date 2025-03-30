package ejercicio59;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Persona lucas = new Estudiante();
		Persona jesus = new Profesor();
		
		if (lucas instanceof Persona) {
			System.out.println("este objeto es una instancia de Persona");
		}else {
			System.out.println("este objeto no es una instancia de Persona");
		}
		if (jesus instanceof Estudiante) {
			System.out.println("este objeto es una instancia de Estudiante");
		}else {
			System.out.println("este objeto no es una instancia de Estudiante");
		}
	}

}
