package ejercicio89;

public class CuentaCorriente extends Cuenta implements Auditable {
	double limiteSobregiro;
	
	public CuentaCorriente(String numeroCuenta, double saldo, double limiteSobregiro) {
        super(numeroCuenta, saldo);
        this.limiteSobregiro = limiteSobregiro;
    }
	@Override
	public String obtenerDetalles() {
		return "Cuenta Corriente - Nº: " + numeroCuenta +
	               ", Saldo: $" + saldo +
	               ", Límite de Sobregiro: $" + limiteSobregiro;
	}

}
