package controlador;

import modelo.Conexion;
import vista.InformeView;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class InformeControlador {

    InformeView vista = new InformeView();

    public void generarInforme() {
        vista.mostrarCabecera();

        String sql = """
            SELECT c.nombre AS cliente,
                   a.nombre AS articulo,
                   v.cantidad,
                   v.fecha_venta,
                   (a.precio_unitario * v.cantidad) AS total
            FROM Ventas v
            JOIN Clientes c ON v.id_cliente = c.id_cliente
            JOIN Articulos a ON v.id_articulo = a.id_articulo
            ORDER BY c.nombre, v.fecha_venta;
        """;

        try (Connection conn = Conexion.getConexion();
             PreparedStatement stmt = conn.prepareStatement(sql);
             ResultSet rs = stmt.executeQuery()) {

            String clienteActual = "";
            double totalCliente = 0;

            while (rs.next()) {
                String cliente = rs.getString("cliente");
                String articulo = rs.getString("articulo");
                int cantidad = rs.getInt("cantidad");
                String fecha = rs.getString("fecha_venta");
                double total = rs.getDouble("total");

                if (!cliente.equals(clienteActual)) {
                    if (!clienteActual.isEmpty()) {
                        vista.mostrarLinea("  TOTAL GASTADO: " + totalCliente + " €\n");
                        totalCliente = 0;
                    }
                    vista.mostrarLinea("Cliente: " + cliente);
                    clienteActual = cliente;
                }

                vista.mostrarLinea("  - Artículo: " + articulo + ", Cantidad: " + cantidad +
                        ", Fecha: " + fecha + ", Total: " + total + " €");
                totalCliente += total;
            }

            if (!clienteActual.isEmpty()) {
                vista.mostrarLinea("  TOTAL GASTADO: " + totalCliente + " €\n");
            }

        } catch (SQLException e) {
            vista.mostrarLinea("Error al generar el informe: " + e.getMessage());
        }
    }
}
