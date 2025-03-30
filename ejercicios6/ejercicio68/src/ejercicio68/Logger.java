package ejercicio68;

public interface Logger {
	public void registrar(String mensaje);
	default void separador() {
		System.out.println("-------------------------");
	}
}
