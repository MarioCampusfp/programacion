package modelo;
import java.time.LocalDate;

public class FacturaRecibida {
	int idFactura;
    int idProveedor;
    LocalDate fecha;
    double total;

    public FacturaRecibida(int idProveedor, LocalDate fecha, double total) {
        this.idProveedor = idProveedor;
        this.fecha = fecha;
        this.total = total;
    }
    
    public FacturaRecibida(int idFactura, int idProveedor, LocalDate fecha, double total) {
        this.idFactura = idFactura;
        this.idProveedor = idProveedor;
        this.fecha = fecha;
        this.total = total;
    }

    public int getIdFactura() { return idFactura; }
    public void setIdFactura(int idFactura) { this.idFactura = idFactura; }

    public int getIdProveedor() { return idProveedor; }
    public void setIdProveedor(int idProveedor) { this.idProveedor = idProveedor; }

    public LocalDate getFecha() { return fecha; }
    public void setFecha(LocalDate fecha) { this.fecha = fecha; }

    public double getTotal() { return total; }
    public void setTotal(double total) { this.total = total; }
}
