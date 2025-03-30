package ejercicio67;

public class Cuadrado implements Figura{
	int lado;
	public void calcularArea() {
		int area =lado*lado;
		System.out.println("el area del cuadrado es "+area);
	}
}
