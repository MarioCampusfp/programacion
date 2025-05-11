package controlador;

import modelo.Cliente;
import vista.VistaCliente;
import modelo.ClienteDAO;
import java.util.List;

public class ClienteControlador {
    private final ClienteDAO dao;
    private final VistaCliente vista;

    public ClienteControlador() {
        this.dao = new ClienteDAO();
        this.vista = new VistaCliente();
    }

    public void gestionar() {
        int opcion;
        do {
            opcion = vista.mostrarMenu();
            switch (opcion) {
                case 1 -> {
                    Cliente nuevo = pedirDatosCliente();
                    dao.insertar(nuevo);
                }
                case 2 -> {
                    List<Cliente> clientes = dao.obtenerTodos();
                    vista.mostrarClientes(clientes);
                }
                case 3 -> {
                    int idActualizar = vista.leerId();
                    Cliente actualizado = pedirDatosCliente();
                    actualizado.setIdCliente(idActualizar);
                    dao.actualizar(actualizado);
                }
                case 4 -> {
                    int idEliminar = vista.leerId();
                    dao.eliminar(idEliminar);
                }
                case 0 -> vista.mostrarMensaje("Volviendo al menú principal...");
                default -> vista.mostrarMensaje("Opción no válida.");
            }
        } while (opcion != 0);
    }

    private Cliente pedirDatosCliente() {
        String nombre = vista.leerNombre();
        String email = vista.leerEmail();
        String telefono = vista.leerTelefono();
        return new Cliente(nombre, email, telefono);
    }
}