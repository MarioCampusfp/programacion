package ejercicio79;

import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<String>nombres= new ArrayList<>();
		nombres.add("Mario");
		nombres.add("Martin");
		nombres.add("Dani");
		
		for (String nombre: nombres) {
			System.out.println(nombre.toUpperCase());
		}
		
	}

}
