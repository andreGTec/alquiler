<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Clientes where id = ?;");
    $sentencia->execute([$codigo]);
    $Cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $Cliente->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido_paterno: </label>
                        <input type="text" class="form-control" name="txtApellido_paterno" autofocus required
                        value="<?php echo $Cliente->Apellido_paterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido_Materno: </label>
                        <input type="text" class="form-control" name="txtApellido_Materno" autofocus required
                        value="<?php echo $Cliente->Apellido_Materno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtTelefono" autofocus required
                        value="<?php echo $Cliente->Telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $Cliente->Direccion; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $Cliente->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>