package modelo;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ArticuloDAO {
    public void insertar(Articulo a) {
        String sql = "INSERT INTO Articulos (nombre, precio_unitario, stock) VALUES (?, ?, ?)";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, a.getNombre());
            stmt.setDouble(2, a.getPrecioUnitario());
            stmt.setInt(3, a.getStock());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public List<Articulo> obtenerTodos() {
        List<Articulo> lista = new ArrayList<>();
        String sql = "SELECT * FROM Articulos";

        try (Connection conn = Conexion.getConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                lista.add(new Articulo(
                    rs.getInt("id_articulo"),
                    rs.getString("nombre"),
                    rs.getDouble("precio_unitario"),
                    rs.getInt("stock")
                ));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return lista;
    }

    public void actualizar(Articulo a) {
        String sql = "UPDATE Articulos SET nombre=?, precio_unitario=?, stock=? WHERE id_articulo=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, a.getNombre());
            stmt.setDouble(2, a.getPrecioUnitario());
            stmt.setInt(3, a.getStock());
            stmt.setInt(4, a.getIdArticulo());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminar(int id) {
        String sql = "DELETE FROM Articulos WHERE id_articulo=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}