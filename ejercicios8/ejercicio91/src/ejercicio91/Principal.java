package ejercicio91;
import java.util.Scanner;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String frase;
		Scanner scanner = new Scanner(System.in);
		try {
			System.out.println("escribe la frase que quieras guardar en el documento: ");
			frase=scanner.nextLine();
			FileWriter escribir= new FileWriter("mensaje.txt");
			escribir.write(frase);
			escribir.close();
			scanner.close();
			System.out.println("Archivo escrito correctamente.");
		}catch(IOException e){
			System.out.println("Error al escribir el archivo: " + e.getMessage());
		}
		try {
			BufferedReader leer=new BufferedReader(new FileReader("mensaje.txt"));
			String linea;
			
			while((linea=leer.readLine())!=null) {
				System.out.println(linea);
			}
			leer.close();
		}catch(IOException e){
			  System.out.println("Error leyendo el archivo: " + e.getMessage());
		}
	}
}
