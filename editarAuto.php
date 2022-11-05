<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Autos where id = ?;");
    $sentencia->execute([$codigo]);
    $Auto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProcesoAuto.php">
                    <div class="mb-3">
                    <label class="form-label">Placa: </label>
                        <input type="text" class="form-control" name="txtPlaca"  autofocus required 
                        value="<?php echo $Auto->Placa; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Marca: </label>
                        <input type="text" class="form-control" name="txtMarca" autofocus required
                        value="<?php echo $Auto->Marca; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tipo: </label>
                        <input type="text"" class="form-control" name="txtTipo" autofocus required
                        value="<?php echo $Auto->Tipo; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Modelo: </label>
                        <input type="text" class="form-control" name="txtModelo" autofocus required
                        value="<?php echo $Auto->Modelo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color: </label>
                        <input type="text" class="form-control" name="txtColor" autofocus required
                        value="<?php echo $Auto->Color; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $Auto->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>