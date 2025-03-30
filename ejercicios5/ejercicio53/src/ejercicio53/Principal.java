package ejercicio53;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Figura triangulo = new Triangulo(4, 6);
		System.out.println("area del triangulo: "+triangulo.calcularArea());
		
		Figura circulo = new Cuadrado(9);
		System.out.println("area del cuadrado: "+circulo.calcularArea());
	}

}
