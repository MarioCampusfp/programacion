package modelo;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ProveedorDAO {
    public void insertar(Provedores p) {
        String sql = "INSERT INTO Proveedores (nombre, cif, telefono) VALUES (?, ?, ?)";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, p.getNombre());
            stmt.setString(2, p.getCif());
            stmt.setString(3, p.getTelefono());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public List<Provedores> obtenerTodos() {
        List<Provedores> lista = new ArrayList<>();
        String sql = "SELECT * FROM Proveedores";

        try (Connection conn = Conexion.getConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                lista.add(new Provedores(
                    rs.getInt("id_proveedor"),
                    rs.getString("nombre"),
                    rs.getString("cif"),
                    rs.getString("telefono")
                ));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return lista;
    }

    public void actualizar(Provedores p) {
        String sql = "UPDATE Proveedores SET nombre=?, cif=?, telefono=? WHERE id_proveedor=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, p.getNombre());
            stmt.setString(2, p.getCif());
            stmt.setString(3, p.getTelefono());
            stmt.setInt(4, p.getIdProveedor());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminar(int id) {
        String sql = "DELETE FROM Proveedores WHERE id_proveedor=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}

