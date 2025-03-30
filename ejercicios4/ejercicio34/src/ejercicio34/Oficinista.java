package ejercicio34;

public class Oficinista extends Empleado {
	public Oficinista(String nombre, double salario, String departamento) {
		super(nombre, salario, departamento);
	}
	public void MostrarDatosOficinista() {
		System.out.println(nombre);
		//System.out.println(salario);
		System.out.println(departamento);
	}
}
