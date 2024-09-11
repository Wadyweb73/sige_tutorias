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
        public function set_idFaculdade($idFaculdade){
            $this->id_faculdade = $idFaculdade;
        }
        public function set_nomeCurso($nomeCurso){
            $this->nome_curso = $nomeCurso;
        }



        public function registarCurso(){
           $conn = new Connect();
           $connection = $conn->connect();
           $nomeCurso = $this->get_nomeCurso();
           $idFaculdade =$this->get_idFaculdade();

           $sqlRegistar = "INSERT INTO `curso` (`nome_curso`,`id_faculdade`) VALUES ('$nomeCurso','$idFaculdade')";
           
            if(mysqli_query($connection,$sqlRegistar)){
                echo 'Faculdade Registada com Sucesso...';
            }else {
                echo'ERRO ao Registar a faculdade:'. mysqli_error($connection);
            }

            mysqli_close($connection);

        }


        public function visualizarCurso($id){
            $conn = new Connect();
            $connection = $conn->connect();

            $sqlVisualizar = "SELECT * FROM `curso` WHERE `id_curso`= ?";
            $stmt = $connection->prepare($sqlVisualizar);
            $stmt->bind_param("i",$id);

            if($stmt->execute()){
                $resultado = $stmt->get_result();
                if($resultado->num_rows >0){
                    $curso = $resultado->fetch_assoc();

                    return $curso;
                }else {
                    echo 'Nenhuma Faculdade Encontrada.';
                    return null;
                }
            }else{
                echo 'Erro ao Buscar o Curso'. $connection->error;
                return null;
            }
            mysqli_close($connection);
        }

        public function listarCursos(){
            $conn = new Connect();
            $connection = $conn ->connect();

            $sqlListar = "SELECT * FROM `curso`";
            $resultado = $connection->query($sqlListar);

            $cursos = [];
            if($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    $cursos[] = $row;
                }
            }
            mysqli_close($connection);
            return $cursos;
        }


        public function actualizarCurso(){
            $conn = new Connect();
            $connection =$conn->connect();

            $sqlActualizar = "UPDATE `curso` SET `nome_curso`=?,`id_faculdade`=? WHERE `id_curso` = ?";
            $stmt = $connection->prepare($sqlActualizar);
            $stmt->bind_param("under",$this->nome_curso,$this->id_faculdade,$id);

            if($stmt->execute()){
                echo'Curso Actualizado';
            }else {
                echo 'ERRO ao Actualizar a Faculdade';
            }
            mysqli_close($connection);
            
        }
        
        public function apagarCurso(){
            $conn = new Connect();
            $connection = $conn->connect();
            
            
            $sqlApagar = "DELETE FROM `curso` WHERE `id_facul` = ?";
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