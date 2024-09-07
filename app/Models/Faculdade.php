<?php
    include_once("../sige_tutorias/app/config/Connect.php");

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

        //DB
        public function registarFaculdade(){
            $conn = new Connect();
            $connection = $conn->connect();
            $nme = $this->get_nomeFaculdade();
            $ende = $this->get_endereco();
        
            $sqlRegistar = "INSERT INTO `faculdade` (`nome_facul`, `endereco`) VALUES ('$nme', '$ende')";
        
            if (mysqli_query($connection, $sqlRegistar)) {
                echo "Faculdade registrada com sucesso!";
            } else {
                echo "Erro ao registrar a faculdade: " . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function visualizarFaculdade(){

        }
        public function actualizarFaculdade(){
            
        }
        public function apagarFaculdade(){
            
        }
    }
?>