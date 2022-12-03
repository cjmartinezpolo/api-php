
<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->


    <div class="container mt-5 ">
        
  

        <form action="./router.php?controller=libro&action=create" method="POST" enctype="multipart/form-data">

            <h4 class="mb-3 text-center display-4">Crear Libro</h4>


            <input class="form-control mb-3" type="number" name="id_autor"  placeholder="Id autor" required>

            <input class="form-control mb-3" type="text" name="titulo"  placeholder="Titulo" required>

   
              <strong>
                  Fecha Publicacion
                
                </strong>  
                <input class="form-control mb-3" type="date" name="fecha_publicacion" required>
        
                        
            <strong>

                Fecha Ingreso
            </strong>

                <input class="form-control mb-3" type="date" name="fecha_ingresoinventario" required>
          

            <input class="form-control mb-3" type="number" name="cantidad" placeholder="Cantidad" required>

            <input class="form-control mb-3" type="number" name="precio" placeholder="Precio" required>

            <input class="form-control mb-3" type="text" name="editorial" placeholder="Editorial"  required>
            
            <input class="form-control mb-3" type="email" name="email"  placeholder="Correo Electronico" required>

            <input  type="submit" name="guardar" value="Crear" class="btn btn-primary my-2">       
        </form>

    </div>

<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>