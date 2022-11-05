<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: home.php?mensaje=error');
    }
    
    include 'conexion.php';
    $codigo = $_POST['codigo'];
    $Entrega = $_POST["txtEntrega"];
    $Devolucion = $_POST["txtDevolucion"];

    $sentencia = $bd->prepare("UPDATE Tiempo_Alquiler SET Entrega = ?, Devolucion = ?  where id = ?;");
    $resultado = $sentencia->execute([$Entrega, $Devolucion, $codigo]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=editado');
    } else {
        header('Location: home.php?mensaje=error');
        exit();
    }