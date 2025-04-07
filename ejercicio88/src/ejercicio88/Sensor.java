package ejercicio88;

public abstract class Sensor {
	 protected String id;
	    protected String ubicacion;

	    public Sensor(String id, String ubicacion) {
	        this.id = id;
	        this.ubicacion = ubicacion;
	    }

	    public String getId() {
	        return id;
	    }
}
