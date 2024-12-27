<?php

class Avaliacao {
    private int $id_avaliacao;
    private int $id_disciplina;
    private int $id_docente;
    private int $teste_numero;
    private string $supervisor;
    private string $data_realizacao;
    private string $data_registo;
    private string $hora_inicio;
    private string $hora_fim;
    private string $local;
    private string $modalidade;
    private string $tipo_avaliacao;


    public function getIdAvaliacao() {
        return $this->id_avaliacao;
    }

    public function setIdAvaliacao($id_avaliacao) {
        $this->id_avaliacao = $id_avaliacao;
    }

    // Getter e Setter para id_disciplina
    public function getIdDisciplina() {
        return $this->id_disciplina;
    }

    public function setIdDisciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

    // Getter e Setter para id_docente
    public function getIdDocente() {
        return $this->id_docente;
    }

    public function setIdDocente($id_docente) {
        $this->id_docente = $id_docente;
    }

    // Getter e Setter para teste_numero
    public function getTesteNumero() {
        return $this->teste_numero;
    }

    public function setTesteNumero($teste_numero) {
        $this->teste_numero = $teste_numero;
    }

    // Getter e Setter para supervisor
    public function getSupervisor() {
        return $this->supervisor;
    }

    public function setSupervisor($supervisor) {
        $this->supervisor = $supervisor;
    }

    // Getter e Setter para data_realizacao
    public function getDataRealizacao() {
        return $this->data_realizacao;
    }

    public function setDataRealizacao($data_realizacao) {
        $this->data_realizacao = $data_realizacao;
    }

    // Getter e Setter para data_registo
    public function getDataRegisto() {
        return $this->data_registo;
    }

    public function setDataRegisto($data_registo) {
        $this->data_registo = $data_registo;
    }
    public function getHoraInicio() {
        return $this->hora_inicio;
    }

    public function setHoraInicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }


    public function getHoraFim() {
        return $this->hora_fim;
    }

    public function setHoraFim($hora_fim) {
        $this->hora_fim = $hora_fim;
    }


    public function getLocal() {
        return $this->local;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

   
    public function getModalidade() {
        return $this->modalidade;
    }

    public function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }
    public function getTipoAvaliacao() {
        return $this->tipo_avaliacao;
    }

    public function setTipoAvaliacao($tipo_avaliacao) {
        $this->tipo_avaliacao = $tipo_avaliacao;
    }


    public function registarAvaliacao(){
        $conn = new Connect();
        $connection = $conn->connect();

        $sql = "INSERT INTO avaliacoes (
                    id_disciplina, id_docente, teste_numero, supervisor, 
                    data_realizacao, data_registo, hora_inicio, hora_fim, 
                    local, modalidade, tipo_avaliacao
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $connection->prepare($sql);

        $stmt->bind_param(
            "iiissssssss",
            $this->id_disciplina,
            $this->id_docente,
            $this->teste_numero,
            $this->supervisor,
            $this->data_realizacao,
            $this->data_registo,
            $this->hora_inicio,
            $this->hora_fim,
            $this->local,
            $this->modalidade,
            $this->tipo_avaliacao
        );

        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
        mysqli_close($connection);
    }


    public function visualizarAvaliacao($id_avaliacao){
        $conn = new Connect();
        $connection = $conn->connect();

        $sql = "SELECT * FROM avaliacoes WHERE id_avaliacao = ?";
        $stmt = $connection->prepare($sql);

        $stmt->bind_param("i", $id_avaliacao);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return null;
        }

        mysqli_close($connection);
    }

    public function actualizarAvaliacao($id_avaliacao){
        $conn = new Connect();
        $connection = $conn->connect();

        $sql = "UPDATE avaliacoes SET 
                    id_disciplina = ?, id_docente = ?, teste_numero = ?, supervisor = ?, 
                    data_realizacao = ?, data_registo = ?, hora_inicio = ?, hora_fim = ?, 
                    local = ?, modalidade = ?, tipo_avaliacao = ?
                WHERE id_avaliacao = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param(
            "iiissssssssi",
            $this->id_disciplina,
            $this->id_docente,
            $this->teste_numero,
            $this->supervisor,
            $this->data_realizacao,
            $this->data_registo,
            $this->hora_inicio,
            $this->hora_fim,
            $this->local,
            $this->modalidade,
            $this->tipo_avaliacao,
            $id_avaliacao
        );

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        mysqli_close($connection);
    }
   
    public function apagarAvaliacao($id_avaliacao) {
        $conn = new Connect();
        $connection = $conn->connect();
        $sql = "DELETE FROM avaliacoes WHERE id_avaliacao = ?";
        
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id_avaliacao);

         if($stmt->execute()){
            return true;
         }else{
            return false;
         }
        
         mysqli_close($connection);
    }
}
