<?php


class ControllerLibro{


    public function read(){
        
        require_once  ("./Models/libroModel.php");

        $model = new libroModel();          


        return json_encode([
            $model->read()
        ]);
     
    }

    #crea un nuevo cliente
    public function create(){

        $json["titulo"] =  $_POST['titulo'];
        $json["fecha_publicacion"] = $_POST['fecha_publicacion'];
        $json["fecha_ingresoinventario"] = $_POST['fecha_ingresoinventario'];
        $json["cantidad"] = $_POST['cantidad'];
        $json["precio"] = $_POST['precio'];
        $json["editorial"] = $_POST['editorial'];
        $json["email"] =  $_POST['email']; 

        require_once  ("./Models/libroModel.php");

        $model = new libroModel();    
        
        $json["peliculas"] = $model->create();

        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $json
        ]);

    }

    public function delete(){
        
        require_once  ("./Models/libroModel.php");

        $model = new libroModel();    
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->delete()
        ]);
     
    }


    public function update(){
      
        require_once  ("./Models/libroModel.php");

        $model = new libroModel();    
        
        header('Content-type:application/json;charset=utf-8');
        return json_encode([
            $model->update()
        ]);
     
    }

    
    public function libroId(){
        require_once  ("./Models/libroModel.php");

        $model = new libroModel();    
        
        return json_encode($model->libroId());
     
    }

   


}
