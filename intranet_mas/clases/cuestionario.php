<?php
    class Cuestionario  {
        
        private $id;
        private $numero_preguntas;
        private $id_asignatura;
        

 
        public function __construct($id = null, $numero_preguntas = null, $id_asignatura = null){
            $this->id = $id;
            $this->numero_preguntas = $numero_preguntas;
            $this->id_asignatura = $id_asignatura;
            
        }

        public function getId(){
            return $this->id;
        }
        public function getNumero_preguntas(){
            return $this->numero_preguntas;
        }
        public function getId_asignatura(){
            return $this->id_asignatura;
        }
        

        public function setId($id){
            $this->id = $id;
        }
        public function setNumero_preguntas($numero_preguntas){
            $this->numero_preguntas = $numero_preguntas;
        }
        public function setId_asignatura($id_asignatura){
            $this->id_asignatura = $id_asignatura;
        }
        
        
  


    }
    

?>