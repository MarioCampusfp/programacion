package modelo;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
	static final String URL = "jdbc:mysql://localhost:3306/javapoo";
    static final String USUARIO = "root";
    static final String CLAVE = "curso";

    public static Connection getConexion() throws SQLException {
        return DriverManager.getConnection(URL, USUARIO, CLAVE);
    }
}
