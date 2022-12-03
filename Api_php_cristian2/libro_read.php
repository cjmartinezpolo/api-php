

<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->

  <div class="container mt-5 d-flex justify-content-end">

    <a href="./libro_create.php"
     class="btn btn-primary">Crear Libro</a>
  </div>
  
  <h1 class="text-center display-4">Tabla Libro</h1>

  <div class="container-fluid d-flex justify-content-center my-5">


    <table class="table text-center">
        <thead class="table-dark">

            <tr>
                <th scope="col">N</th>
                <th scope="col">ID LIBRO</th>
                <th scope="col">TITULO</th>
                <th scope="col">ID AUTOR</th>
                <th scope="col">FECHA PUBLICACION</th>
                
                <th scope="col">FECHA INGRESO</th>
                
                <th scope="col">CANTIDAD</th>
                <th scope="col">PRECIO</th>
                <th scope="col">EDITORIAL</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody id="table">

        <?php

include_once "./controllers/libro_controller.php";

$actas = new ControllerLibro();

$array =json_decode($actas->Read());
#var_dump( $array[0]->id_autor) ;

$j = 1;

#var_dump($array[0]);


for ($i=0; $i <  count($array[0]); $i++) { 
    echo 
    "<tr><td>" . $j . "</td>"

    . "<td>" . $array[0][$i]->id_libro . "</td>"

    . "<td>" . $array[0][$i]->titulo . "</td>"
    . "<td>" . $array[0][$i]->data_fk->id . "</td>"
    . "<td>" . $array[0][$i]->fecha_publicacion . "</td>"
    
    . "<td>" . $array[0][$i]->fecha_ingreso . "</td>"
    
    . "<td>" . $array[0][$i]->cantidad . "</td>"

    . "<td>" . $array[0][$i]->precio . "</td>"

    . "<td>" . $array[0][$i]->editorial . "</td>"

    . "<td>" . $array[0][$i]->email . "</td>"

    . "<td>
     <div class='d-flex justify-content-center'>

    <a href='./libro_delete.php?id=" .$array[0][$i]->id_libro."' class='btn btn-danger mx-2'>ELIMINAR</a> 

    <a href='./libro_update.php?id=". $array[0][$i]->id_libro."' class='btn btn-primary mx-2' > EDITAR</a>
  
    </div>
    </td></tr>";
    $j++;
}
   

    
?>

        </tbody>
    </table>
    </div>

  
     <!-- Inicio Modal Agregar -->
     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Acta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <form action="./router.php?controller=actas&action=create" method="post">
                  
                    <input class="form-control mb-3" type="text" name="tema" placeholder="Tema" required>

                    <input class="form-control mb-3" type="text" name="citada_por" placeholder="citada por" required>

                    <label for="">
                Hora Inicio
                <input class="form-control mb-3" type="time" name="hora_inicio" required>
            </label>

            <label for="">
                Hora Fin
                <input class="form-control mb-3" type="time" name="hora_fin" required>
            </label>

            <label for="">
                Fecha
                <input class="form-control mb-3" type="date" name="fecha" required>
            </label>

            <input class="form-control mb-3" type="text" name="presidente" placeholder="Presidente de la Reunion" required>

            <input class="form-control mb-3" type="text" name="lugar" placeholder="Lugar" required>

            <input class="form-control mb-3" type="text" name="ordendia" placeholder="Orden del Dia" required>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <input name="btn" value="Guardar" type="submit" data-bs-dismiss="modal" class="btn btn-primary">
                </div>
    <!-- Fin Modal Editar -->
    </form> 


<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>