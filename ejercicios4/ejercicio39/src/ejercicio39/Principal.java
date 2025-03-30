package ejercicio39;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Lavadora lavar = new Lavadora();
		lavar.marca="filit";
		lavar.precio=100;
		lavar.capacidadKg=50;
		lavar.mostrarDatos();
		
		Televisor tele = new Televisor();
		tele.marca="sony";
		tele.precio=120;
		tele.pulgadas=50;
		tele.mostrarDatos();
		
		Figura circulo = new Circulo(5);
        Figura rectangulo = new Rectangulo(4, 6);

        System.out.println("Área del círculo: " + circulo.calcularArea());
        System.out.println("Área del rectángulo: " + rectangulo.calcularArea());
	}

}
