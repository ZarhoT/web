<?php
    require_once("../db/db.php");
    require_once("../models/usuarios.php");

    $captura=new usuarios();
    $ciudades=$captura->getCiudades($_POST["id"]);

    echo "<option>Seleccione la ciudad</option>";
    foreach($ciudades as $ciudad){
        echo "<option value='".$ciudad["id"]."'>".$ciudad["nombre"]."</option>";
    }

    //echo json_encode($ciudades);


?>