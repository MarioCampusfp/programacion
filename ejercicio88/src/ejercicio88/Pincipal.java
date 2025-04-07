package ejercicio88;
import java.util.*;

public class Pincipal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		List<Sensor> sensores = new ArrayList<>();
	    sensores.add(new SensorTemperatura("T1", "Sala"));
	    sensores.add(new SensorHumedad("H1", "Cocina"));
	    sensores.add(new SensorTemperatura("T2", "Habitación"));
	    sensores.add(new SensorHumedad("H2", "Baño"));

	    Map<String, Double> lecturas = new HashMap<>();

	    for (Sensor sensor : sensores) {
	    	if (sensor instanceof Medible) {
	    		Medible medible = (Medible) sensor;
	            double valor = medible.leerValor();
	            String unidad = medible.getUnidad();
	            System.out.println("Sensor " + sensor.getId() + " (" + sensor.ubicacion + ") -> " + valor + " " + unidad);
	            lecturas.put(sensor.getId(), valor);
	            }
	    	}
	    System.out.println("\nÚltimas lecturas almacenadas:");
	    lecturas.forEach((id, valor) -> System.out.println("ID: " + id + " -> " + valor));
	}

}
