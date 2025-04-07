
public class Gato extends Animal {
	boolean test_leucemia;
	
	public Gato(int clip, String nombre, int edad, String raza, boolean adoptado, boolean test) {
		super(clip, nombre,edad,raza,adoptado);
		this.test_leucemia=test;
	}
	
	@Override
	void mostrar() {
		// TODO Auto-generated method stub
			System.out.println("el numero del chip es "+numero_de_clip+" su nombre es "+" su edad es "+edad+" su raza es "+ raza+" esta adoptado "+adoptado+ "tiene pasado el test de laucemia "+test_leucemia);
	}
}
