package ejercicio97;
import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ManejoProducto gestor = new ManejoProducto();
        Scanner sc = new Scanner(System.in);
        int opcion;
        
        do {
            System.out.println("\n=== Menú ===");
            System.out.println("1. Agregar producto");
            System.out.println("2. Mostrar productos");
            System.out.println("3. Salir");
            System.out.print("Opción: ");
            opcion = sc.nextInt();
            sc.nextLine();
            
            switch (opcion) {
            case 1:
                System.out.print("Nombre: ");
                String nombre = sc.nextLine();
                System.out.print("Precio: ");
                double precio = sc.nextDouble();
                sc.nextLine();
                System.out.print("Categoría: ");
                String categoria = sc.nextLine();
                gestor.agregarProducto(new Producto(nombre, precio, categoria));
                break;

            case 2:
                gestor.mostrarProductos();
                break;

            case 3:
                System.out.println("Saliendo...");
                break;

            default:
                System.out.println("Opción no válida.");
        }

    } while (opcion != 3);

    sc.close();
	}

}
