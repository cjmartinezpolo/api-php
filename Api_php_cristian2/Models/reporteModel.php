<?php

include_once('./Models/connection.php');

class reporteModelo {

    private $table = 'libro';
    


    public function generar(){

        $db = new DATABASE();

        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table inner join autor on $this->table.id_autor = autor.id_autor WHERE fecha_publicacion BETWEEN ? AND ?");


            $sql->execute([
                $_POST['fecha_ini'],
                $_POST['fecha_fin']
            ]);

            $result = $sql->fetchAll(PDO::FETCH_OBJ);
/* 
            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_GET['id'] => "no exite este registro");

                return $res;
            } else {

                //Mostrar lista de post
                $sql = $db->getConnection()->prepare("SELECT * FROM $this->table WHERE ID_LIBRO = ?");
                $sql->execute([$_GET['id']]);

                $dato = $sql->fetch(PDO::FETCH_OBJ);

                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM autor where id_autor= ?");
                $sql1->execute([$dato->id_autor]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);

                $res =  array(
                    'id_libro' =>  $dato->id_libro ,
                    'titulo' =>  $dato->titulo,
                    'fecha_publicacion' =>  $dato->fecha_publicacion,
                    'fecha_ingreso' =>  $dato->fecha_ingresoinventario, 
                    'cantidad' =>  $dato->cantidad,
                    'precio' =>  $dato->precio,
                    'editorial' =>  $dato->editorial,
                    'email' =>  $dato->email, 
                    "data_fk"=> array(
                      'id' =>  $fk->id_autor ,
                      'nombre' =>  $fk->nombre,
                      'apellido' =>  $fk->apellido ,
                      'fecha_nacimiento' =>  $fk->fecha_nacimiento
                    
                    )
                ); */

               
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }


     /*  $sql = mainModel::conectar()->prepare("");
      $sql->bindParam(":a", $fecha_ini);
      $sql->bindParam(":b", $fecha_fin);
      $sql->execute();
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);

      return json_encode($results); */
    }
   

}