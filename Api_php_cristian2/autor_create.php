
<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->


    <div class="container mt-5 ">
        
  

        <form action="./router.php?controller=autor&action=create" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center">Crear Autor</h4>

            <p><strong>Nombre</strong></p>
            <input class="form-control mb-3" type="text" name="nombre" placeholder="Nombre Autor"  required>

            <p><strong>Apellido</strong></p>
            <input class="form-control mb-3" type="text" name="apellido" placeholder="Apellido Autor"  required>

            <label for="">
                Fecha Nacimiento
                <input class="form-control mb-3" type="date" name="fecha_nacimiento" required>
            </label>

      <br>

            <input  type="submit" name="guardar" value="guardar" class="btn btn-primary my-2">       
        </form>

    </div>

<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>