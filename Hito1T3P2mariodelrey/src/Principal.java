import java.util.HashMap;
import java.util.ArrayList;
import java.util.Scanner;

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
	
	public boolean modificar(int numero_de_chip, HashMap<String, ArrayList<Animal>> animales) {
		for(ArrayList<Animal> lista: animales.values()) {
			for(Animal animal: lista) {
				if (animal.getnumero_de_clip() == numero_de_chip && !animal.esAdoptado()) {
					animal.buscarAdoptado(true);
					return true;
				}
			}
		}
		return false;
	}
	public boolean eliminar(int chip, HashMap<String, ArrayList<Animal>> animales) {
		for(ArrayList<Animal> lista: animales.values()) {
			for(Animal animal: lista) {
				if (animal.getnumero_de_clip()== chip) {
					return true;
				}
			}
		}
		return false;
	}
	
	public static void main(String[] args) {
		HashMap<String, ArrayList<Animal>> animales =new HashMap<>();
		Scanner scanner = new Scanner(System.in);
		int elecion;
		
		animales.putIfAbsent("Perro", new ArrayList<>());
		animales.putIfAbsent("Gato", new ArrayList<>());
		
		do {
			System.out.println("Elige una de las siglientes opciones");
			System.out.println("1. introducir un nuevo animal");
			System.out.println("2. buscar por chip un animal");
			System.out.println("3. listar animales");
			System.out.println("4. realizar adopcion");
			System.out.println("5. dar de baja");
			System.out.println("6. mostrar estadisticas de gato");
			System.out.println("7. salir");
			
			elecion= scanner.nextInt();
			
			switch(elecion) {
			case 1:
				int chip;
				String nombre;
				int edad;
				String raza;
				boolean adoptado;
				String opcion;
				
				System.out.println("Vas a añadir un perro o un gato:");
				opcion = scanner.nextLine();
				if(opcion.equals("perro")) {
					String tamano;
					System.out.println("Introduce el chip del perro:");
					chip=scanner.nextInt();
					System.out.println("Introduce el nombre del perro:");
					nombre= scanner.nextLine();
					System.out.println("Introduce la edad del perro:");
					edad = scanner.nextInt();
					System.out.println("Introduce la raza del perro:");
					raza= scanner.nextLine();
					System.out.println("Introduce si el perro esta adoptado(true/false):");
					adoptado= scanner.nextBoolean();
					tamano= scanner.nextLine();
					
					Perro perro = new Perro(chip, nombre, edad, raza, adoptado,tamano);
					animales.get("Perro").add(perro);
					
				}else if(opcion.equals("gato")) {
					boolean test_leucemia;
					System.out.println("Introduce el chip del gato:");
					chip=scanner.nextInt();
					System.out.println("Introduce el nombre del gato:");
					nombre= scanner.nextLine();
					System.out.println("Introduce la edad del gato:");
					edad = scanner.nextInt();
					System.out.println("Introduce la raza del gato:");
					raza= scanner.nextLine();
					System.out.println("Introduce si el gato esta adoptado(true/false):");
					adoptado= scanner.nextBoolean();
					System.out.println("Introduce si el gato a pasado el test de laucemia(true/false):");
					test_leucemia= scanner.nextBoolean();
					
					Gato gato = new Gato(chip, nombre,edad,raza,adoptado,test_leucemia);
					animales.get("Gato").add(gato);
				}else {
					System.out.println("dato no valido");
				}
				break;
			case 2:
				int chip_buscar;
				System.out.println("Introduce el chip que quieras buscar");
				chip_buscar=scanner.nextInt();
				
				Principal principal = new Principal();
				principal.buscar(chip_buscar, animales);
				break;
			case 3:
				for(ArrayList<Animal> lista: animales.values()) {
					for(Animal animal: lista) {
						animal.mostrar();
					}
				}
				break;
			case 4:
				String nombre_persona;
				System.out.println("introduce tu nombre:");
				nombre_persona=scanner.nextLine();
				String dni_persona;
				System.out.println("introduce tu dni");
				dni_persona=scanner.nextLine();
				int chip_adopcion;
				System.out.println("introduce el numero del chip del animal");
				chip_adopcion=scanner.nextInt();
				
				Principal buscar = new Principal();
				boolean exito =buscar.modificar(chip_adopcion, animales);
				
				if(exito) {
					System.out.println(nombre_persona +" a adoptado al animal con el chip"+chip_adopcion);
				}else {
					System.out.println("El animal no existe o ya a sido adoptado");
				}
				break;
			case 5:
				int chip_eliminar;
				System.out.println("Escrsibe el numero de chip del animal que vas a eliminar");
				chip_eliminar=scanner.nextInt();
				
				Principal eliminar= new Principal();
				boolean eliminado=eliminar.eliminar(chip_eliminar, animales);
				
				if (eliminado) {
					System.out.println("animal eliminado con exito");
				} else {
					System.out.println("el animal no se a encontrado");
				}
				
				break;
			case 6:
				int num_gato = 0;
				int num_text = 0;
				
				break;
			default:
				System.out.println("la opcion no es balida");
			}
		} while (elecion != 0);
		
	}
}
