<?php
    class Usuario  {
        
        private $id;
        private $rut;
        private $perfil;
        private $pass;
        private $correo;
        private $primer_nombre;
        private $segundo_nombre;
        private $primer_apellido;
        private $segundo_apellido;

 
        public function __construct($id = null, $rut = null, $pass = null, $correo = null, $perfil = null, $primer_nombre = null, $segundo_nombre = null, $primer_apellido = null, $segundo_apellido = null){
            $this->id = $id;
            $this->rut = $rut;
            $this->perfil = $perfil;
            $this->pass = $pass;
            $this->correo = $correo;
            $this->primer_nombre = $primer_nombre;
            $this->segundo_nombre = $segundo_nombre;
            $this->primer_apellido = $primer_apellido;
            $this->segundo_apellido = $segundo_apellido;
        }

        public function getId(){
            return $this->id;
        }
        public function getRut(){
            return $this->rut;
        }
        public function getPerfil(){
            return $this->perfil;
        }
        public function getPassword(){
            return $this->pass;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getNombre(){
            return $this->primer_nombre;
        }
        public function getSegundoNombre(){
            return $this->segundo_nombre;
        }
        public function getApellido(){
            return $this->primer_apellido;
        }
        public function getSegundoApellido(){
            return $this->segundo_apellido;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setRut($rut){
            $this->rut = $rut;
        }
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        public function setPassword($pass){
            $this->pass = $pass;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function setNombre($primer_nombre){
            $this->primer_nombre = $primer_nombre;
        }
        public function setSegundoNombre($segundo_nombre){
            $this->segundo_nombre = $segundo_nombre;
        }
        public function setPrimerApellido($primer_apellido){
            $this->primer_apellido = $primer_apellido;
        }
        public function setSegundoApellido($segundo_apellido){
            $this->segundo_apellido = $segundo_apellido;
        }
        
        
  


    }
    

?>