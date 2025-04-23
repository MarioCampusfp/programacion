import java.io.*;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Producto p1=new Producto("GTA6",100.00);
		
		try {
			ObjectOutputStream out= new ObjectOutputStream(new FileOutputStream("producto.especial"));
			out.writeObject(p1);
			out.close();
			System.out.println("Objeto guardado correctamente.");
		}catch (IOException e) {
            System.out.println("Error guardando el objeto: " + e.getMessage());
        }
		
		try {
			ObjectInputStream sacar= new ObjectInputStream(new FileInputStream("producto.especial"));
			Producto productoRecuperada= (Producto) sacar.readObject();
			sacar.close();
			System.out.println("Datos recuperados:");
			System.out.println("Nombre: " + productoRecuperada.nombre);
			System.out.println("Precio: " + productoRecuperada.precio);
		}catch (IOException | ClassNotFoundException e) {
            System.out.println("Error leyendo el objeto: " + e.getMessage());
        }
	}

}
