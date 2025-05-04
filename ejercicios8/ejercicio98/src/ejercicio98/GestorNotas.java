package ejercicio98;
import java.io.*;

public class GestorNotas {
	public void leerNotas() {
		File directorio = new File(".");
	    File[] archivos = directorio.listFiles((dir, name) -> name.endsWith(".txt"));

	    	if (archivos == null || archivos.length == 0) {
	            System.out.println("No hay notas guardadas.");
	            return;
	        }

	        for (File archivo : archivos) {
	            System.out.println("\n=== " + archivo.getName() + " ===");
	            try (BufferedReader reader = new BufferedReader(new FileReader(archivo))) {
	                String linea;
	                while ((linea = reader.readLine()) != null) {
	                    System.out.println(linea);
	                }
	            } catch (IOException e) {
	                System.out.println("Error al leer " + archivo.getName() + ": " + e.getMessage());
	            }
	        }
	    }

	    public void eliminarNota(String nombre) {
	        File archivo = new File(nombre + ".txt");
	        if (archivo.exists()) {
	            if (archivo.delete()) {
	                System.out.println("Nota eliminada correctamente.");
	            } else {
	                System.out.println("No se pudo eliminar la nota.");
	            }
	        } else {
	            System.out.println("La nota no existe.");
	        }
	    }
}
