package ejercicio77;

import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Producto> productos = new ArrayList<>();
		productos.add(new Producto("macarones",5));
		productos.add(new Producto("Nintendo Swith 2",500));
		productos.add(new Producto("Moster Hunter Wils",60));
		productos.add(new Producto("Patatas",3));
		
		for (Producto producto: productos) {
			if (producto.precio > 50) {
				System.out.println(producto.nombre);
			}
		}
	}

}
