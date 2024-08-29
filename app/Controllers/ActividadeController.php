<?php

    Class ActividadeController{
        //public function createEvent($tema, $tipo, $faculdade, $orador, $audiencia, $parceiro, $descricao, $inicio, $fim){
            public function createTutoria($tutoria){
            // 
            $conn = new mysqli("localhost", "root", "", "sigetutoria");
            $stmt = $conn->prepare("INSERT INTO tutoria() VALUES()");
            //$stmt->bind_param("sssssssss", $tema, $tipo, $faculdade, $orador, $audiencia, $parceiro, $descricao, $inicio, $fim);
            $stmt->bind_param("s", $tutoria->get_eventTitle(), $tutoria->get_tutoriaType(), $tutoria->get_tutoriaFaculty(), $tutoria->get_tutoriaSpeakers(), $tutoria->get_tutoriaTargetAudience(), $tutoria->get_tutoriaPartners(), $tutoria->get_tutoriaDescription(), $tutoria->get_tutoriaDate(), $tutoria->get_tutoriaTime());
            if($stmt->execute()){
                return true;
            }
            else{
                echo "something went wrong";
            }
        }
        public function viewTutoria(){
            // 
        }
        public function updateTutoria(){
            // 
        }
        public function deleteTutoria(){
            // 
        }
    }
?>