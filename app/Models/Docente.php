<?php
    Class Docente{
        private $id_docente;
        private $id_faculdade;
        private $nome;
        private $password;
        private $email;
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

        public function getEmail(){ return $this->email; }
        public function getPassword(){ return $this->password; }

        //setters
        public function set_idDocente($idDocente){ $this->id_docente = $idDocente; }
        public function set_idFaculdade($idFaculdade){ $this->id_faculdade = $idFaculdade; }
        public function set_nome($nome){ $this->nome = $nome; }
        public function set_idCurso($idCurso){ $this->id_curso = $idCurso; }
        public function set_idDisciplina($idDisciplina){ $this->id_disciplina = $idDisciplina; }
        public function setEmail($email){  $this->email = $email; }
        public function setPassword($password){ $this->password = $password; }

        //DB
        public function autenticar($credenciais){
            $conn = new Connect();
            $connection = $conn->connect();
            $email = $credenciais->getEmail();
            $password = $credenciais->getPassword();

            $sqlAutenticar = "SELECT * FROM `docente` WHERE `email` = ? AND `password` = ?";
            $stmt = $connection->prepare($sqlAutenticar);
            $stmt->bind_param("ss",$email,$password);

            if($stmt->execute()){
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    return true;
                }else{
                    return false;
                }
            }else{
                return mysqli_error($connection);
            }
            mysqli_close($connection);
        }
               
        
        public function registarDocente(){
            $conn = new Connect();
            $connection = $conn->connect();
            $idDocente = $this->get_idDocente();
            $nome = $this->get_nome();
            $idFaculdade = $this->get_idFaculdade();
            $idCurso = $this->get_idCurso();
            $idDisciplina = $this->get_idDisciplina();

            $sqlRegistar = "INSERT INTO `docente` (`id_faculdade`, `id_curso`, `id_disciplina`, `nome_docente`) 
            VALUES ('$idFaculdade', '$idCurso', '$idDisciplina', '$nome')";

            if (mysqli_query($connection, $sqlRegistar)) {
                echo "Docente registada com sucesso!";
            } else {
                echo "Erro ao registrar o Docente: " . mysqli_error($connection);
            }
            mysqli_close($connection);
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
        
            $sqlListar = "SELECT * FROM `docente`";
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



        public function actualizarDocente(){
           $conn = new Connect();
            $connection = $conn->connect();

            $sqlAtualizar = "UPDATE `docente` SET  'id_faculdade' = ?,'id_curso'=? ,'id_disciplina'=?,'nome_docente'=? WHERE 'id_docente' = ?";
            $stmt = $connection->prepare($sqlAtualizar);
            $stmt->bind_param("iiisi", $this->id_faculdade,$this->id_curso,$this->id_disciplina,$this->nome, $id);

            if ($stmt->execute()) {
                echo "Docente actualizado!";
            } else {
                echo "Erro ao actualizar o Docente: " . $connection->error;
            }

            mysqli_close($connection);   
            

        }
        

        public function apagarDocente(){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlApagar = "DELETE FROM `docente1` WHERE 'id_docente' = ?";
            $stmt = $connection->prepare($sqlApagar);
            $stmt->bind_param("i", $id);
        
            if ($stmt->execute()) {
                echo "Docente apagado com sucesso!";
            } else {
                echo "Erro ao apagar o Docente: " . $connection->error;
            }
        
            mysqli_close($connection); 
        }
    }
?>
