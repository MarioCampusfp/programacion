package ejercicio74;

import java.util.HashMap;
import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		HashMap<String,Integer>edades=new HashMap<>();
		edades.put("jesus", 55);
		edades.put("maria", 47);
		edades.put("dani", 36);
		edades.put("martin", 29);
		
		Scanner scanner = new Scanner(System.in);
		System.out.println("ingrese el nombre de la persona para saber su edad: ");
		String nombre= scanner.nextLine();
		
		System.out.println(edades.get(nombre));
		
	}

}
