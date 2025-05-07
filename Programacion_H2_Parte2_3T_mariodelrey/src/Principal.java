import java.sql.*;
import java.util.InputMismatchException;
import java.util.Scanner;
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
				System.out.println("2. Añadir pelicula");
				System.out.println("3. Eliminar pelicula");
				System.out.println("4. Modificar pelicula");
				System.out.println("5. Salir");
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
						break;
					//opcion para añadir una nueva pelicula
					case 2:
						int id;
						String nombre;
						int edad;
						int sala;
						String duracion;
						int id_categoria;
						System.out.printf("escribe el id de la pelicula(solo numeros): ");
						id = scanner.nextInt();
						scanner.nextLine();
						System.out.println("escribe el nombre de la pelicula: ");
						nombre= scanner.nextLine();
						scanner.nextLine();
						System.out.println("Escribe la edad recomentada para la cinta(solo numero): ");
						edad= scanner.nextInt();
						scanner.nextLine();
						System.out.println("Escribe el numero de la sala en la que se va a ver la pelicula: ");
						sala= scanner.nextInt();
						scanner.nextLine();
						System.out.println("Escribe el la duracion de la pelicula: ");
						duracion = scanner.nextLine();
						scanner.nextLine();
						System.out.println("1_accion");
						System.out.println("2_comedia");
						System.out.println("3_drama");
						System.out.printf("4_terror");
						System.out.printf("5_ciencia ficcion");
						System.out.printf("Escribe el id de la categoria a la que pertenece la pelicula: ");
						id_categoria=scanner.nextInt();
						scanner.nextLine();
						// ponemos un try para que si hay in error al meter un dato en la base de datos nos salte
						try {
							String sql = "INSERT INTO peliculas (id_peliculas, nombre_peliculas, edad_recomentada, sala, duracion, id_categoria) " +
						             "VALUES (" + id + ", '" + nombre + "', " + edad + ", " + sala + ", '" + duracion + "', " + id_categoria + ")";
							stmt.executeUpdate(sql);
							System.out.println("Película añadida correctamente.");
						}catch(InputMismatchException e){
							System.out.println("Error: " + e.getMessage());
						}
						break;
					//opcion para borrar una pelicula de la base de datos mediante su id
					case 3:
						int id_borrar;
						System.out.printf("escribe el id de la pelicula que quieras borrar: ");
						id_borrar = scanner.nextInt();
						scanner.nextLine();
						//try para que nos diga si hay un error al ejecutar el borrado
						try {
							String sql =  "DELETE FROM peliculas WHERE id_peliculas = " + id_borrar;
							stmt.executeUpdate(sql);
							System.out.println("Película eliminada correctamente.");
						}catch(InputMismatchException e){
							System.out.println("Error: " + e.getMessage());
						}
						break;
					//opcion para actualizar la pelicula selecionada
					case 4:
						int id_actualizar;
						int sala_actualizar;
						int id_categoria_actualizar;
						System.out.printf("escribe el id de la pelicula que quieras actualizar: ");
						id_actualizar=scanner.nextInt();
						scanner.nextLine();
						System.out.printf("escribe la nueva sala donde se trasnite la pelicula: ");
						sala_actualizar=scanner.nextInt();
						scanner.nextLine();
						System.out.printf("escribe la nueva id de la categoria de la pelicula:");
						id_categoria_actualizar=scanner.nextInt();
						scanner.nextLine();
						//try para comprobar que no ocure ningun error al actualizar una pelicula
						try {
							String sql = "UPDATE peliculas SET sala ="+ sala_actualizar + 
				                     ", id_categoria = " + id_categoria_actualizar +
				                     " WHERE id_peliculas = " + id_actualizar;
							stmt.executeUpdate(sql);
							System.out.println("Película actualizada correctamente.");
						}catch(InputMismatchException e){
							System.out.println("Error: " + e.getMessage());
						}
						break;
					// opcion de salir del programa	
					case 5:
						System.out.println("Saliendo del programa....");
						break;
					//opcion de por defecto
					default:
						System.out.println("opcion no valida");
				}
			}while (opcion != 5);
			//cerramos el escaner y la conexion
			scanner.close();
			conexion.close();
		}catch (SQLException e) {
			System.out.println("Error: " + e.getMessage());
		}
	}
}
