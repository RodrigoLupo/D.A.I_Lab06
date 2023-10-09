<?php
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtStock"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDescripcion"];
$precio = $_POST["txtPrecio"];
date_default_timezone_set("America/Lima");
$fecha_ingreso = date("y-m-d");
$stock = $_POST["txtStock"];


$sentencia = $bd->prepare("INSERT INTO producto(nombre,descripcion,precio,stock, fecha_ingreso) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $stock, $fecha_ingreso]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>