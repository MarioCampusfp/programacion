package ejercicio88;

import java.util.Random;

public class SensorHumedad extends Sensor implements Medible {
	private static final Random rand = new Random();
	
	public SensorHumedad(String id, String ubicacion) {
        super(id, ubicacion);
    }
	
	@Override
	public double leerValor() {
		return 30 + rand.nextDouble() * 40;
	}

	@Override
	public String getUnidad() {
		return "%";
	}

}
