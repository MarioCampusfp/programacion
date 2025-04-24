package ejercicio92;
import java.io.*;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Animal leon=new Animal("Sinba","leon");
		
		try {
			ObjectOutputStream out= new ObjectOutputStream(new FileOutputStream("animal.ser"));
			out.writeObject(leon);
			out.close();
			System.out.println("Objeto guardado correctamente.");
		}catch (IOException e) {
            System.out.println("Error guardando el objeto: " + e.getMessage());
        }
		try {
			ObjectInputStream sacar= new ObjectInputStream(new FileInputStream("animal.ser"));
			Animal animalRecuperado= (Animal) sacar.readObject();
			sacar.close();
			System.out.println("Datos recuperados:");
			System.out.println("Nombre: " + animalRecuperado.nombre);
			System.out.println("Precio: " + animalRecuperado.especie);
		}catch (IOException | ClassNotFoundException e) {
            System.out.println("Error leyendo el objeto: " + e.getMessage());
        }
	}
}
