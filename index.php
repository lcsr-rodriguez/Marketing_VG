<?php include("config/database.php"); ?>

<?php include("views/header.php"); ?>

<body>

<?php include("views/navigation.php"); ?>

<!-- Main -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 col-sm-12">
        <?php if(isset($_SESSION['message_alert'])):  ?>
            <div class="alert alert-<?= $_SESSION['color_alert']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message_alert'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_destroy(); endif; ?>

            <div class="card card-body">
            <!-- Form -->
                <form action="core/create.php" method="post">
                    <label for="empresa">Empresa :</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="nombre" id="empresa" autofocus class="form-control" autofocus placeholder="Ingresa la empresa o negocio"> 
                        </div> 
                    </div>
                    <label for="representante">Representante</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                            </div>
                            <input type="text" name="representante" id="representante" class="form-control" placeholder="Ingresa el nombre del representante"> 
                        </div>
                    </div>
                    <label for="tipoplan">Elige la forma de pago</label>
                    <div class="form-group">
                        <!--<div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                            </div> -->
                            <select name="id_plan" id="plan" class="browser-default custom-select">
                                <option value="1">MENSUALMENTE</option>
                                <option value="2">UN SÓLO PAGO</option>
                                <option value="3">SEMANAL</option>
                                <option value="3">1 AÑO </option>
                            </select>
                        <!--</div> -->
                    </div> 
                    <label for="empresa">Precio :</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-money"></i></span>
                            </div>
                            <input type="number" name="precio" id="empresa" class="form-control" placeholder="Cantidad de dinero COP"> 
                        </div> 
                    </div> 
                    <input type="submit" value="Guardar" name="btnGuardar" class="btn btn-success btn-block">
                </form> 
                <!-- End Form -->
            </div> 
        </div>
        <div class="col-md-8 col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>EMPRESA</th> 
                        <th>REPRESENTANTE</th>
                        <th>ESTADO</th> 
                        <th>PRECIO</th>  
                        <th>Actions</th> 
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                        $query = "SELECT * FROM empresa"; 
                        $response = $connection->query($query);
                           
                        while($row = $response->fetch_assoc()):?>
                        <?php $estado = ($row['estado']==1) ? "PAGADO" : "PENDIENTE"; ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td> 
                                <td><?php echo $row['representante'] ?></td>
                                <td><?php echo $estado ?></td>
                                <td><b>$ </b><?php echo $row['precio'] ?></td>
                                <td>
                                    <a href="core/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-edit text-white"></i>
                                    </a>
                                    <a href="core/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; 
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>

</body>
</html>