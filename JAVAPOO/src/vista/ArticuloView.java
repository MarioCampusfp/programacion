package vista;
import modelo.Articulo;
import java.util.List;
import java.util.Scanner;

public class ArticuloView {
    Scanner scanner = new Scanner(System.in);

    public int mostrarMenu() {
        System.out.println("\n--- Gestión de Artículos ---");
        System.out.println("1. Crear Artículo");
        System.out.println("2. Listar Artículos");
        System.out.println("3. Actualizar Artículo");
        System.out.println("4. Eliminar Artículo");
        System.out.println("5. Volver al menú principal");
        System.out.print("Seleccione una opción: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public String leerNombre() {
        System.out.print("Nombre: ");
        return scanner.nextLine();
    }

    public double leerPrecioUnitario() {
        System.out.print("Precio Unitario: ");
        return Double.parseDouble(scanner.nextLine());
    }

    public int leerStock() {
        System.out.print("Stock: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public int leerId() {
        System.out.print("ID: ");
        return Integer.parseInt(scanner.nextLine());
    }
    public void mostrarArticulos(List<Articulo> articulos) {
        System.out.println("\n--- Lista de Artículos ---");
        for (Articulo a : articulos) {
            System.out.println("ID: " + a.getIdArticulo() +", Nombre: " + a.getNombre() +", Precio: " + a.getPrecioUnitario() +", Stock: " + a.getStock());
        }
    }

    public void mostrarMensaje(String mensaje) {
        System.out.println(mensaje);
    }
}
