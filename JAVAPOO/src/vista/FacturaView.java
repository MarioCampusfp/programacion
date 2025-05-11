package vista;

import java.util.Scanner;
import java.time.LocalDate;
import modelo.FacturaRecibida;
import java.util.List;

public class FacturaView {
    Scanner scanner = new Scanner(System.in);

    public int mostrarMenu() {
        System.out.println("\n--- Gestión de Facturas Recibidas ---");
        System.out.println("1. Crear Factura");
        System.out.println("2. Listar Facturas");
        System.out.println("3. Actualizar Factura");
        System.out.println("4. Eliminar Factura");
        System.out.println("5. Volver al menú principal");
        System.out.print("Seleccione una opción: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public int leerIdProveedor() {
        System.out.print("ID del proveedor: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public LocalDate leerFecha() {
        System.out.print("Fecha (YYYY-MM-DD): ");
        return LocalDate.parse(scanner.nextLine());
    }

    public double leerTotal() {
        System.out.print("Total: ");
        return Double.parseDouble(scanner.nextLine());
    }

    public int leerId() {
        System.out.print("ID de la factura: ");
        return Integer.parseInt(scanner.nextLine());
    }
    
    public void mostrarMensaje(String mensaje) {
        System.out.println(mensaje);
    }

    public void mostrarFacturas(List<FacturaRecibida> facturas) {
        System.out.println("\n--- Lista de Facturas Recibidas ---");
        for (FacturaRecibida factura : facturas) {
            System.out.println("ID: " + factura.getIdFactura() +
                               ", Proveedor: " + factura.getIdProveedor() +
                               ", Fecha: " + factura.getFecha() +
                               ", Total: " + factura.getTotal());
        }
    }
}
