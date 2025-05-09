import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
	String url="jdbc:mysql://localhost:3306/JAVAPOO";
	String usuario="root";
	String contraseña="curso";
	Connection conexion;
	
	public Conexion() {
		 try {
			 Connection conexion = DriverManager.getConnection(url, usuario, contraseña);
			 System.out.println("Conexión establecida correctamente.");
		 }catch(SQLException e) {
			 System.out.println("Error de conexión: " + e.getMessage());
		 }
	}
	public Connection getConexion() {
        return conexion;
	}
}
