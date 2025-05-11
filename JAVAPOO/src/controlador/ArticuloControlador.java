package controlador;

import modelo.Articulo;
import modelo.ArticuloDAO;
import vista.ArticuloView;
import java.util.List;

public class ArticuloControlador {
	private final ArticuloDAO dao = new ArticuloDAO();
    private final ArticuloView vista = new ArticuloView();

    public void gestionar() {
        int opcion;
        do {
            opcion = vista.mostrarMenu();
            switch (opcion) {
                case 1:
                    Articulo nuevo = pedirDatosArticulo();
                    dao.insertar(nuevo);
                    break;
                case 2:
                    List<Articulo> articulos = dao.obtenerTodos();
                    vista.mostrarArticulos(articulos);
                    break;
                case 3:
                    int idActualizar = vista.leerId();
                    Articulo actualizado = pedirDatosArticulo();
                    actualizado.setIdArticulo(idActualizar);
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

    private Articulo pedirDatosArticulo() {
        String nombre = vista.leerNombre();
        double precio = vista.leerPrecioUnitario();
        int stock = vista.leerStock();
        return new Articulo(nombre, precio, stock);
    }

    public void crearArticulo(Articulo articulo) {
    	dao.insertar(articulo);
    }

    public List<Articulo> listarArticulos() {
        return dao.obtenerTodos();
    }

    public void actualizarArticulo(Articulo articulo) {
    	dao.actualizar(articulo);
    }

    public void eliminarArticulo(int id) {
    	dao.eliminar(id);
    }
}
