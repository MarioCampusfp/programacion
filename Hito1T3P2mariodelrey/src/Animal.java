public abstract class Animal {
	int numero_de_clip;
	String nombre;
	int edad;
	String raza;
	boolean adoptado;
	
	public Animal(int clip, String nombre, int edad, String raza, boolean adoptado) {
		this.numero_de_clip=clip;
		this.nombre=nombre;
		this.edad=edad;
		this.raza=raza;
		this.adoptado=adoptado;
	}
	
	public int getnumero_de_clip() {
		return numero_de_clip;
	}
	
	public boolean esAdoptado() {
		return adoptado;
	}
	
	public void buscarAdoptado(boolean adoptado) {
		this.adoptado=adoptado;
	}
	
	abstract void mostrar();
}
