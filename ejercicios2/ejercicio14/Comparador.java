public class Comparador{
	public void compararNumeros(int a, int b){
		boolean mayor = (a > b);
		System.out.println("es mayor: "+ mayor);
		boolean menor = (a < b);
		System.out.println("es menor: "+ menor);
		boolean igual = (a == b);
		System.out.println("es igual: "+ igual);
	}
}