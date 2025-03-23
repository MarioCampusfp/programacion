import java.util.Scanner;

public class Principal{
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
        	int numero, suma = 0;

		System.out.println("ingresa un numero(0 para acabar): ");
	
		do{
			System.out.print("numero: ");
			numero =scanner.nextInt();
			suma +=numero;
		}while(numero !=0);

		System.out.println("la suma es: "+ suma);
		scanner.close();
	}
}