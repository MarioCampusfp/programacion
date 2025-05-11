package modelo;

import java.util.Date;

public class VentaInforme {
    private String articulo;
    private int cantidad;
    private Date fechaVenta;
    private double total;

    public VentaInforme(String articulo, int cantidad, Date fechaVenta, double total) {
        this.articulo = articulo;
        this.cantidad = cantidad;
        this.fechaVenta = fechaVenta;
        this.total = total;
    }

    // Getters y setters
    public String getArticulo() {
        return articulo;
    }

    public void setArticulo(String articulo) {
        this.articulo = articulo;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public Date getFechaVenta() {
        return fechaVenta;
    }

    public void setFechaVenta(Date fechaVenta) {
        this.fechaVenta = fechaVenta;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
}