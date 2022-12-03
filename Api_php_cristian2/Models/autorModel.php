<?php


include_once('./Models/connection.php');

class autorModel{

       //Nombre de la tabla
   private $table = 'autor';


    public function read(){

        $db = new DATABASE();

        try
        {
            $stm = $db->getConnection()->prepare("SELECT * FROM $this->table");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
       
           
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }

     
    }


    public function create(){

        $db = new DATABASE();

        try{

            $stm= $db->getConnection()->prepare("INSERT INTO $this->table (NOMBRE,APELLIDO,FECHA_NACIMIENTO) VALUES (?,?,?)");
            
            $stm->execute([
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['fecha_nacimiento'],
            ]);

        }catch(PDOException $e){
        echo $e->getMessage();
        }
    }

        //Elimina un registro por Id
    public function delete(){

        $db = new DATABASE();

        try
        {

            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id_autor= ?");
            $sql->execute([$_POST['id']]);
            $result = $sql->rowCount();

            if ($result<=0) {
                $res = array("ID ". $_POST['id'] => "no exite registro");

                return $res;

            } else {
            
                $dato =$sql->fetch(PDO::FETCH_OBJ);

                
                $id = $_POST['id'];
                $statement = $db->getConnection()->prepare("DELETE FROM $this->table where id_autor=:id");
                $statement->bindValue(':id', $id);
                $statement->execute();
                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje'=> 'Registro eliminado satisfactoriamente',
                    'data' => array(
                        'id' =>  $dato->id_autor ,
                        'nombre' =>  $dato->nombre,
                        'apellido' =>  $dato->apellido ,
                        'fecha_nacimiento' =>  $dato->fecha_nacimiento,
                    )
                );
                
                return $res;
            }
           
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

     // Actualiza un resgistro por Id
     public function update(){

        $db = new DATABASE();
        try{
            
             //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id_autor= ?");
            $sql->execute([
                $_POST['id']
            ]);
            $result = $sql->rowCount();

            if ($result<=0) {
            $res = array("ID ". $_POST['id'] => "no exite registro");

            return $res;

            } else {
            
                $dato =$sql->fetch(PDO::FETCH_OBJ);

                $sql = "UPDATE $this->table SET NOMBRE= ? , APELLIDO = ? , FECHA_NACIMIENTO = ?  WHERE ID_AUTOR= ? ";

                $statement = $db->getConnection()->prepare($sql);
                $statement->execute([
                    $_POST['nombre'],
                    $_POST['apellido'],
                    $_POST['fecha_nacimiento'],
                    $_POST['id'],
                ]);

                header("HTTP/1.1 200 OK");

                $res = array(
                    'mensaje'=> 'Registro actualizado satisfactoriamente',
                    'data' => array(
                        'id' =>   $_POST['id'] ,
                        'nombre' =>  $_POST['nombre'],
                        'apellido' =>  $_POST['apellido'] ,
                        'fecha_nacimiento' =>   $_POST['fecha_nacimiento'],
                    )
                );

                return $res;
            }

        }catch(PDOException $e){
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
    public function autorId(){

        $db = new DATABASE();

        try{
           
          
            //verificar si existe el usuario
            $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id_autor= ?");
            $sql->execute([$_GET['id']]);
            $result = $sql->rowCount();

           
            if ($result>=0) {
               
                //Mostrar un post
                $sql = $db->getConnection()->prepare("SELECT * FROM $this->table where id_autor=?");
                $sql->execute([
                    $_GET['id']
                ]);
              
                return json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
                
            
            }else{
                $res = array("ID ". $_GET['id'] => "no exite");

                return $res;
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

}