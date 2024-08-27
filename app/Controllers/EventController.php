<?php

    Class EventController{
        //public function createEvent($tema, $tipo, $faculdade, $orador, $audiencia, $parceiro, $descricao, $inicio, $fim){
            public function createEvent($event){
            // 
            $conn = new mysqli("localhost", "root", "", "sigenv");
            $stmt = $conn->prepare("INSERT INTO evento(tema, tipo, faculdade, orador, audiencia, parceiro, descricao, inicio, fim) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //$stmt->bind_param("sssssssss", $tema, $tipo, $faculdade, $orador, $audiencia, $parceiro, $descricao, $inicio, $fim);
            $stmt->bind_param("sssssssss", $event->get_eventTitle(), $event->get_eventType(), $event->get_eventFaculty(), $event->get_eventSpeakers(), $event->get_eventTargetAudience(), $event->get_eventPartners(), $event->get_eventDescription(), $event->get_eventDate(), $event->get_eventTime());
            if($stmt->execute()){
                return true;
            }
            else{
                echo "something went wrong";
            }
        }
        public function viewEvent(){
            // 
        }
        public function updateEvent(){
            // 
        }
        public function deleteEvent(){
            // 
        }
    }
?>