package ejercicio82;

public class Rectangulo extends Figura implements Calculable {
	double ancho;
	double lado;
	
	public Rectangulo(double ancho, double lado){
		this.ancho=ancho;
		this.lado=lado;
	}
	
	@Override
	public double calcularArea() {
		return lado*ancho;
	}
}
