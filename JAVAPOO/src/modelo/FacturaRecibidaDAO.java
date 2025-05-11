package modelo;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class FacturaRecibidaDAO {
    public void insertar(FacturaRecibida f) {
        String sql = "INSERT INTO Facturas_Recibidas (id_proveedor, fecha, total) VALUES (?, ?, ?)";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, f.getIdProveedor());
            stmt.setDate(2, Date.valueOf(f.getFecha()));
            stmt.setDouble(3, f.getTotal());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public List<FacturaRecibida> obtenerTodos() {
        List<FacturaRecibida> lista = new ArrayList<>();
        String sql = "SELECT * FROM Facturas_Recibidas";

        try (Connection conn = Conexion.getConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                lista.add(new FacturaRecibida(
                    rs.getInt("id_factura"),
                    rs.getInt("id_proveedor"),
                    rs.getDate("fecha").toLocalDate(),
                    rs.getDouble("total")
                ));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return lista;
    }

    public void actualizar(FacturaRecibida f) {
        String sql = "UPDATE Facturas_Recibidas SET id_proveedor=?, fecha=?, total=? WHERE id_factura=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, f.getIdProveedor());
            stmt.setDate(2, Date.valueOf(f.getFecha()));
            stmt.setDouble(3, f.getTotal());
            stmt.setInt(4, f.getIdFactura());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminar(int id) {
        String sql = "DELETE FROM Facturas_Recibidas WHERE id_factura=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}