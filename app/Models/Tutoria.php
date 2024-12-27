<?php

    class Tutoria{
        private $id_tutoria;
        private $id_disciplina;
        private $id_docente;
        private $hora_inicio;
        private $hora_termino;
        private $data_registo;
        private $data_realizacao;
        private $descricao;

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
    
        public function setIdTutoria($id_tutoria) {
            $this->id_tutoria = $id_tutoria;
        }
        public function setIdDisciplina($id_disciplina) {
            $this->id_disciplina = $id_disciplina;
        }

        public function setIdDocente($id_docente) {
            $this->id_docente = $id_docente;
        }



        public function setHoraInicio($hora_inicio) {
            $this->hora_inicio = $hora_inicio;
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

        /// metodos

        public function registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino,$data_registo, $data_realizacao, $descricao) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlRegistar = "INSERT INTO `tutoria` (`id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`) VALUES ('$id_disciplina', '$id_docente', '$hora_inicio', '$hora_termino','$data_registo', '$data_realizacao', '$descricao')";

            if(mysqli_query($connection,$sqlRegistar)){
                return true;
            }else {
               return false;
            }


            mysqli_close($connection);
        }

        public function listarTutorias(){
            $conn = new Connect();
            $connection = $conn ->connect();
    
            $sqlListar = "SELECT * FROM `tutoria`";
            $resultado = $connection->query($sqlListar);
    
            $tutorias = [];
            if($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    $tutorias[] = $row;
                }
            }
            mysqli_close($connection);
            return $tutorias;
        }
        public function visualizarTutoria($id_tutoria) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlVisualizar = "SELECT * FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id_tutoria);
    
            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    
                    return false;
                }
            } else {
                echo "Erro ao buscar a Tutoria: " . $stmt->error;
                return null;
            }
            mysqli_close($connection);

        }
        public function actualizarTutoria($id_tutoria, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlAtualizar = "UPDATE `tutoria` 
                             SET `id_disciplina` = ?, `id_docente` = ?, `hora_inicio` = ?, `hora_termino` = ?, `data_realizacao` = ?, `descricao` = ?
                             WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("iissssi", $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao, $id_tutoria);
    
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "Erro ao atualizar a Tutoria: " . $stmt->error;
            }
            mysqli_close($connection);

        }

        public function apagarTutoria($id_tutoria) {
            $conn = new Connect();
            $connection = $conn->connect();
    
            $sqlDeletar = "DELETE FROM `tutoria` WHERE `id_tutoria` = ?";
            $stmt = $connection->prepare($sqlDeletar);
            $stmt->bind_param("i", $id_tutoria);
    
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "Erro ao deletar a Tutoria: " . $stmt->error;
            }
            mysqli_close($connection);

        }

    }



?>