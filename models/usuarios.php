<?php

    class usuarios{
        private $conectar;
        private $db;
        private $arregloUsuarios;
        private $estado; // estado 0 no se ha logueado, 1 se encuentra en la bd, 2 son datos incorrectos.

        public function __construct(){
            $this->conectar=new Conectar();
            $this->db=$this->conectar->conexion();
            $this->arregloUsuarios=array();
            $this->estado=0;
        }

        public function getUsuarios(){
            $consulta=$this->db->query("select * from usuarios");
            while($fila=$consulta->fetch_assoc()){
                $this->arregloUsuarios[]=$fila;
            }

            return $this->arregloUsuarios;
        }

        public function getValidarUsuarios($correo, $clave){
            $consulta=$this->db->query("select * from usuarios where usuario='$correo' and clave='$clave'");
            
            if($consulta->num_rows==1) 
                $this->estado=1; //Dato existe
            else
                $this->estado=2; //Dato no existe
            return $this->estado;
        }

        public function getPaises(){
            $consulta=$this->db->query("select * from paises order by nombre");
            while($fila=$consulta->fetch_assoc()){
                $this->arregloUsuarios[]=$fila;
            }

            return $this->arregloUsuarios;
        }

        public function getCiudades($IDPais){
            $consulta=$this->db->query("select * from ciudades where id_pais=$IDPais");
            while($fila=$consulta->fetch_assoc()){
                $this->arregloUsuarios[]=$fila;
            }

            return $this->arregloUsuarios;
        }

        public function CrearUsuario($datos){
            $sql="insert into info_usuarios(nombre_completo,RUT,pais,ciudad,direccion,telefono,fecha_nacimiento)values('".$datos[1]."','".$datos[2]."',".$datos[3].",".$datos[4].",'".$datos[5]."','".$datos[6]."','".$datos[7]."')";

            $consulta=$this->db->query($sql);
            return $consulta;
        }

        public function listarUsuarios(){
            $consulta=$this->db->query("select * from info_usuarios");
            while($fila=$consulta->fetch_assoc()){
                $this->arregloUsuarios[]=$fila;
            }
            return $this->arregloUsuarios;
        }

        public function Eliminardato($id){
            $consulta=$this->db->query("delete from info_usuarios where id=$id");
            return $consulta;
        }
    }

?>