package vista;

import modelo.Venta;  
import java.util.List;
import java.util.Scanner;

public class VentaView {
    Scanner scanner = new Scanner(System.in);

    public int mostrarMenu() {
        System.out.println("\n--- Gestión de Ventas ---");
        System.out.println("1. Crear Venta");
        System.out.println("2. Listar Ventas");
        System.out.println("3. Eliminar Venta");
        System.out.println("4. Volver al menú principal");
        System.out.print("Seleccione una opción: ");
        return Integer.parseInt(scanner.nextLine()); 
    }

    public int leerIdCliente() {
        System.out.print("ID del cliente: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public int leerIdArticulo() {
        System.out.print("ID del artículo: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public int leerCantidad() {
        System.out.print("Cantidad: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public String leerFechaVenta() {
        System.out.print("Fecha de venta (YYYY-MM-DD): ");
        return scanner.nextLine();
    }

    public int leerId() {
        System.out.print("ID de la venta: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public void mostrarVentas(List<Venta> ventas) {
        if (ventas.isEmpty()) {
            System.out.println("No hay ventas registradas.");
        } else {
            System.out.println("\n--- Listado de Ventas ---");
            for (Venta venta : ventas) {
                System.out.printf("ID Venta: %d | ID Cliente: %d | ID Artículo: %d | Cantidad: %d | Fecha: %s%n", 
                                  venta.getIdVenta(), venta.getIdCliente(), venta.getIdArticulo(),
                                  venta.getCantidad(), venta.getFechaVenta());
            }
        }
    }

    public void mostrarMensaje(String mensaje) {
        System.out.println(mensaje);
    }
}

