package ejercicio44;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Personal persona = new Personal();
		persona.nombre="juan";
		persona.edad=30;
		persona.mostrarDatos();
		
		Estudiante jose =new Estudiante();
		jose.nombre="jose";
		jose.edad=16;
		jose.curso="4ºde la eso";
		jose.mostrarDatos();
	}

}
