<?php 

    session_start();
    $correo=$_SESSION["usuario"];

    require_once("models/usuarios.php");

    $captura=new usuarios();
    $paises=$captura->getPaises();
    $insertar=false;

    if(!empty($_GET["action"])){
        if($_GET["action"]=="crear"){
            $datos=array();
            $datos[1]=$_POST["nombre"]; //name del input del form.
            $datos[2]=$_POST["rut"];
            $datos[3]=$_POST["pais"];
            $datos[4]=$_POST["ciudad"];
            $datos[5]=$_POST["direccion"];
            $datos[6]=$_POST["telefono"];
            $datos[7]=$_POST["fechanacimiento"];

            $insertar=$captura->CrearUsuario($datos);
        }
    }
    
    if(empty($_GET["action"]) || $_GET["action"]=="Vcrear" || $_GET["action"]=="crear"){
        require_once("views/vistaCRUDUsuarios.phtml");
    }
    elseif($_GET["action"]=="leer") {
        require_once("views/vistaListarUsuarios.phtml");
    }

?>