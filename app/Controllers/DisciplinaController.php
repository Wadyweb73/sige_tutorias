<?php
    include_once("../sige_tutorias/app/Models/Disciplina.php");

class DisciplinaController{

public function registarDisciplina($disciplina){
    $disciplina->registarDisciplina();
}


public function visualizarDisciplina($id){
    $disciplina = new Disciplina();
    $dadosDisciplina = $disciplina->visualizarDisciplina($id);

    if($dadosDisciplina){
        echo json_encode($dadosDisciplina);
    }
}


public function listarDisciplinas(){
    $disciplinaList = new Disciplina();
    $disciplina = $disciplinaList->listarDisciplinas();
    echo json_encode($disciplina);
    
}

public function actualizarDisciplina($idDisciplina,$nomeDisciplina,$idCurso){
    $disciplina = new Disciplina();
    $disciplina->set_nomeDisciplina($nomeDisciplina);
    $disciplina-> set_idCurso($idCurso);
    $disciplina-> actualizarDisciplina($idDisciplina);
}

public function apagarDisciplina($id) {
    $disciplina = new Disciplina();
    $disciplina->apagarDisciplina($id);
}


}


?>