package ejercicio81;

import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Animal>animales= new ArrayList<>();
		animales.add(new Perro("onoo"));
		animales.add(new Gato("saimon"));
		animales.add(new Perro("lola"));
		animales.add(new Gato("garfil"));
		
		for(Animal animal: animales){
			System.out.println(animal.nombre + " : "+ animal.hacerSonido());
		}
	}
}