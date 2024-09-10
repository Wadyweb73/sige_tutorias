<?php
   include_once("../sige_tutorias/app/Models/Tutoria.php");

    Class TutoriaController{
        public function registarTutoria($tutoria) {
            $tutoria->registarTutoria();
        }
    
        public function visualizarTutoria($id) {
            $tutoria = new Tutoria();
            $dadosTutoria = $tutoria->visualizarTutoria($id);
    
            if ($dadosTutoria) {
                echo json_encode($dadosTutoria);
            }
        }
    
        public function listarTutorias() {
            $tutoria = new Tutoria();
            $tutorias = $tutoria->listarTutorias();
            echo json_encode($tutorias);
        }
    
        public function actualizarTutoria($id, $idDisciplina, $idDocente, $horaInicio, $horaTermino, $dataRegisto, $dataRealizacao, $descricao) {
            $tutoria = new Tutoria();
            $tutoria->setIdDisciplina($idDisciplina);
            $tutoria->setIdDocente($idDocente);
            $tutoria->setHoraInicio($horaInicio);
            $tutoria->setHoraTermino($horaTermino);
            $tutoria->setDataRegisto($dataRegisto);
            $tutoria->setDataRealizacao($dataRealizacao);
            $tutoria->setDescricao($descricao);
            $tutoria->actualizarTutoria($id);
        }
    
        public function apagarTutoria($id) {
            $tutoria = new Tutoria();
            $tutoria->apagarTutoria($id);
        }
    }
?>