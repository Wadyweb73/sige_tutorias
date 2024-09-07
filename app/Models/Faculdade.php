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
                echo "Faculdade registada com sucesso!";
            } else {
                echo "Erro ao registrar a faculdade: " . mysqli_error($connection);
            }

            mysqli_close($connection);
        }

        public function visualizarFaculdade($id){
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlVisualizar = "SELECT * FROM `faculdade` WHERE `id_facul` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    $faculdade = $resultado->fetch_assoc();
                   
                    return $faculdade;
                } else {
                    echo "Nenhuma faculdade encontrada.";
                    return null;
                }
            } else {
                echo "Erro ao buscar a faculdade: " . $connection->error;
                return null;
            }

            mysqli_close($connection);
        }



        public function listarFaculdades() {
            $conn = new Connect();
            $connection = $conn->connect();
        
            $sqlListar = "SELECT * FROM `faculdade`";
            $resultado = $connection->query($sqlListar);
        
            $faculdades = [];
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $faculdades[] = $row;
                }
            }
        
            mysqli_close($connection);
            return $faculdades;
        }
        
        public function actualizarFaculdade(){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlAtualizar = "UPDATE `faculdade` SET `nome_facul` = ?, `endereco` = ? WHERE `id_facul` = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("ssi", $this->nome_faculdade, $this->endereco, $id);

            if ($stmt->execute()) {
                echo "Faculdade actualizada!";
            } else {
                echo "Erro ao actualizar a faculdade: " . $connection->error;
            }

            mysqli_close($connection);   
        }

        public function apagarFaculdade(){
            $conn = new Connect();
            $connection = $conn->connect();
        
            $sqlApagar = "DELETE FROM `faculdade` WHERE `id_facul` = ?";
            $stmt = $connection->prepare($sqlApagar);
            $stmt->bind_param("i", $id);
        
            if ($stmt->execute()) {
                echo "Faculdade apagada com sucesso!";
            } else {
                echo "Erro ao apagar a faculdade: " . $connection->error;
            }
        
            mysqli_close($connection); 
        }
    }
?>