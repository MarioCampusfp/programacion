package ejercicio98;
import java.io.FileWriter;
import java.io.IOException;

public class Nota {
	 private String titulo;
	    private String contenido;

	    public Nota(String titulo, String contenido) {
	        this.titulo = titulo;
	        this.contenido = contenido;
	    }

	    public String getNombreArchivo() {
	        return titulo.replaceAll("\\s+", "_") + ".txt";
	    }

	    public void guardar() {
	        try (FileWriter writer = new FileWriter(getNombreArchivo())) {
	            writer.write(contenido);
	            System.out.println("Nota guardada como " + getNombreArchivo());
	        } catch (IOException e) {
	            System.out.println("Error al guardar la nota: " + e.getMessage());
	        }
	    }
}
