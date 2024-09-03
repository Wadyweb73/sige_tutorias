<?php
    Class Faculdade{
        private $id_faculdade;
        private $nome_faculdade;
        private $endereco;

        //getters
        public function get_idFaculdade(){
            return $this->id_faculdade;
        }
        public function get_nomeFaculdade(){
            return $this->nome_faculdade;
        }
        public function get_endereco(){
            return $this->endereco;
        }

        //setters
        public function set_idFaculdade($idFacul){
            $this->id_faculdade = $idFacul;
        }
        public function set_nomeFaculdade($nomeFacul){
            $this->nome_faculdade = $nomeFacul;
        }
        public function set_endereco($endereco){
            $this->endereco = $endereco;
        }

        public function visualizarFaculdade(){

        }
        public function actualizarFaculdade(){
            
        }
        public function registarFaculdade(){
            
        }
        public function apagarFaculdade(){
            
        }
    }
?>