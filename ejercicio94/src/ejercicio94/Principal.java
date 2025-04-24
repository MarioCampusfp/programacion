package ejercicio94;
import java.io.IOException;
import java.io.FileReader;

public class Principal {

	public static void leerArchivo(String ruta) throws IOException{
		FileReader lector = new FileReader(ruta);
	    lector.close();
	}
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			leerArchivo("texto.txt");
		}catch(IOException e) {
			System.out.println("Archivo no encontrado o error de lectura.");
		}
	}
}
