<?php

    Class Tutoria {
        private $id_tutoria;
        private $id_disciplina;
        private $id_docente;
        private $hora_inicio;
        private $hora_termino;
        private $data_registo;
        private $data_realizacao;
        private $descricao;
    
        // the gets
        public function getIdTutoria() {
            return $this->id_tutoria;
        }
    
        public function getIdDisciplina() {
            return $this->id_disciplina;
        }

        public function getIdDocente() {
            return $this->id_docente;
        }
        
        public function getHoraInicio() {
            return $this->hora_inicio;
        }
                
        public function getHoraTermino() {
            return $this->hora_termino;
        }

        public function getDataRegisto() {
            return $this->data_registo;
        }
        public function getDataRealizacao() {
            return $this->data_realizacao;
        }
        public function getDescricao() {
            return $this->descricao;
        }
        
        
        // the sets
        public function setIdDisciplina($id_disciplina) {
            $this->id_disciplina = $id_disciplina;
        }

        public function setIdTutoria($id_tutoria) {
            $this->id_tutoria = $id_tutoria;
        }
        
        public function setHoraInicio($hora_inicio) {
            $this->hora_inicio = $hora_inicio;
        }
        public function setIdDocente($id_docente) {
            $this->id_docente = $id_docente;
        }

        public function setHoraTermino($hora_termino) {
            $this->hora_termino = $hora_termino;
        }
        
        public function setDataRegisto($data_registo) {
            $this->data_registo = $data_registo;
        }
    
        public function setDataRealizacao($data_realizacao) {
            $this->data_realizacao = $data_realizacao;
        }
    
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }   
        


        // crud

        public function registarTutoria() {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlRegistar = "INSERT INTO `tutoria` (`id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sqlRegistar);
            $stmt->bind_param("iisssss", $this->id_disciplina, $this->id_docente, $this->hora_inicio, $this->hora_termino, $this->data_registo, $this->data_realizacao, $this->descricao);
    
            if ($stmt->execute()) {
                echo "Tutoria registada com sucesso!";
            } else {
                echo "Erro ao registrar a tutoria: " . $connection->error;
            }
    
            mysqli_close($connection);
        }
    
        public function visualizarTutoria($id) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlVisualizar = "SELECT * FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    $tutoria = $resultado->fetch_assoc();
                    return $tutoria;
                } else {
                    echo "Nenhuma tutoria encontrada.";
                    return null;
                }
            } else {
                echo "Erro ao buscar a tutoria: " . $connection->error;
                return null;
            }
    
            mysqli_close($connection);
        }
    
        public function listarTutorias() {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlListar = "SELECT * FROM `tutoria`";
            $resultado = $connection->query($sqlListar);
    
            $tutorias = [];
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $tutorias[] = $row;
                }
            }
    
            mysqli_close($connection);
            return $tutorias;
        }
    
        public function actualizarTutoria() {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlAtualizar = "UPDATE `tutoria` SET `id_disciplina` = ?, `id_docente` = ?, `hora_inicio` = ?, `hora_termino` = ?, `data_registo` = ?, `data_realizacao` = ?, `descricao` = ? WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("iisssssi", $this->id_disciplina, $this->id_docente, $this->hora_inicio, $this->hora_termino, $this->data_registo, $this->data_realizacao, $this->descricao, $this->id_tutoria);
    
            if ($stmt->execute()) {
                echo "Tutoria actualizada com sucesso!";
            } else {
                echo "Erro ao actualizar a tutoria: " . $connection->error;
            }
    
            mysqli_close($connection);
        }
    
        public function apagarTutoria($id) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlApagar = "DELETE FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlApagar);
            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                echo "Tutoria apagada com sucesso!";
            } else {
                echo "Erro ao apagar a tutoria: " . $connection->error;
            }
    
            mysqli_close($connection);
        }
    }
?>