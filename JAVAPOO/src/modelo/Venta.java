package modelo;
import java.time.LocalDate;

public class Venta {
    private int idVenta;
    private int idCliente;
    private int idArticulo;
    private int cantidad;
    private LocalDate fechaVenta;

    public Venta(int idCliente, int idArticulo, int cantidad, LocalDate fechaVenta) {
        this.idCliente = idCliente;
        this.idArticulo = idArticulo;
        this.cantidad = cantidad;
        this.fechaVenta = fechaVenta;
    }

    public Venta(int idVenta, int idCliente, int idArticulo, int cantidad, LocalDate fechaVenta) {
        this.idVenta = idVenta;
        this.idCliente = idCliente;
        this.idArticulo = idArticulo;
        this.cantidad = cantidad;
        this.fechaVenta = fechaVenta;
    }

    public int getIdVenta() { return idVenta; }
    public void setIdVenta(int idVenta) { this.idVenta = idVenta; }

    public int getIdCliente() { return idCliente; }
    public void setIdCliente(int idCliente) { this.idCliente = idCliente; }

    public int getIdArticulo() { return idArticulo; }
    public void setIdArticulo(int idArticulo) { this.idArticulo = idArticulo; }

    public int getCantidad() { return cantidad; }
    public void setCantidad(int cantidad) { this.cantidad = cantidad; }

    public LocalDate getFechaVenta() { return fechaVenta; }
    public void setFechaVenta(LocalDate fechaVenta) { this.fechaVenta = fechaVenta; }
}

