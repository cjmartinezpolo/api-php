<!-- HEADER -->

<?php
include_once './View/base/header.php';

include_once './controllers/libro_controller.php';

$controller = new ControllerLibro();

$array = json_decode($controller->libroId());

?>


<div class="container mt-5 ">

    <form action="./router.php?controller=libro&action=update" method="POST" enctype="multipart/form-data">

        <h4 class="mb-3 text-center">Editar Libro</h4>


        <p><strong>Id autor</strong></p>
        <input class="form-control mb-3" type="number" name="id_autor" placeholder="Id autor" value="<?php echo $array->data_fk->id ?>" required>

        <p><strong>Titulo</strong></p>
        <input class="form-control mb-3" type="text" name="titulo" placeholder="Titulo" value="<?php echo $array->titulo ?>" required>


        <strong>
            Fecha Publicacion

        </strong>
        <input class="form-control mb-3" type="date" name="fecha_publicacion" value="<?php echo $array->fecha_publicacion ?>" required>


        <strong>

            Fecha Ingreso
        </strong>

        <input class="form-control mb-3" type="date" name="fecha_ingresoinventario" value="<?php echo explode(' ',$array->fecha_ingreso)[0] ?>" required>


        <p><strong>Cantidad</strong></p>
        <input class="form-control mb-3" type="number" name="cantidad" value="<?php echo $array->cantidad ?>" placeholder="Cantidad" required>

        <p><strong>Precio</strong></p>
        <input class="form-control mb-3" type="number" name="precio" value="<?php echo $array->precio ?>" placeholder="Precio" required>

        <p><strong>Editorial</strong></p>
        <input class="form-control mb-3" type="text" name="editorial" value="<?php echo $array->editorial ?>" placeholder="Editorial" required>

        <p><strong>Correo Electronico</strong></p>
        <input class="form-control mb-3" type="email" name="email" placeholder="Correo Electronico" value="<?php echo $array->email ?>" required>

        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

        <br>

        <input type="submit" name="guardar" value="Editar Libro" class="btn btn-primary my-2">
    </form>

</div>


<!-- FOOTER -->

<?php include_once './View/base/footer.php'; ?>