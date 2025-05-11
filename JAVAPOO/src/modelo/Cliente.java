package modelo;

public class Cliente {
	int idCliente;
	String nombre;
	String email;
	String telefono;
	
	 public Cliente(String nombre, String email, String telefono) {
	        this.nombre = nombre;
	        this.email = email;
	        this.telefono = telefono;
	 }
	
	public Cliente(int idCliente, String nombre, String email, String telefono) {
        this.idCliente = idCliente;
        this.nombre = nombre;
        this.email = email;
        this.telefono = telefono;
    }
	 public int getIdCliente() { return idCliente; }
	    public void setIdCliente(int idCliente) { this.idCliente = idCliente; }

	    public String getNombre() { return nombre; }
	    public void setNombre(String nombre) { this.nombre = nombre; }

	    public String getEmail() { return email; }
	    public void setEmail(String email) { this.email = email; }

	    public String getTelefono() { return telefono; }
	    public void setTelefono(String telefono) { this.telefono = telefono; }
}
