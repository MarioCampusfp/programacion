package ejercicio89;

public abstract class Cuenta {
	String numeroCuenta;
	double saldo;
	
	public Cuenta(String numeroCuenta, double saldo) {
        this.numeroCuenta = numeroCuenta;
        this.saldo = saldo;
    }

    public String getNumeroCuenta() {
        return numeroCuenta;
    }
}
