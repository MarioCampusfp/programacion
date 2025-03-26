package ejercicio53;

public class Triangulo extends Figura{
	double longitud;
	double altura;
	
	public Triangulo(double longitud, double altura) {
		this.longitud=longitud;
		this.altura=altura;
	}
	
	@Override
	public double calcularArea() {
		return 0.5*longitud*altura;
	}
}
