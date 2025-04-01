package ejercicio73;

import java.util.ArrayList;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<String>tareas = new ArrayList<>();
		tareas.add("fregar");
		tareas.add("barer");
		tareas.add("pasar el polvo");
		tareas.add("hacer la cama");
		System.out.println(tareas.get(3));
		tareas.remove("fregar");
		System.out.println(tareas.size());
	}

}
