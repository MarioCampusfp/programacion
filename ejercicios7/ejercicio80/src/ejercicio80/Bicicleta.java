package ejercicio80;

public class Bicicleta extends Veiculo implements Movible{
	
	public Bicicleta(String id) {
		super(id);
		this.id=id;
	}
	@Override
	public void mover() {
		System.out.println("la bici"+id+"se mueve por el carrir bici");
	}
}
