package ejercicio89;

import java.util.*;

public class Principal {
	public static void main(String[] args) {
		Map<String, Cuenta> cuentas = new HashMap<>();

        cuentas.put("12345", new CuentaAhorro("12345", 5000.0, 2.5));
        cuentas.put("67890", new CuentaCorriente("67890", 2000.0, 1000.0));
        cuentas.put("11223", new CuentaAhorro("11223", 8000.0, 3.0));
        cuentas.put("44556", new CuentaCorriente("44556", 1500.0, 500.0));

        for (Cuenta cuenta : cuentas.values()) {
            if (cuenta instanceof Auditable) {
                Auditable auditable = (Auditable) cuenta;
                System.out.println(auditable.obtenerDetalles());
            }
        }

	}

}
