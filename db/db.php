<?php
    include("configure.php");

        class Conectar{
            private $dbase;
            private $usuario;
            private $clave;
            private $servidor;

            public function __construct(){
            $this->dbase=DBASE;
            $this->usuario=USUARIO;
            $this->clave=CLAVE;
            $this->servidor=SERVIDOR;
        }

        public function conexion(){
            $conexion=new mysqli($this->servidor,$this->usuario,$this->clave,$this->dbase);
            if ($conexion->connect_ernno){
                echo "error";
            }
            return $conexion;
        }

    }

?>
