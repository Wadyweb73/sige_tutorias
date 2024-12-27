<?php
    include_once("../sige_tutorias/app/Models/Avaliacao.php");

    class AvaliacaoController{

        public function registarAvaliacao($avaliacao) {
            if ($avaliacao->registarAvaliacao()) {
                return true;
            } else {
                return false;
            }
        }

        public function visualizarAvaliacao($id) {
            $avaliacao = new Avaliacao();
            $resultado = $avaliacao->visualizarAvaliacao($id);
    
            if ($resultado) {
                echo json_encode($resultado);
            } else {
                return false;
            }
        }


        public function actualizarAvaliacao($avaliacao, $id) {
            if ($avaliacao->actualizarAvaliacao($id)) {
                return true;
            } else {
                return false;
            }
        }
        
        public function apagarAvaliacao($id) {
            $avaliacao = new Avaliacao();
            if ($avaliacao->apagarAvaliacao($id)) {
                return true;
            } else {
                return false;
            }
        }

    }





















