package ejercicio72;

public class Principal {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
	
		int[][] tabla= {
				{1,2,3},
				{4,5,6},
				{7,8,9}
		};
		
		for (int fila = 0; fila <tabla.length;fila++) {
			for (int columna = 0; columna< tabla[fila].length;columna++) {
				System.out.print(tabla[fila][columna]+" ");
			}
			System.out.println();
		}
		
	}

}
