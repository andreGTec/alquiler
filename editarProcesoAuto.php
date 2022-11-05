<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: home.php?mensaje=error');
    }
    
    include 'conexion.php';
    $codigo = $_POST['codigo'];
    $Placa = $_POST["txtPlaca"];
    $Marca = $_POST["txtMarca"];
    $Tipo = $_POST["txtTipo"];
    $Modelo = $_POST["txtModelo"];
    $Color = $_POST["txtColor"];

    $sentencia = $bd->prepare("UPDATE Autos SET Placa = ?, Marca = ?, Tipo = ?, Modelo = ?, Color = ? where id = ?;");
    $resultado = $sentencia->execute([$Placa, $Marca, $Tipo, $Modelo, $Color, $codigo]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=editado');
    } else {
        header('Location: home.php?mensaje=error');
        exit();
    }
