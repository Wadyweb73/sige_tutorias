<?php

include_once("../sige_tutorias/app/Models/Curso.php");

class CursoController{

    public function registarCurso($curso){
        $curso->registarCurso();
    }


    public function visualizarCurso($id){
        $curso = new Curso();
        $dadosCurso = $curso->visualizarCurso($id);

        if($dadosCurso){
            echo json_encode($dadosCurso);
        }
    }

    public function listarCursos(){
        $cursoList = new Curso();
        $curso = $cursoList->listarCursos();
        echo json_encode($curso);
    }

    public function actualizarCurso($id,$nomeCurso,$idFaculdade){
        $curso = new Curso();
        $curso->set_nomeCurso($nomeCurso);
        $curso-> set_idFaculdade($idFaculdade);
        $curso-> actualizarCurso($id);
    }

    public function apagarCurso($id) {
        $curso = new Curso();
        $curso->apagarCurso($id);
    }

}

?>
