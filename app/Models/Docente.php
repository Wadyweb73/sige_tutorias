<?php


require_once __DIR__ . '/../Config/Connect.php';

    Class Docente{
        private $id_docente;
        private $id_faculdade;
        private $nome;
        private $id_disciplina;
        private $id_curso;

        //getters
        public function get_idDocente(){
            return $this->id_docente;
        }
        public function get_idFaculdade(){
            return $this->id_faculdade;
        }
        public function get_nome(){
            return $this->nome;
        }
        public function get_idCurso(){
            return $this->id_curso;
        }
        public function get_idDisciplina(){
            return $this->id_disciplina;
        }

        //setters
        public function set_idDocente($idDocente){
            $this->id_docente = $idDocente;
        }
        public function set_idFaculdade($idFaculdade){
            $this->id_faculdade = $idFaculdade;
        }
        public function set_nome($nome){
            $this->nome = $nome;
        }
        public function set_idCurso($idCurso){
            $this->id_curso = $idCurso;
        }
        public function set_idDisciplina($idDisciplina){
            $this->id_disciplina = $idDisciplina;
        }

        //DB

        
            public function registarDocente($nome_docente, $id_faculdade, $id_curso, $id_disciplina) {
                $conn = new Connect();
                $connection = $conn->connect();
                try {
                    $query = "INSERT INTO docente (nome_docente, id_faculdade, id_curso, id_disciplina) VALUES (?, ?, ?, ?)";
                    $stmt = $connection->prepare($query);
                    
                    $stmt->bind_param("siii", $nome_docente, $id_faculdade, $id_curso, $id_disciplina);
                    
                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                } catch (mysqli_sql_exception $e) {
                    throw new Exception("There was an error: " . $e->getMessage());
                }
            }
        
        

        public function visualizarDocente($id){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlVisualizar = "SELECT * FROM `docente` WHERE `id_docente` = ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    $docente = $resultado->fetch_assoc();
                   
                    return $docente;
                } else {
                    echo "Nenhum Docente foi encontrado.";
                    return null;
                }
            } else {
                echo "Erro ao buscar o Docente: " . $connection->error;
                return null;
            }

            mysqli_close($connection);

        }


        public function listarDocentes() {
            $conn = new Connect();
            $connection = $conn->connect();
        
            // $sqlListar = "SELECT * FROM `docente`";
            // $resultado = $connection->query($sqlListar);

            $sqlListar = "SELECT d.*, f.nome_facul, c.nome_curso, dis.nome_disciplina 
            FROM docente d 
            JOIN faculdade f ON d.id_faculdade = f.id_faculdade 
            JOIN curso c ON d.id_curso = c.id_curso 
            JOIN disciplina dis ON d.id_disciplina = dis.id_disciplina";

            $resultado = $connection->query($sqlListar);
        
            $docente = [];
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    $docente[] = $row;
                }
            }
            return $docente;
            mysqli_close($connection);
        }



        public function buscarPorId($id) {
            $conn = new Connect();
            $connection = $conn->connect();

            $query = "SELECT * FROM docente WHERE id_docente = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        
        public function atualizarDocente($id, $nome, $id_faculdade, $id_curso, $id_disciplina) {
            $conn = new Connect();
            $connection = $conn->connect();

            $query = "UPDATE docente SET nome_docente = ?, id_faculdade = ?, id_curso = ?, id_disciplina = ? WHERE id_docente = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("siiii", $nome, $id_faculdade, $id_curso, $id_disciplina, $id);
            return $stmt->execute();
        }
        
        

        public function deletarDocente($id_docente) {

            $conn = new Connect();
            $connection = $conn->connect();

            $query = "DELETE FROM docente WHERE id_docente = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("i", $id_docente);
            return $stmt->execute();
        }
        
    }
?>