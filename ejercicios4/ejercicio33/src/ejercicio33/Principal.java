package ejercicio33;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		CuentaBancarea cuenta = new CuentaBancarea();
		cuenta.depositar(1000.50);
		cuenta.retirar(100.40);
		System.out.println("saldo: "+ cuenta.getSaldo());
	}

}
