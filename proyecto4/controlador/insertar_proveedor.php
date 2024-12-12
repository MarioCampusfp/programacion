<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['telefono'];
    $stock = $_POST['email'];
    $direccion1= $_POST["direccion"];

    $linea = "$id,$nombre,$precio,$stock\n";
    file_put_contents("../datos/proveedores.csv", $linea, FILE_APPEND);

    header("Location: ../index.php?opcion=proveedores");
    exit();
}
?>
