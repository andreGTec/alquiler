<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: home.php?mensaje=error');
    }
    
    include 'conexion.php';
    $codigo = $_POST['codigo'];
    $Nombre = $_POST["txtNombre"];
    $Apellido_paterno = $_POST["txtApellido_paterno"];
    $Apellido_Materno = $_POST["txtApellido_Materno"];
    $Telefono = $_POST["txtTelefono"];
    $Direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare("UPDATE Clientes SET Nombre = ?, Apellido_paterno = ?, Apellido_Materno = ?, Telefono = ?, Direccion = ? where id = ?;");
    $resultado = $sentencia->execute([$Nombre, $Apellido_paterno, $Apellido_Materno, $Telefono, $Direccion, $codigo]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=editado');
    } else {
        header('Location: home.php?mensaje=error');
        exit();
    }
