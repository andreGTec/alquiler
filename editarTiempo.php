<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Tiempo_Alquiler where id = ?;");
    $sentencia->execute([$codigo]);
    $Tiempo = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProcesoTiempo.php">
                    <div class="mb-3">
                    <label class="form-label">Entrega: </label>
                        <input type="date" class="form-control" name="txtEntrega"  autofocus required 
                        value="<?php echo $Tiempo->Entrega; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Devolucion: </label>
                        <input type="date" class="form-control" name="txtDevolucion" autofocus required
                        value="<?php echo $Tiempo->Devolucion; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $Tiempo->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>