<!-- HEADER -->

<?php require_once './View/base/header.php';?>


<div class="container-fluid mt-5">

    <h4 class="display-3 text-center mt-3">Reporte por Fecha Ingreso</h4>

        <table class="table table-dark table-striped mt-3">
        <thead>
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
 
            </tr>
          
        </thead>
        <tbody>


        <?php
            require_once './controllers/reporte_controller.php';

            $rep = new ControllerReporte();

            $array = json_decode($rep->generar());

                        
            $j = 1;

            #var_dump($array);


            for ($i=0; $i <  count($array); $i++) { 
                echo 
                "<tr><td>" . $j . "</td>"

                . "<td>" . $array[$i]->id_libro . "</td>"

                . "<td>" . $array[$i]->titulo . "</td>"
                . "<td>" . $array[$i]->id_autor . "</td>"
                . "<td>" . $array[$i]->fecha_publicacion . "</td>"
                
                . "<td>" . $array[$i]->fecha_ingresoinventario . "</td>"
                
                . "<td>" . $array[$i]->cantidad . "</td>"

                . "<td>" . $array[$i]->precio . "</td>"

                . "<td>" . $array[$i]->editorial . "</td>"

                . "<td>" . $array[$i]->email . "</td>
                </tr>";
                $j++;
            }

        ?>

        


        </tbody>
    </table>
</div>






<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>