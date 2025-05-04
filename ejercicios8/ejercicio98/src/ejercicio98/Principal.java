package ejercicio98;
import java.util.Scanner;

public class Principal {
	public static void main(String[] args) {
        GestorNotas gestor = new GestorNotas();
        Scanner sc = new Scanner(System.in);
        int opcion;

        do {
            System.out.println("\n=== MENÚ DE NOTAS ===");
            System.out.println("1. Crear nota");
            System.out.println("2. Leer todas las notas");
            System.out.println("3. Eliminar una nota");
            System.out.println("4. Salir");
            System.out.print("Elige una opción: ");
            opcion = sc.nextInt();
            sc.nextLine(); // Limpiar buffer

            switch (opcion) {
                case 1:
                    System.out.print("Título: ");
                    String titulo = sc.nextLine();
                    System.out.println("Contenido (fin con línea vacía):");
                    StringBuilder contenido = new StringBuilder();
                    String linea;
                    while (!(linea = sc.nextLine()).isEmpty()) {
                        contenido.append(linea).append("\n");
                    }
                    Nota nota = new Nota(titulo, contenido.toString());
                    nota.guardar();
                    break;

                case 2:
                    gestor.leerNotas();
                    break;

                case 3:
                    System.out.print("Nombre del archivo (sin .txt): ");
                    String nombre = sc.nextLine();
                    gestor.eliminarNota(nombre);
                    break;

                case 4:
                    System.out.println("Saliendo del programa.");
                    break;

                default:
                    System.out.println("Opción no válida.");
            }

        } while (opcion != 4);

        sc.close();
    }
}
