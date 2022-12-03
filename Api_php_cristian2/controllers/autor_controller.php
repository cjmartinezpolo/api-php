<?php


class ControllerAutor{


    public function read(){
        
        require_once  ("./Models/autorModel.php");

        $model = new autorModel();

        return json_encode($model->read());
     
    }


    public function create(){

        $json = json_decode(file_get_contents("php://input"), true);
        
        $json['nombre'] = $_POST['nombre'];
        $json['apellido']= $_POST['apellido'];
        $json['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
    

        require_once  ("./Models/autorModel.php");

        $model = new autorModel();

        $json['id'] = $model->create();

        header('Content-type:application/json;charset=utf-8');
        return json_encode($json);

        header('Location: ./autor_read.php');

    }

    public function delete(){
        
        require_once  ("./Models/autorModel.php");

        $model = new autorModel();
        
        header('Content-type:application/json;charset=utf-8');
        #header('Location: ./autor_read.php');
        return json_encode([
            $model->delete()
        ]);

     
    }


    public function update(){
        require_once  ("./Models/autorModel.php");

        $model = new autorModel();
        
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->update()
        ]);
     
    }

    
    public function autorId(){

        require_once  ("./Models/autorModel.php");

        $model = new autorModel();

        return $model->autorId();
     
    }

   


}
