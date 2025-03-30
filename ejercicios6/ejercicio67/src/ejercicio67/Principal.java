package ejercicio67;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Cuadrado cuadrado=new Cuadrado();
		cuadrado.lado=5;
		cuadrado.calcularArea();
		Triangulo triangulo = new Triangulo();
		triangulo.altura=9;
		triangulo.base=15;
		triangulo.calcularArea();
	}

}
