package ejercicio99;
import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Autentificacion auth = new Autentificacion();
        Scanner sc = new Scanner(System.in);
        int opcion;

        do {
            System.out.println("\n=== SISTEMA DE AUTENTICACIÓN ===");
            System.out.println("1. Registrarse");
            System.out.println("2. Iniciar sesión");
            System.out.println("3. Salir");
            System.out.print("Elige una opción: ");
            opcion = sc.nextInt();
            sc.nextLine();

            switch (opcion) {
                case 1:
                    System.out.print("Nombre de usuario: ");
                    String nombreR = sc.nextLine().trim();
                    System.out.print("Contraseña: ");
                    String passR = sc.nextLine().trim();

                    if (nombreR.isEmpty() || passR.isEmpty()) {
                        System.out.println("El nombre o la contraseña no pueden estar vacíos.");
                    } else {
                        auth.registrar(new Usuario(nombreR, passR));
                    }
                    break;

                case 2:
                    System.out.print("Nombre de usuario: ");
                    String nombreL = sc.nextLine();
                    System.out.print("Contraseña: ");
                    String passL = sc.nextLine();

                    if (auth.iniciarSesion(nombreL, passL)) {
                        System.out.println("Inicio de sesión exitoso. ¡Bienvenido, " + nombreL + "!");
                    } else {
                        System.out.println("Nombre de usuario o contraseña incorrectos.");
                    }
                    break;

                case 3:
                    System.out.println("Saliendo del sistema...");
                    break;

                default:
                    System.out.println("Opción inválida.");
            }

        } while (opcion != 3);

        sc.close();
	}

}
