import java.sql.*;
import java.util.Scanner;
import java.util.InputMismatchException;
public class Principal {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		// informacion para conectarse a la base de datos
		String url="jdbc:mysql://localhost:3306/cine_mariodelreymoreno";
		String usuario ="root";
		String contraseña ="curso";
		//datos y opcion para que funcione el scanner
		Scanner scanner = new Scanner(System.in);
		int opcion=1;
		
		//try para conectarse a la base de datos y si hay algun error al conectarse que lo comunique
		try {
			Connection conexion= DriverManager.getConnection(url,usuario,contraseña);
			Statement stmt = conexion.createStatement();
			
			//menu de la aplicacion	y su funcioamiento
			do {
				System.out.println("\n=== menu de notas ===");
				System.out.println("1. Ver peliculas");
				System.out.println("2. Salir");
				System.out.print("Escribe la opcion: ");
				//try para comprobar que la opcion que a metido es valida	
				try {
					opcion = scanner.nextInt();
					scanner.nextLine();
				}catch(InputMismatchException e) {
					System.out.println("Error: " + e.getMessage());
					scanner.nextLine();
					continue;
				}
				//Switch para mostrar las opcion dependiendo de la opcion que has elegido 
				switch (opcion) {
					//opcion de portrar las peliculas
					case 1:
						ResultSet rc = stmt.executeQuery("SELECT * FROM categoria");
						while (rc.next()) {
							System.out.printf("\n ID: "+rc.getInt("id_categoria")+ " Nombre: "+ rc.getString("nombre_categoria"));
						}
						ResultSet rs = stmt.executeQuery("SELECT * FROM peliculas");
						 while (rs.next()) {
				                System.out.printf("\n ID: " + rs.getInt("id_peliculas") + " Nombre: " + rs.getString("nombre_peliculas")+ " Edad minima: "+ rs.getInt("edad_recomentada")+" Sala: "+rs.getInt("sala")+" Duracion: " + rs.getString("duracion")+ " Categoria: "+ rs.getInt("id_categoria"));
				            }
						 stmt.close();
					// opcion de salir del programa	
					case 2:
						System.out.println("Saliendo del programa....");
						break;
					//opcion de por defecto
					default:
						System.out.println("opcion no valida");
				}
			}while (opcion != 2);
			//cerramos el escaner y la conexion
			scanner.close();
			conexion.close();
		}catch (SQLException e) {
			System.out.println("Error: " + e.getMessage());
		}
	}

}
