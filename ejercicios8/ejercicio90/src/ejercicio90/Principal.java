package ejercicio90;
import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		int numero1;
		int numero2;
		Scanner scanner = new Scanner(System.in);
		try {
			System.out.println("escribe el primer numero que quieras dividir:");
			numero1= scanner.nextInt();
			System.out.println("escribe el segundo numero que quieras dividir:");
			numero2= scanner.nextInt();
			double division=numero1/numero2;
			System.out.println("el resultado es "+ division);
		} catch(ArithmeticException e){
			System.out.println("Error: No se puede dividir entre cero.");
		}
	}
}
