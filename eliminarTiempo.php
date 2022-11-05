<?php 
    if(!isset($_GET['codigo'])){
        header('Location: home.php?mensaje=error');
        exit();
    }
    
    include 'conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM Tiempo_Alquiler where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=eliminado');
    } else {
        header('Location: home.php?mensaje=error');
    }
    
?>