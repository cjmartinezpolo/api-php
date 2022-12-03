

<!-- HEADER -->

<?php include_once './View/base/header.php';?>

<!-- CONTENT -->

  <div class="container mt-5 d-flex justify-content-end">

    <a href="./autor_create.php"
     class="btn btn-primary">Agregar Actor</a>
  </div>
  
  <h1 class="text-center display-4">Tabla Actor</h1>

  <div class="container-fluid d-flex justify-content-center my-5">


    <table class="table text-center">
        <thead class="table-dark">

            <tr>
                <th scope="col">N</th>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">FECHA NACIMIENTO</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody id="table">

        <?php

include_once "./controllers/autor_controller.php";

$actas = new ControllerAutor();

$array =json_decode($actas->Read());
#var_dump( $array[0]->id_autor) ;

$j = 1;

for ($i=0; $i <  count($array); $i++) { 
    echo 
    "<tr><td>" . $j . "</td>"

    . "<td>" . $array[$i]->id_autor . "</td>"

    . "<td>" . $array[$i]->nombre . "</td>"
    . "<td>" . $array[$i]->apellido . "</td>"
    . "<td>" . $array[$i]->fecha_nacimiento . "</td>"

    . "<td>
     <div class='d-flex justify-content-center'>

    <a href='./autor_delete.php?id=" .$array[$i]->id_autor."' class='btn btn-danger mx-2'>ELIMINAR</a> 

    <a href='./autor_update.php?id=". $array[$i]->id_autor."' class='btn btn-primary mx-2' > EDITAR</a>
  
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