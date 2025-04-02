package ejercicio82;

import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Figura>figuras = new ArrayList<>();
		figuras.add(new Circulo(4));
		figuras.add(new Rectangulo(3,7));
		figuras.add(new Circulo(9));
		figuras.add(new Rectangulo(5,18));
		
		for (Figura figura: figuras) {
			System.out.println(figura.calcularArea());
		}
	}
}
