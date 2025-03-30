package ejercicio38;

public class Coche extends Vehiculo{
	int puertas;
	
	public Coche(String marca, String modelo, int puertas) {
		this.marca= marca;
		this.modelo=modelo;
		this.puertas=puertas;
	}
	public void mostrarDatos() {
		System.out.println("la marca es "+ marca + " el modelo es "+ modelo+" y tiene "+puertas+" puertas");
	}
	public void describir() {
		System.out.println("Soy un coche de marca "+ marca +" y modelo "+ modelo);
	}
}
