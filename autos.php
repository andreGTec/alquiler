<?php include 'template/header.php' ?>
<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link" href="home.php">Home</a>
    <a class="flex-sm-fill text-sm-center nav-link active" href="autos.php">Autos</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="registro.php">Registrar</a>
</nav>
<?php
    include_once "conexion.php";
    $sentencia = $bd -> query("Select * from Clientes cl, Autos a, Tiempo_Alquiler tl where cl.id = a.id_Cliente and cl.id = tl.id_Cliente;");
    $Autos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- fin alerta -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lista de Autos</h5>
                </div>
                <div class="p-4">
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
                                <th scope="col">Fecha Entrega</th>
                                <th scope="col">Fecha Devolucion</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($Autos as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->Placa; ?></td>
                                <td><?php echo $dato->Marca; ?></td>
                                <td><?php echo $dato->Tipo; ?></td>
                                <td><?php echo $dato->Modelo; ?></td>
                                <td><?php echo $dato->Color; ?></td>
                                <td><?php echo $dato->Nombre; ?></td>
                                <td><?php echo $dato->Entrega; ?></td>
                                <td><?php echo $dato->Devolucion; ?></td>
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