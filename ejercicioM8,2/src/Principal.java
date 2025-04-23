import java.io.FileWriter;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;	
public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			FileWriter escribir= new FileWriter("notas.txt");
			escribir.write("Nombre: Mario nota: 7\n");
			escribir.write("Nombre: Martin nota: 6\n");
			escribir.write("Nombre: Dani nota: 8\n");
			escribir.close();
			System.out.println("Archivo escrito correctamente.");
		}catch(IOException e){
			System.out.println("Error al escribir el archivo: " + e.getMessage());
		}
		try {
			BufferedReader leer=new BufferedReader(new FileReader("notas.txt"));
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
