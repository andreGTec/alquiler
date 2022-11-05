<?php include 'template/header.php' ?>

<?php
include_once "conexion.php";
$codigo = $_GET['codigo'];
$sentencia = $bd->prepare("select * from Autos where id = ?;");
$sentencia->execute([$codigo]);
$Auto = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia_Auto = $bd->prepare("select * from Tiempo_Alquiler where id_Auto = ?;");
$sentencia_Auto->execute([$codigo]);
$Tiempo = $sentencia_Auto->fetchAll(PDO::FETCH_OBJ); 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrarTiempo.php">
                    <div class="mb-3">
                        <label class="form-label">Entrega: </label>
                        <input type="date" class="form-control" name="txtEntrega" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Devolucion: </label>
                        <input type="date" class="form-control" name="txtDevolucion" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $Auto->id; ?>"><P></P>
                    <input type="hidden" name="codigoCliente" value="<?php echo $Auto->id_Cliente; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Tiempo</h5>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Entrega</th>
                                <th scope="col">Devolucion</th>
                                <th scope="col">Auto</th>
                                <th scope="col">Cliente</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Tiempo as $dato) {
                            ?>
                                <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->Entrega; ?></td>
                                <td><?php echo $dato->Devolucion; ?></td>
                                <td><?php echo $dato->id_Auto; ?></td>
                                <td><?php echo $dato->id_Cliente; ?></td>
                                <td><a class="text-primary" href="Alerta.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-exclamation-triangle-fill"</i></a></td>
                                <td><a class="text-success" href="editarTiempo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarTiempo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
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

