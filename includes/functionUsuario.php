<?php 
    require_once('../db/db.php');
    require_once('../models/usuarios.php');

    $dato=json_decode(file_get_contents('php://input'),true);


    if($dato["op"]=="delete"){
        $conectar=new usuarios();
        $datos=$conectar->Eliminardato($dato["id"]);
        if($datos){
            echo "Eliminado";
        }
    }

?>