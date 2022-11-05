<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido_paterno"]) || empty($_POST["txtApellido_Materno"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"])) {
    header('Location: home.php?mensaje=falta');
    exit();
}

include_once 'conexion.php';
$Nombre = $_POST["txtNombre"];
$Apellido_paterno = $_POST["txtApellido_paterno"];
$Apellido_Materno = $_POST["txtApellido_Materno"];
$Telefono = $_POST["txtTelefono"];
$Direccion = $_POST["txtDireccion"];


$sentencia = $bd->prepare("INSERT INTO Clientes(Nombre,Apellido_paterno,Apellido_Materno,Telefono,Direccion) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$Nombre, $Apellido_paterno, $Apellido_Materno, $Telefono, $Direccion]);

if ($resultado === TRUE) {
    header('Location: home.php?mensaje=registrado');
} else {
    header('Location: home.php?mensaje=error');
    exit();
}

?>