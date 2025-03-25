package ejercicio33;

public class CuentaBancarea {
	private double saldo;
	
	public void depositar(double cantidad) {
		saldo += cantidad;
	}
	
	public void retirar(double cantidad) {
		saldo -= cantidad;
	}
	
	public double getSaldo() { 
		return saldo;
	}
}
