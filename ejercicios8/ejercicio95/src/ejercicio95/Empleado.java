package ejercicio95;

import java.io.Serializable;

public class Empleado implements Serializable{
	String nombre;
	int edad;
	double salario;
	
	
	public Empleado(String nombre, int edad, double salario) {
		this.nombre=nombre;
		this.edad =edad;
		this.salario =salario;
	}
	
	@Override
    public String toString() {
        return "Nombre: " + nombre + ", Edad: " + edad + ", Salario: " + salario;
    }
	
}
