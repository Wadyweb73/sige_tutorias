<?php
    Class Disciplina{
        private $id_disciplina;
        private $id_curso;
        private $id_docente;
        private $nome_disciplina;

        //getters
        public function get_idDisciplina(){
            return $this->id_disciplina;
        }
        public function get_idCurso(){
            return $this->id_curso;
        }
        public function get_idDocente(){
            return $this->id_docente;
        }
        public function get_nomeDisciplina(){
            return $this->nome_disciplina;
        }

        //setters
        public function set_idDisciplina($idDisc){
            $this->id_disciplina = $idDisc;
        }
        public function set_idCurso($idCurso){
            $this->id_curso = $idCurso;
        }
        public function set_idDocente($idDocente){
            $this->id_docente = $idDocente;
        }
        public function set_nomeDisciplina($nomeDisc){
            $this->nome_disciplina = $nomeDisc;
        }


        public function visualizarDisciplina(){

        }
        public function actualizarDisciplina(){
            
        }
        public function registarDisciplina(){
            
        }
        public function apagarDisciplina(){
            
        }
    }
?>