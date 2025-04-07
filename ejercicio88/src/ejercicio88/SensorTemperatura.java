package ejercicio88;

import java.util.Random;

public class SensorTemperatura extends Sensor implements Medible {
	static final Random rand = new Random();
	
	 public SensorTemperatura(String id, String ubicacion) {
	        super(id, ubicacion);
	    }
	
	@Override
	public double leerValor() {
		return 15 + rand.nextDouble() * 10;
	}

	@Override
	public String getUnidad() {
		return "ºC";
	}

}
