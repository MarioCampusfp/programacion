package modelo;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class VentaDAO {

    public void insertar(Venta v) {
        String sql = "INSERT INTO Ventas (id_cliente, id_articulo, cantidad, fecha_venta) VALUES (?, ?, ?, ?)";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, v.getIdCliente());
            stmt.setInt(2, v.getIdArticulo());
            stmt.setInt(3, v.getCantidad());
            stmt.setDate(4, Date.valueOf(v.getFechaVenta()));
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // Método para generar informe de ventas por cliente
    public List<VentaInforme> generarInformePorCliente(int idCliente) {
        String sql = """
            SELECT c.nombre AS cliente, a.nombre AS articulo, v.cantidad, v.fecha_venta, 
                   (a.precio_unitario * v.cantidad) AS total
            FROM Ventas v
            JOIN Clientes c ON v.id_cliente = c.id_cliente
            JOIN Articulos a ON v.id_articulo = a.id_articulo
            WHERE v.id_cliente = ?
        """;

        List<VentaInforme> informe = new ArrayList<>();
        double totalGastado = 0;

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, idCliente);
            ResultSet rs = stmt.executeQuery();

            while (rs.next()) {
                String articulo = rs.getString("articulo");
                int cantidad = rs.getInt("cantidad");
                Date fecha = rs.getDate("fecha_venta");
                double total = rs.getDouble("total");

                // Añadimos cada venta como un objeto VentaInforme a la lista
                informe.add(new VentaInforme(articulo, cantidad, fecha, total));
                totalGastado += total;
            }

            System.out.printf("\nTotal gastado: %.2f €%n", totalGastado);

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return informe;
    }

    public List<Venta> obtenerTodos() {
        List<Venta> lista = new ArrayList<>();
        String sql = "SELECT * FROM Ventas";

        try (Connection conn = Conexion.getConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                lista.add(new Venta(
                    rs.getInt("id_venta"),
                    rs.getInt("id_cliente"),
                    rs.getInt("id_articulo"),
                    rs.getInt("cantidad"),
                    rs.getDate("fecha_venta").toLocalDate()
                ));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return lista;
    }

    public void actualizar(Venta v) {
        String sql = "UPDATE Ventas SET id_cliente=?, id_articulo=?, cantidad=?, fecha_venta=? WHERE id_venta=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, v.getIdCliente());
            stmt.setInt(2, v.getIdArticulo());
            stmt.setInt(3, v.getCantidad());
            stmt.setDate(4, Date.valueOf(v.getFechaVenta()));
            stmt.setInt(5, v.getIdVenta());
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminar(int id) {
        String sql = "DELETE FROM Ventas WHERE id_venta=?";

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setInt(1, id);
            stmt.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}