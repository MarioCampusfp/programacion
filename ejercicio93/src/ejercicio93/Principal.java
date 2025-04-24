package ejercicio93;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			FileWriter escribir= new FileWriter("numero.txt");
			for(int i=1; i<=10; i++) {
				escribir.write(i);
			}
			escribir.close();
		}catch(IOException e){
			System.out.println("Error al escribir el archivo: " + e.getMessage());
		}
		try {
			BufferedReader leer=new BufferedReader(new FileReader("numero.txt"));
			int linea;
			int suma=0;
			
			while((linea=leer.read()) !=-1) {
				System.out.println(linea);
				suma=suma+linea;
			}
			System.out.println("la suma de los numero es "+suma);
			leer.close();
		}catch(IOException e){
			  System.out.println("Error leyendo el archivo: " + e.getMessage());
		}
	}

}
