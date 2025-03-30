package ejercicio67;

public class Triangulo implements Figura{
	int base;
	int altura;
	
	public void calcularArea() {
		int area= (base*altura)/2;
		System.out.println("el area del triangulo es "+ area);
	}
}
