package ejercicio95;

import java.io.*;
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Principal {
    static final String ARCHIVO = "empleado.em";

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcion = 0;

        do {
            System.out.println("______menú_____");
            System.out.println("1. Añadir empleado");
            System.out.println("2. Mostrar empleados");
            System.out.println("3. Salir");
            System.out.print("Seleccione una opción: ");

            try {
                opcion = scanner.nextInt();
                scanner.nextLine(); // Limpiar buffer
            } catch (InputMismatchException e) {
                System.out.println("Entrada inválida. Por favor ingrese un número.");
                scanner.nextLine();
                continue;
            }

            switch (opcion) {
                case 1:
                    agregarEmpleado(scanner);
                    break;
                case 2:
                    mostrarEmpleados();
                    break;
                case 3:
                    System.out.println("Saliendo del programa.");
                    break;
                default:
                    System.out.println("Opción no válida.");
            }
        } while (opcion != 3);

        scanner.close();
    }

    private static void agregarEmpleado(Scanner scanner) {
        try {
            System.out.print("Nombre: ");
            String nombre = scanner.nextLine();

            System.out.print("Edad: ");
            int edad = scanner.nextInt();

            System.out.print("Salario: ");
            double salario = scanner.nextDouble();
            scanner.nextLine(); // Limpiar buffer

            Empleado empleado = new Empleado(nombre, edad, salario);
            ArrayList<Empleado> empleados = leerEmpleados();
            empleados.add(empleado);

            try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(ARCHIVO))) {
                oos.writeObject(empleados);
                System.out.println("Empleado guardado exitosamente.");
            }
        } catch (InputMismatchException e) {
            System.out.println("Error de entrada. Edad y salario deben ser numéricos.");
            scanner.nextLine();
        } catch (IOException e) {
            System.out.println("Error al guardar el archivo: " + e.getMessage());
        }
    }

    private static void mostrarEmpleados() {
        ArrayList<Empleado> empleados = leerEmpleados();

        if (empleados.isEmpty()) {
            System.out.println("No hay empleados guardados.");
        } else {
            System.out.println("\nLista de empleados:");
            for (Empleado emp : empleados) {
                System.out.println(emp);
            }
        }
    }

    @SuppressWarnings("unchecked")
    private static ArrayList<Empleado> leerEmpleados() {
        File archivo = new File(ARCHIVO);
        if (!archivo.exists()) {
            return new ArrayList<>();
        }

        try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(archivo))) {
            return (ArrayList<Empleado>) ois.readObject();
        } catch (IOException | ClassNotFoundException e) {
            System.out.println("Error al leer empleados: " + e.getMessage());
            return new ArrayList<>();
        }
    }
}

