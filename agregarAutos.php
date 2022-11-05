<?php include 'template/header.php' ?>

<?php
include_once "conexion.php";
$codigo = $_GET['codigo'];
$sentencia = $bd->prepare("select * from Clientes where id = ?;");
$sentencia->execute([$codigo]);
$Cliente = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia_Auto = $bd->prepare("select * from Autos where id_Cliente = ?;");
$sentencia_Auto->execute([$codigo]);
$Auto = $sentencia_Auto->fetchAll(PDO::FETCH_OBJ); 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrarAutos.php">
                    <div class="mb-3">
                        <label class="form-label">Placa: </label>
                        <input type="text" class="form-control" name="txtPlaca" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca: </label>
                        <input type="text" class="form-control" name="txtMarca" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo: </label>
                        <input type="text"" class="form-control" name="txtTipo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modelo: </label>
                        <input type="text" class="form-control" name="txtModelo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color: </label>
                        <input type="text" class="form-control" name="txtColor" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $Cliente->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lista de Autos Registrados</h5>
                </div>
                <div class="col-12">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Cliente</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Auto as $dato) {
                            ?>
                                <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->Placa; ?></td>
                                <td><?php echo $dato->Marca; ?></td>
                                <td><?php echo $dato->Tipo; ?></td>
                                <td><?php echo $dato->Modelo; ?></td>
                                <td><?php echo $dato->Color; ?></td>
                                <td><?php echo $dato->id_Cliente; ?></td>
                                <td><a class="text-primary" href="agregarTiempo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-clock-history"></i></a></td>
                                <td><a class="text-success" href="editarAuto.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarAuto.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
