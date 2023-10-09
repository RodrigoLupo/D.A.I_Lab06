<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }
    
    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = $_POST["txtPrecio"];
    date_default_timezone_set("America/Lima");
    $fecha_ingreso = date("y-m-d");
    $stock = $_POST["txtStock"];
    
    
    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?,descripcion = ?,precio = ?,stock = ?, fecha_ingreso =? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $descripcion, $precio, $stock, $fecha_ingreso, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
