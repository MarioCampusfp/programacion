package ejercicio96;
import java.io.FileWriter;
import java.io.IOException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

public class Principal {
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		DateTimeFormatter formato = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        String fechaHora = LocalDateTime.now().format(formato);

        try (FileWriter escritor = new FileWriter("historial.txt", true)) {
            escritor.write(fechaHora + "\n");
            System.out.println("Línea añadida al historial.");
        } catch (IOException e) {
            System.out.println("Error al escribir en el archivo: " + e.getMessage());
        }
	}

}
