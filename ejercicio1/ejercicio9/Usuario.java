public class Usuario {
	private String nombre;
	
	public void setNombre(String nuevoNombre){
		this.nombre = nuevoNombre;
	}
	
	public void getNombre(){
		System.out.println("El nombre es " + nombre);
	}
}