<?php
require_once __DIR__ . '/../Config/Connect.php';

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

      
 
    public function registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao) {
        $conn = new Connect();
        $connection = $conn ->connect();

        $sql = "INSERT INTO tutoria (id_disciplina, id_docente, hora_inicio, hora_termino, data_registo, data_realizacao, descricao) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);

        $stmt->bind_param('iisssss', $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


        
        
        
        public function listarTutorias(){
            $conn = new Connect();
            $connection = $conn ->connect();
    
            $sqlListar = "
            SELECT t.*, d.nome_docente, dis.nome_disciplina 
            FROM tutoria t 
            JOIN docente d ON t.id_docente = d.id_docente 
            JOIN disciplina dis ON t.id_disciplina = dis.id_disciplina
            ";
        
            // $sqlListar="SELECT * FROM tutoria";


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
                    echo "Nenhuma Tutoria foi encontrada.";
                    return null;
                }
            } else {
                echo "Erro ao buscar a Tutoria: " . $stmt->error;
                return null;
            }
            mysqli_close($connection);

        }

        
        public function buscarPorId($id) {
            $conn = new Connect();
            $connection = $conn->connect();

            $query = "SELECT * FROM tutoria WHERE id_tutoria = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        


        public function actualizarTutoria($id_tutoria, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) {
            $conn = new Connect();
            $connection = $conn->connect();

            $sql = "UPDATE tutoria SET id_disciplina = ?, id_docente = ?, hora_inicio = ?, hora_termino = ?, data_realizacao = ?, descricao = ? WHERE id_tutoria = ?";
            $stmt = $connection->prepare($sql);
        
            $stmt->bind_param('iissssi', $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao, $id_tutoria);
        
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function deletarTutoria($id_tutoria) {

            $conn = new Connect();
            $connection = $conn->connect();

            $query = "DELETE FROM tutoria WHERE id_tutoria = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $id_tutoria);
            return $stmt->execute();
        }
    }



?>