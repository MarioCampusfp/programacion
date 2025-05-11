package modelo;

public class Articulo {
	int idArticulo;
	String nombre;
	double precioUnitario;
	int stock;
	
	public Articulo(String nombre, double precioUnitario, int stock) {
	    this.nombre = nombre;
	    this.precioUnitario = precioUnitario;
	    this.stock = stock;
	}
	
	public Articulo(int idArticulo, String nombre, double precioUnitario, int stock) {
        this.idArticulo = idArticulo;
        this.nombre = nombre;
        this.precioUnitario = precioUnitario;
        this.stock = stock;
    }
	public int getIdArticulo() { return idArticulo; }
    public void setIdArticulo(int idArticulo) { this.idArticulo = idArticulo; }

    public String getNombre() { return nombre; }
    public void setNombre(String nombre) { this.nombre = nombre; }

    public double getPrecioUnitario() { return precioUnitario; }
    public void setPrecioUnitario(double precioUnitario) { this.precioUnitario = precioUnitario; }

    public int getStock() { return stock; }
    public void setStock(int stock) { this.stock = stock; }
}
