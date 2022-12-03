<?php


include_once('./Models/connection.php');

class libroModel
{

    //Nombre de la tabla
    private $table = 'libro';


    public function read()
    {

        $db = new DATABASE();

        try {
            $stm = $db->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();

            $res = array();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $key => $dato) {

                $statement = $db->getConnection()->prepare("SELECT * from autor WHERE id_autor = ?");
                $statement->execute([
                    $dato->id_autor
                ]);

                $fk = $statement->fetch(PDO::FETCH_OBJ);

                array_push($res,array(
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
                    ))
                  );
             

                
            }

            return $res;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function create()
    {

        $db = new DATABASE();

        try {

            $stm = $db->getConnection()->prepare("INSERT INTO $this->table
            (TITULO,FECHA_PUBLICACION,FECHA_INGRESOINVENTARIO,CANTIDAD,PRECIO,EDITORIAL,EMAIL,ID_AUTOR) VALUES (?,?,?,?,?,?,?,?)");

            $stm->execute([
                $_POST['titulo'],
                $_POST['fecha_publicacion'],
                $_POST['fecha_ingresoinventario'],
                $_POST['cantidad'],
                $_POST['precio'],
                $_POST['editorial'],
                $_POST['email'],
                $_POST['id_autor']

            ]);


            //busca el los datos del fk 
            $sql1 = $db->getConnection()->prepare("SELECT * FROM autor where id_autor= ?");
            $sql1->execute([
                $_POST['id_autor']
            ]);

            $fk = $sql1->fetch(PDO::FETCH_OBJ);

            return $fk;
        } catch (PDOException $e) {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    //Elimina un registro por Id
    public function delete()
    {

        $db = new DATABASE();

        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID_LIBRO= ?");
            $sql->execute([$_POST['id']]);
            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_POST['id'] => "no exite registro");

                return $res;
            } else {

                $dato = $sql->fetch(PDO::FETCH_OBJ);

                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM autor where id_autor= ?");
                $sql1->execute([$dato->id_autor]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);


                $id = $_POST['id'];
                $statement = $db->getConnection()->prepare("DELETE FROM $this->table where id_libro= ?");
                $statement->execute([
                    $id
                ]);
                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje' => 'Registro eliminado satisfactoriamente',
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
                );

                return $res;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Actualiza un resgistro por Id
    public function update()
    {

        $db = new DATABASE();


        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where ID_LIBRO= ?");
            $sql->execute([
                $_POST['id']
            ]);

            $result = $sql->rowCount();

            if ($result <= 0) {
                $res = array("ID " . $_POST['id'] => "no exite registro");

                return $res;
            } else {

                $dato = $sql->fetch(PDO::FETCH_OBJ);

                $sql = "UPDATE $this->table SET TITULO = ?,FECHA_PUBLICACION = ?,FECHA_INGRESOINVENTARIO = ?,CANTIDAD = ?,PRECIO = ?,EDITORIAL = ?,EMAIL = ?,ID_AUTOR = ?  WHERE ID_LIBRO= ? ";

                $statement = $db->getConnection()->prepare($sql);
                $statement->execute([
                    $_POST['titulo'],
                    $_POST['fecha_publicacion'],
                    $_POST['fecha_ingresoinventario'],
                    $_POST['cantidad'],
                    $_POST['precio'],
                    $_POST['editorial'],
                    $_POST['email'],
                    $_POST['id_autor'],
                    $_POST['id']
                ]);


                //busca el los datos del fk 
                $sql1 = $db->getConnection()->prepare("SELECT * FROM AUTOR where ID_AUTOR= ?");
                $sql1->execute([$_POST['id_autor']]);

                $fk = $sql1->fetch(PDO::FETCH_OBJ);

                $res = array(
                    'mensaje' => 'Registro Actualizado satisfactoriamente',
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

                );

                return $res;
            }
        } catch (PDOException $e) {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'codigo' => $e->getCode(),
                    'mensaje' => $e->getMessage()
                ]
            ]);
        }
    }

    //Obtiene un registro por Id
    public function libroId()
    {

        $db = new DATABASE();
        try {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id_libro= ?");
            $sql->execute([$_GET['id']]);
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
                );

                header("HTTP/1.1 200 OK");
            return $res;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
