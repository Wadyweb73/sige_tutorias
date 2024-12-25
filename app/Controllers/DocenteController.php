<?php
    require_once __DIR__.'/../Models/Docente.php';


class DocenteController{


    // public function registarDocente($docente){
    //     $docente->registarDocente();
    // }

    public function Registar(){
        
        $nome = $_POST['nome'];
        $id_faculdade = $_POST['id_faculdade'];
        $id_curso = $_POST['id_curso'];
        $id_disciplina = $_POST['id_disciplina'];
    
        $docente = new Docente();
        $docente ->registarDocente($nome, $id_faculdade, $id_curso, $id_disciplina);
    }

    public function buscarDocentePorId($id) {
        $docenteModel = new Docente();
        return $docenteModel->buscarPorId($id);
    }
    
    public function atualizarDocente($id_docente, $nome_docente, $id_faculdade, $id_curso, $id_disciplina) {
        $docenteModel = new Docente();
        if ($docenteModel->atualizarDocente($id_docente, $nome_docente, $id_faculdade, $id_curso, $id_disciplina)) {
            $_SESSION['message'] = "Tutor atualizado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao atualizar o tutor.";
        }
    }

    public function deletarDocente($id_docente) {
        $docenteModel = new Docente();
        if ($docenteModel->deletarDocente($id_docente)) {
            $_SESSION['message'] = "Tutor deletado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao deletar o tutor.";
        }
    }
    
    
    

    public function visualizarDocente($id){
        $docente = new Docente();
        $dadosDocente = $docente->visualizarDocente($id);
    
        if($dadosDocente){
            echo json_encode($dadosDocente);
        }
    }

    public function listarDocentes(){
        $docenteList = new Docente();
        $docente = $docenteList->listarDocentes();
        echo json_encode($docente);
        
    }


    public function actualizarDocente($id,$idFaculdade,$idCurso,$idDisciplina,$nome){
        $docente = new Docente();
        $docente->set_idFaculdade($idFaculdade);
        $docente-> set_idCurso($idCurso);
        $docente-> set_idDisciplina($idDisciplina);
        $docente-> set_nome($nome);
        $docente-> actualizarDocente($id);
    }
    
    public function apagarDocente($id) {
        $docente = new Docente();
        $docente->apagarDocente($id);
    }
    

}

?>