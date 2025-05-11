package vista;

import java.util.Scanner;
import modelo.Provedores;
import java.util.List;

public class ProveedorView {
    Scanner scanner = new Scanner(System.in);

    public int mostrarMenu() {
        System.out.println("\n--- Gestión de Proveedores ---");
        System.out.println("1. Crear Proveedor");
        System.out.println("2. Listar Proveedores");
        System.out.println("3. Actualizar Proveedor");
        System.out.println("4. Eliminar Proveedor");
        System.out.println("5. Volver al menú principal");
        System.out.print("Seleccione una opción: ");
        return Integer.parseInt(scanner.nextLine());
    }

    public String leerNombre() {
        System.out.print("Nombre: ");
        return scanner.nextLine();
    }

    public String leerCIF() {
        System.out.print("CIF: ");
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
    public void mostrarProveedores(List<Provedores> proveedores) {
        System.out.println("\n--- Lista de Proveedores ---");
        for (Provedores p : proveedores) {
            System.out.println("ID: " + p.getIdProveedor() +", Nombre: " + p.getNombre() +", Telefono: " + p.getTelefono());
        }
    }

    public void mostrarMensaje(String mensaje) {
        System.out.println(mensaje);
    }
}

