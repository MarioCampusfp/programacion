import java.util.HashMap;
import java.util.ArrayList;

public class Principal {

	public void buscar(int numero_de_clip, HashMap<String, ArrayList<Animal>> animales) {
		for (ArrayList<Animal> lista : animales.values()) {
			for(Animal animal: lista){
				if (animal.getnumero_de_clip() == numero_de_clip){
					animal.mostrar();
					return;
				}
			}
		}
		System.out.println("El animal con el chip "+ numero_de_clip+ " no existe");
	}
	
	public static void main(String[] args) {
		HashMap<String, ArrayList<Animal>> animales =new HashMap<>();
		
		Perro onoo = new Perro(455478, "Onoo", 10, "mestizo", true, "mediano");
		Perro yaco = new Perro(487897, "Yaco", 13, "Pastor Belga", false,"mediano");
		Gato saimon = new Gato(653634,"saimon", 16, "Bombay",false,true);
		Gato rayo = new Gato(785878,"Rayo",8,"Naranja", true, true);
		
		animales.putIfAbsent("Perro", new ArrayList<>());
		animales.get("Perro").add(onoo);
		animales.get("Perro").add(yaco);
		
		animales.putIfAbsent("Gato", new ArrayList<>());
		animales.get("Gato").add(saimon);
		animales.get("Gato").add(rayo);
		
		Principal principal = new Principal();
		principal.buscar(77777, animales);
		principal.buscar(455478, animales);
	}
}
