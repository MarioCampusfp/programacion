package ejercicio37;

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
}
