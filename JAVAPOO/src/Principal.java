import controlador.*;
import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner scanner = new Scanner(System.in);

		ClienteControlador clienteController = new ClienteControlador();
        ProveedorControlador proveedorController = new ProveedorControlador();
        ArticuloControlador articuloController = new ArticuloControlador();
        FacturaControlador facturaController = new FacturaControlador();
        VentaControlador ventaController = new VentaControlador();
        InformeControlador informeController = new InformeControlador();

        int opcion;
        do {
            System.out.println("\n===== MENÚ PRINCIPAL - JAVAPOO S.L. =====");
            System.out.println("1. Gestión de Clientes");
            System.out.println("2. Gestión de Proveedores");
            System.out.println("3. Gestión de Artículos");
            System.out.println("4. Gestión de Facturas Recibidas");
            System.out.println("5. Gestión de Ventas");
            System.out.println("6. Informe de Ventas por Cliente");
            System.out.println("0. Salir");
            System.out.print("Seleccione una opción: ");
            opcion = Integer.parseInt(scanner.nextLine());

            switch (opcion) {
            case 1:
                clienteController.gestionar();
                break;
            case 2:
                proveedorController.gestionar();
                break;
            case 3:
                articuloController.gestionar();
                break;
            case 4:
                facturaController.gestionar();
                break;
            case 5:
                ventaController.gestionar();
                break;
            case 6:
                informeController.generarInforme();
                break;
            case 0:
                System.out.println("Saliendo de la aplicación...");
                break;
            default:
                System.out.println("Opción inválida. Intente de nuevo.");
        }
        } while (opcion != 0);

        scanner.close();	 
	}

}
