package vista;
import modelo.Cliente;
import java.util.List;
import java.util.Scanner;

public class VistaCliente {
	Scanner scanner = new Scanner(System.in);
	 public int mostrarMenu() {
	        System.out.println("\n--- Gestión de Clientes ---");
	        System.out.println("1. Crear Cliente");
	        System.out.println("2. Listar Clientes");
	        System.out.println("3. Actualizar Cliente");
	        System.out.println("4. Eliminar Cliente");
	        System.out.println("5. Volver al menú principal");
	        System.out.print("Seleccione una opción: ");
	        return Integer.parseInt(scanner.nextLine());
	    }

	    public String leerNombre() {
	        System.out.print("Nombre: ");
	        return scanner.nextLine();
	    }

	    public String leerEmail() {
	        System.out.print("Email: ");
	        return scanner.nextLine();
	    }

	    public String leerTelefono() {
	        System.out.print("Teléfono: ");
	        return scanner.nextLine();
	    }

	    public int leerId() {
	        System.out.print("ID: ");
	        return Integer.parseInt(scanner.nextLine());
	    }
	    public void mostrarClientes(List<Cliente> clientes) {
	        System.out.println("\n--- Lista de Clientes ---");
	        for (Cliente c : clientes) {
	            System.out.println("ID: " + c.getIdCliente() +
	                               ", Nombre: " + c.getNombre() +
	                               ", Email: " + c.getEmail() +
	                               ", Teléfono: " + c.getTelefono());
	        }
	    }

	    public void mostrarMensaje(String mensaje) {
	        System.out.println(mensaje);
	    }
}
