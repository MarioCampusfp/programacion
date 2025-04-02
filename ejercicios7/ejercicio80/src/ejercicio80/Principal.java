package ejercicio80;

import java.util.ArrayList;

public class Principal {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ArrayList<Movible>veiculos= new ArrayList<>();
		veiculos.add(new Coche("C33"));
		veiculos.add(new Bicicleta("B73"));
		veiculos.add(new Coche("C66"));
		veiculos.add(new Bicicleta("B82"));
		veiculos.add(new Coche("C93"));
		veiculos.add(new Bicicleta("B105"));
		
		for(Movible veiculo: veiculos){
			veiculo.mover();
		}
	}
}
