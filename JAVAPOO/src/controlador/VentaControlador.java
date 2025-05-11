package controlador;

import modelo.Venta;
import modelo.VentaDAO;
import modelo.VentaInforme;
import vista.VentaView; 
import java.util.List;
import java.time.LocalDate;

public class VentaControlador {
    VentaDAO ventaDAO;
    VentaView ventaView;

    public VentaControlador() {
        this.ventaDAO = new VentaDAO();
        this.ventaView = new VentaView();
    }

    public void gestionar() {
        int opcion;
        do {
            opcion = ventaView.mostrarMenu();
            switch (opcion) {
                case 1:
                    Venta nuevaVenta = pedirDatosVenta();
                    crearVenta(nuevaVenta);
                    ventaView.mostrarMensaje("Venta creada correctamente.");
                    break;
                case 2:
                    List<Venta> ventas = listarVentas();
                    ventaView.mostrarVentas(ventas);
                    break;
                case 3:
                    int idActualizar = ventaView.leerId();
                    Venta ventaActualizar = pedirDatosVenta();
                    ventaActualizar.setIdVenta(idActualizar);
                    actualizarVenta(ventaActualizar);
                    ventaView.mostrarMensaje("Venta actualizada correctamente.");
                    break;
                case 4:
                    int idEliminar = ventaView.leerId();
                    eliminarVenta(idEliminar);
                    ventaView.mostrarMensaje("Venta eliminada correctamente.");
                    break;
                case 5:
                    int idCliente = ventaView.leerIdCliente();
                    generarInformeVentasPorCliente(idCliente);
                    break;
                case 0:
                    ventaView.mostrarMensaje("Volviendo al menú principal...");
                    break;
                default:
                    ventaView.mostrarMensaje("Opción no válida.");
            }
        } while (opcion != 0);
    }
    
    private Venta pedirDatosVenta() {
        int idCliente = ventaView.leerIdCliente();
        int idArticulo = ventaView.leerIdArticulo();
        int cantidad = ventaView.leerCantidad();
        String fechaVentaStr = ventaView.leerFechaVenta();
        
        LocalDate fechaVenta = LocalDate.parse(fechaVentaStr);  

        return new Venta(idCliente, idArticulo, cantidad, fechaVenta);
    }

    public void crearVenta(Venta venta) {
        ventaDAO.insertar(venta);
    }

    public List<Venta> listarVentas() {
        return ventaDAO.obtenerTodos();
    }

    public void actualizarVenta(Venta venta) {
        ventaDAO.actualizar(venta);
    }

    public void eliminarVenta(int id) {
        ventaDAO.eliminar(id);
    }

    public void generarInformeVentasPorCliente(int idCliente) {
        List<VentaInforme> informe = ventaDAO.generarInformePorCliente(idCliente);
        
        for (VentaInforme venta : informe) {
            System.out.printf("%s | %d uds | %s | %.2f €%n", 
                              venta.getArticulo(), venta.getCantidad(), 
                              venta.getFechaVenta(), venta.getTotal());
        }
    }
}
