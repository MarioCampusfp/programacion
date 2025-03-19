public class Verificador{
	public void esMayorYPar(int numero){
		boolean mayor = (numero > 10);
		int resto = numero % 2;
		boolean par = (resto==0);
		boolean resultado =(mayor&&par);
		System.out.println(resultado);
	}
}