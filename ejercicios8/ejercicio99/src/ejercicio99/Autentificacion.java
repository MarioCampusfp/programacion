package ejercicio99;
import java.io.*;
import java.util.Scanner;

public class Autentificacion {
	private static final String ARCHIVO_USUARIOS = "usuarios.txt";

    public void registrar(Usuario usuario) {
        if (existeUsuario(usuario.getNombre())) {
            System.out.println("El nombre de usuario ya existe.");
            return;
        }

        try (FileWriter writer = new FileWriter(ARCHIVO_USUARIOS, true)) {
            writer.write(usuario.toArchivo() + "\n");
            System.out.println("Usuario registrado exitosamente.");
        } catch (IOException e) {
            System.out.println("Error al registrar usuario: " + e.getMessage());
        }
    }

    public boolean iniciarSesion(String nombre, String contraseña) {
        try (BufferedReader reader = new BufferedReader(new FileReader(ARCHIVO_USUARIOS))) {
            String linea;
            while ((linea = reader.readLine()) != null) {
                String[] datos = linea.split(",");
                if (datos.length == 2) {
                    if (datos[0].equals(nombre) && datos[1].equals(contraseña)) {
                        return true;
                    }
                }
            }
        } catch (FileNotFoundException e) {
            System.out.println("No hay usuarios registrados todavía.");
        } catch (IOException e) {
            System.out.println("Error al leer el archivo: " + e.getMessage());
        }
        return false;
    }

    private boolean existeUsuario(String nombre) {
        try (BufferedReader reader = new BufferedReader(new FileReader(ARCHIVO_USUARIOS))) {
            String linea;
            while ((linea = reader.readLine()) != null) {
                String[] datos = linea.split(",");
                if (datos.length == 2 && datos[0].equals(nombre)) {
                    return true;
                }
            }
        } catch (IOException ignored) {
        }
        return false;
    }
}
