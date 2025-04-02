package ejercicio81;

public class Gato extends Animal implements Comunicable {

	public Gato(String nombre) {
		super(nombre);
	}
	
	@Override
	public String hacerSonido() {
		return "miau miau";
	}

}
