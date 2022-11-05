<?php
//print_r($_POST);
if (empty($_POST["txtPlaca"]) || empty($_POST["txtMarca"] ) || empty($_POST["txtTipo"] ) || empty($_POST["txtModelo"] ) || empty($_POST["txtColor"] ) ) {
    header('Location: home.php');
    exit();
}

include_once 'conexion.php';
$Placa = $_POST["txtPlaca"];
$Marca = $_POST["txtMarca"];
$Tipo = $_POST["txtTipo"];
$Modelo = $_POST["txtModelo"];
$Color = $_POST["txtColor"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO Autos(Placa,Marca,Tipo,Modelo,Color, id_Cliente) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$Placa, $Marca, $Tipo, $Modelo, $Color, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarAutos.php?codigo='.$codigo);
} 

