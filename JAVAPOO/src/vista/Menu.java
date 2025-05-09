package vista;
import java.util.Scanner;

public class Menu {
	public void menu() {
		Scanner scanner = new Scanner(System.in);
		int opcion;
		do {
			System.out.println("====Menu====");
			System.out.println("1.Gestión de Clientes");
			System.out.println("2.Gestión de Proveedores");
			System.out.println("3.Gestión de Artículos");
			System.out.println("4.Gestión de Facturas Recibidas");
			System.out.println("5.Gestión de Ventas");
			System.out.println("6.Informes de Ventas por Cliente");
			
			opcion= scanner.nextInt();
			switch(opcion) {
			case 1:
				System.out.println("===Menu Cliente===");
				System.out.println("1. Crear Cliente");
				System.out.println("2. Listar Cliente");
				System.out.println("3. Eliminar Cliente");
				System.out.println("4. Actualizar Cliente");
			case 2:
				System.out.println("===Menu Proveedores===");
				System.out.println("1. Crear Proveedores");
				System.out.println("2. Listar Proveedores");
				System.out.println("3. Eliminar Proveedores");
				System.out.println("4. Actualizar Proveedores");
			case 3:
				System.out.println("===Menu Artículos===");
				System.out.println("1. Crear Artículos");
				System.out.println("2. Listar Artículos");
				System.out.println("3. Eliminar Artículos");
				System.out.println("4. Actualizar Artículos");
			case 4:
				System.out.println("===Menu Facturas Recibidas===");
				System.out.println("1. Crear Facturas Recibidas");
				System.out.println("2. Listar Facturas Recibidas");
				System.out.println("3. Eliminar Facturas Recibidas");
				System.out.println("4. Actualizar Facturas Recibidas");
			case 5:
				System.out.println("===Menu Ventas===");
				System.out.println("1. Crear Ventas");
				System.out.println("2. Listar Ventas");
				System.out.println("3. Eliminar Ventas");
				System.out.println("4. Actualizar Ventas");
			case 6:
				
			default:
				System.out.println("la opcion no es balida");
			}
		}while (opcion != 7);

		
	}
}
