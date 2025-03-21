public class Operaciones{
	static int num1 = 7;
	static int num2 = 13;
	static int resultado;
	
	public static void main(String[] args){
		resultado = num1 + num2;
		System.out.println("el resultado de la suma es: " + resultado);
		resultado = num1 - num2;
		System.out.println("el resultado de la resta es: " + resultado);
		resultado = num1 * num2;
		System.out.println("el resultado de la multiplicacion es: " + resultado);
		resultado = num1 / num2;
		System.out.println("el resultado de la division es: " + resultado);
	}
}