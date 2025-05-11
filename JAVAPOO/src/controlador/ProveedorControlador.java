package controlador;

import modelo.Provedores;
import vista.ProveedorView;
import modelo.ProveedorDAO;
import java.util.List;

public class ProveedorControlador {
	ProveedorDAO dao = new ProveedorDAO();
	ProveedorView vista = new ProveedorView();
	
	public void gestionar() {
        int opcion;
        do {
            opcion = vista.mostrarMenu();
            switch (opcion) {
                case 1:
                	Provedores nuevo = pedirDatosProveedor();
                    dao.insertar(nuevo);
                    break;
                case 2:
                    List<Provedores> proveedores = dao.obtenerTodos();
                    vista.mostrarProveedores(proveedores);
                    break;
                case 3:
                    int idActualizar = vista.leerId();
                    Provedores actualizado = pedirDatosProveedor();
                    actualizado.setIdProveedor(idActualizar);
                    dao.actualizar(actualizado);
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
	
	Provedores pedirDatosProveedor() {
	    String nombre = vista.leerNombre();
	    String telefono = vista.leerTelefono();  
	    return new Provedores(nombre, telefono); 
	}
	
    public void crearProveedor(Provedores proveedor) {
    	dao.insertar(proveedor);
    }

    public List<Provedores> listarProveedores() {
        return dao.obtenerTodos();
    }

    public void actualizarProveedor(Provedores proveedor) {
    	dao.actualizar(proveedor);
    }

    public void eliminarProveedor(int id) {
    	dao.eliminar(id);
    }
}

