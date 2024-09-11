<?php
include_once("../sige_tutorias/app/Models/Tutoria.php");

class TutoriaController {


    public function registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao) {
        $tutoria = new Tutoria();
        $tutoria->registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_registo, $data_realizacao, $descricao);
    }


    public function visualizarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        $dadosTutoria = $tutoria->visualizarTutoria($id_tutoria);

        if ($dadosTutoria) {
            echo json_encode($dadosTutoria);
        } else {
            echo json_encode(['error' => 'Tutoria não encontrada']);
        }
    }

   
    public function listarTutorias() {
        $tutoria = new Tutoria();
        $tutorias = $tutoria->listarTutorias();
        echo json_encode($tutorias);
    }

    public function actualizarTutoria($id_tutoria, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) {
        $tutoria = new Tutoria();
        $tutoria->actualizarTutoria($id_tutoria, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao);
    }

    public function apagarTutoria($id_tutoria) {
        $tutoria = new Tutoria();
        $tutoria->apagarTutoria($id_tutoria);
    }
}

?>
