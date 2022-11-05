<?php include 'template/header.php' ?>
<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link active" href="home.php">Home</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="autos.php">Autos</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="registro.php">Registrar</a>
</nav>

<?php
    include_once "conexion.php";
    $sentencia = $bd -> query("Select * from Clientes cl, Autos a, Tiempo_Alquiler tl where cl.id = a.id_Cliente and cl.id = tl.id_Cliente;");
    $Cliente = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Auto</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Fecha Entrega</th>
                                <th scope="col">Promo</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($Cliente as $dato){ 
                            ?>

                            <tr>
                            <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->Nombre; ?></td>
                                <td><?php echo $dato->Apellido_paterno; ?></td>
                                <td><?php echo $dato->Apellido_Materno; ?></td>
                                <td><?php echo $dato->Telefono; ?></td>
                                <td><?php echo $dato->Direccion; ?></td>
                                <td><?php echo $dato->Marca; ?></td>
                                <td><?php echo $dato->Placa; ?></td>
                                <td><?php echo $dato->Entrega; ?></td>
                                <td><a class="text-primary" href="promo.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-newspaper"></i></a></td>
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