<?php
    class Pregunta  {
        
        private $id;
        private $pregunta;
        private $respuesta1;
        private $respuesta2;
        private $respuesta3;
        private $respuesta4;
        private $respuesta_correcta;
        private $respuesta_alumno;
        private $id_cuestionario;
        

 
        public function __construct($id = null, $pregunta = null, $respuesta1 = null, $respuesta2 = null, $respuesta3 = null, $respuesta4 = null, $respuesta_correcta = null, $respuesta_alumno = null, $id_cuestionario){
            $this->id = $id;
            $this->pregunta = $pregunta;
            $this->respuesta1 = $respuesta1;
            $this->respuesta2 = $respuesta2;
            $this->respuesta3 = $respuesta3;
            $this->respuesta4 = $respuesta4;
            $this->respuesta_correcta = $respuesta_correcta;
            $this->respuesta_alumno = $respuesta_alumno;
            $this->id_cuestionario = $id_cuestionario
            
        }

        public function getId(){
            return $this->id;
        }
        public function getPregunta(){
            return $this->pregunta;
        }
        public function getRespuesta1(){
            return $this->respuesta1;
        }
        public function getRespuesta2(){
            return $this->respuesta2;
        }
        public function getRespuesta3(){
            return $this->respuesta3;
        }
        public function getRespuesta4(){
            return $this->respuesta4;
        }
        public function getRespuesta_correcta(){
            return $this->respuesta_correcta;
        }
        public function getRespuesta_alumno(){
            return $this->respuesta_alumno;
        }
        public function getId_cuestionario(){
            return $this->id_cuestionario;
        }
        

        public function setId($id){
            $this->id = $id;
        }
        public function setPregunta($pregunta){
            $this->pregunta = $pregunta;
        }
        public function setRespuesta1($respuesta1){
            $this->respuesta1 = $respuesta1;
        }
        public function setRespuesta2($respuesta2){
            $this->respuesta2 = $respuesta2;
        }
        public function setRespuesta3($respuesta3){
            $this->$respuesta3 = $respuesta3;
        }
        public function setRespuesta4($respuesta4){
            $this->respuesta4 = $respuesta4;
        }
        public function setRespuesta_correcta($respuesta_correcta){
            $this->respuesta_correcta = $respuesta_correcta;
        }
        public function setRespuesta_alumno($respuesta_alumno){
            $this->respuesta_alumno = $respuesta_alumno;
        }
        public function setId_cuestionario($id_cuestionario){
            $this->id_cuestionario = $id_cuestionario;
        }
        
        
  


    }
    

?>