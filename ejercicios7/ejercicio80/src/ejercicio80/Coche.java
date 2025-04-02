package ejercicio80;

public class Coche extends Veiculo implements Movible{
	
	public Coche(String id) {
		super(id);
		this.id=id;
	}
	@Override
	public void mover() {
		System.out.println("el coche"+id+" se muebe por la carretera");
	}
}
