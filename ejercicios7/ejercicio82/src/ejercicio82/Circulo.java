package ejercicio82;

public class Circulo extends Figura implements Calculable {
	double radio;
	
	public Circulo (double radio) {
		this.radio=radio;
	}
	
	@Override
	public double calcularArea() {
		return Math.PI*Math.pow(radio, 2);
	}
}
