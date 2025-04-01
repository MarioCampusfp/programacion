package ejercicio78;

import java.util.Iterator;
import java.util.ArrayList;


public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		ArrayList<String> frutas = new ArrayList<>();
		frutas.add("Manzana");
		frutas.add("Banana");
		frutas.add("Pera");

		
		Iterator<String>it=frutas.iterator();
		while(it.hasNext()) {
			String f=it.next();
			if (f.equals("Manzana")) {
				 it.remove();
			}
		}
	}
}
