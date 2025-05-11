package controlador;

import modelo.FacturaRecibida;
import modelo.FacturaRecibidaDAO;
import vista.FacturaView;
import java.time.LocalDate;
import java.util.List;

public class FacturaControlador {
    FacturaRecibidaDAO facturaDAO;
    FacturaRecibidaDAO dao = new FacturaRecibidaDAO();
    FacturaView vista = new FacturaView();

    public void gestionar() {
        int opcion;
        do {
            opcion = vista.mostrarMenu();
            switch (opcion) {
                case 1:
                    FacturaRecibida nueva = pedirDatosFactura();
                    dao.insertar(nueva);
                    break;
                case 2:
                    List<FacturaRecibida> facturas = dao.obtenerTodos();
                    vista.mostrarFacturas(facturas);
                    break;
                case 3:
                    int idActualizar = vista.leerId();
                    FacturaRecibida actualizada = pedirDatosFactura();
                    actualizada.setIdFactura(idActualizar);
                    dao.actualizar(actualizada);
                    break;
                case 4:
                    int idEliminar = vista.leerId();
                    dao.eliminar(idEliminar);
                    break;
                case 0:
                    vista.mostrarMensaje("Volviendo al menú principal...");
                    break;
                default:
                    vista.mostrarMensaje("Opción no válida.");
            }
        } while (opcion != 0);
    }
    
    private FacturaRecibida pedirDatosFactura() {
        int idProveedor = vista.leerIdProveedor();
        LocalDate fecha = vista.leerFecha();
        double total = vista.leerTotal();
        return new FacturaRecibida(idProveedor, fecha, total);
    }
    
    public FacturaControlador() {
        this.facturaDAO = new FacturaRecibidaDAO();
    }

    public void crearFactura(FacturaRecibida factura) {
        facturaDAO.insertar(factura);
    }

    public List<FacturaRecibida> listarFacturas() {
        return facturaDAO.obtenerTodos();
    }

    public void actualizarFactura(FacturaRecibida factura) {
        facturaDAO.actualizar(factura);
    }

    public void eliminarFactura(int id) {
        facturaDAO.eliminar(id);
    }
}
