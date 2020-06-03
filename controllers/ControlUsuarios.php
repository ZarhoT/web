<?php
     
    session_start();

    require_once("models/usuarios.php");
    $datos=0;
    
    if (!empty($_POST["correo"]) && !empty($_POST["clave"])) {
        echo "$_POST["correo"]"; 
        $captura=new usuarios();
        $datos=$captura->getValidarUsuarios($_POST["correo"], $_POST["clave"]);
        if($datos==1){
            $_SESSION["usuario"]=$_POST["correo"];
            header('location:admin.php');
        }
    }

    if(empty($_SESSION["usuario"])) require_once("views/vistaUsuarios.phtml");
    else header('location:admin.php');

?>
