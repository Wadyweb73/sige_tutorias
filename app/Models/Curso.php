<?php
    Class Curso{
        private $id_curso;
        private $id_faculdade;
        private $nome_curso;

        //getters
        public function get_idCurso(){
            return $this->id_curso;
        }
        public function get_idFaculdade(){
            return $this->id_faculdade;
        }
        public function get_nomeCurso(){
            return $this->nome_curso;
        }

        //setters
        public function set_idCurso($idCurso){
            $this->id_curso = $idCurso;
        }
        public function set_idFaculdade($idFacul){
            $this->id_faculdade = $idFacul;
        }
        public function set_nomeCurso($nomeCurso){
            $this->nome_curso = $nomeCurso;
        }


        public function visualizarCurso(){

        }
        public function actualizarCurso(){
            
        }
        public function registarCurso(){
            
        }
        public function apagarCurso(){
            
        }
    }
?>