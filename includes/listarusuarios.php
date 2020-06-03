<?php 
    require_once('../db/db.php');
    require_once('../models/usuarios.php');

    $conectar=new usuarios();
    $datos=$conectar->listarUsuarios();

    echo json_encode($datos);

?>