<?php
if (empty($_POST["txtEntrega"]) || empty($_POST["txtDevolucion"] ) ) {
    header('Location: home.php');
    exit();
}

include_once 'conexion.php';
$Entrega = $_POST["txtEntrega"];
$Devolucion = $_POST["txtDevolucion"];
$id_Cliente = $_POST["codigoCliente"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO Tiempo_Alquiler(Entrega,Devolucion,id_Auto,id_Cliente) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$Entrega, $Devolucion, $codigo, $id_Cliente ]);

if ($resultado === TRUE) {
    header('Location: agregarTiempo.php?codigo='.$codigo);
} 