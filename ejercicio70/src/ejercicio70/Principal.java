package ejercicio70;

import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		int[] numeros = new int[5];
		for( int i=0; i < numeros.length; i++) {
			Scanner scanner = new Scanner(System.in);
			System.out.println("ingrese un numero: ");
			int numero= scanner.nextInt();
			numeros[i]=numero;
		}
		for (int i = 0; i < numeros.length; i++) {
		    System.out.println("Elemento en posición " + i + ": " + numeros[i]);
		}
	}

}
