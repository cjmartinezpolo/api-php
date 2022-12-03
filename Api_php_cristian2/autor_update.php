<!-- HEADER -->

<?php 
include_once './View/base/header.php';

include_once './controllers/autor_controller.php';

$controller = new ControllerAutor();

$array = json_decode($controller->autorId());


?>



<div class="container mt-5 ">

        <form action="./router.php?controller=autor&action=update" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center">Editar Autor</h4>

            <p><strong>Nombre</strong></p>
            <input class="form-control mb-3" type="text" name="nombre" placeholder="Nombre Autor" value="<?php echo $array->nombre ?>" required>

            <p><strong>Apellido</strong></p>
            <input class="form-control mb-3" type="text" name="apellido" placeholder="Apellido Autor" value="<?php echo $array->apellido ?>" required>

            <label for="">
                Fecha Nacimiento
                <input class="form-control mb-3" type="date" name="fecha_nacimiento" value="<?php echo $array->fecha_nacimiento ?>" required>
            </label>

            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

      <br>

            <input  type="submit" name="guardar" value="guardar" class="btn btn-primary my-2">       
        </form>

    </div>


<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>