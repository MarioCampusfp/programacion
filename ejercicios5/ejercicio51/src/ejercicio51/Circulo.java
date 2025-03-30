package ejercicio51;

public class Circulo extends Figura{
	double radio;
	
	public double calcularArea() {
		return Math.PI* Math.pow(radio, 2);
	}
}
