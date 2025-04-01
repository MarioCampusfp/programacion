package ejercicio76;

import java.util.Collections;
import java.util.ArrayList;


public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Integer>numeros=new ArrayList<>();
		numeros.add(1);
		numeros.add(16);
		numeros.add(51);
		numeros.add(31);
		numeros.add(11);
		numeros.add(6);
		numeros.add(3);
		Collections.sort(numeros);
		System.out.println(numeros);
	}

}
