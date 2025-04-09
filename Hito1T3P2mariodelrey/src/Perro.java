
public class Perro extends Animal {
	String tamano;
	
	public Perro(int clip, String nombre, int edad, String raza, boolean adoptado,String tamano) {
		super(clip, nombre,edad,raza,adoptado);
		this.tamano=tamano;
	}
	@Override
	void mostrar() {
		// TODO Auto-generated method stub
		System.out.println("su numero de clip es "+ numero_de_clip +" su nombre es "+ nombre +" su edad es "+edad+" su raza es "+raza+" esta adoptado"+adoptado+" y es de tamaño "+tamano);
	}
}
