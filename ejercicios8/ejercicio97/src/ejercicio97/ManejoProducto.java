package ejercicio97;
import java.io.*;
import java.util.ArrayList;

public class ManejoProducto {
	 ArrayList<Producto> productos;
	 final String archivo = "productos.dat";
	 
	 public ManejoProducto() {
		 productos = cargarProductos();
	 }
	 
	 public void agregarProducto(Producto p) {
	        productos.add(p);
	        guardarProductos();
	 }
	 
	 public void mostrarProductos() {
	        if (productos.isEmpty()) {
	            System.out.println("No hay productos registrados.");
	        } else {
	            for (Producto p : productos) {
	                System.out.println(p);
	            }
	        }
	 }
	 
	 private void guardarProductos() {
	        try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(archivo))) {
	            oos.writeObject(productos);
	        } catch (IOException e) {
	            System.out.println("Error al guardar productos: " + e.getMessage());
	        }
	    }

	 @SuppressWarnings("unchecked")
	 private ArrayList<Producto> cargarProductos() {
	        File f = new File(archivo);
	        if (!f.exists()) {
	            return new ArrayList<>();
	        }
	        try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(f))) {
	            return (ArrayList<Producto>) ois.readObject();
	        } catch (IOException | ClassNotFoundException e) {
	            System.out.println("Error al cargar productos: " + e.getMessage());
	            return new ArrayList<>();
	        }
	 }
}
