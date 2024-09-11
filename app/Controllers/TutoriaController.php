<?php
include_once("../sige_tutorias/app/Models/Tutoria.php");

class TutoriaController {

    public function registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) {
        $tutoria = new Tutoria();
        $tutoria->setIdDisciplina($id_disciplina);
        $tutoria->setIdDocente($id_docente);
        $tutoria->setHoraInicio($hora_inicio);
        $tutoria->setHoraTermino($hora_termino);
        $tutoria->setDataRealizacao($data_realizacao);
        $tutoria->setDescricao($descricao);
        $tutoria->registarTutoria($id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao);
    }

    public function visualizarTutoria($id) {
        $tutoria = new Tutoria();
        $dadosTutoria = $tutoria->visualizarTutoria($id);

        if ($dadosTutoria) {
            echo json_encode($dadosTutoria);
        } else {
            echo json_encode(['mensagem' => 'Nenhuma Tutoria foi encontrada.']);
        }
    }

    public function listarTutorias(){
        $tutoriaList = new Tutoria();
        $tutoria = $tutoriaList->listarTutorias();
        echo json_encode($tutoria);
        
    }

    public function actualizarTutoria($id, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao) {
        $tutoria = new Tutoria();
        $tutoria->setIdDisciplina($id_disciplina);
        $tutoria->setIdDocente($id_docente);
        $tutoria->setHoraInicio($hora_inicio);
        $tutoria->setHoraTermino($hora_termino);
        $tutoria->setDataRealizacao($data_realizacao);
        $tutoria->setDescricao($descricao);
        $tutoria->actualizarTutoria($id, $id_disciplina, $id_docente, $hora_inicio, $hora_termino, $data_realizacao, $descricao);
    }

    public function apagarTutoria($id) {
        $tutoria = new Tutoria();
        $tutoria->apagarTutoria($id);
    }
}

?>
