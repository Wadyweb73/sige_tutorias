<?php
    Class Actividade{
        private $tutoriaStart;
        private $tutoriaEnd;

        public function get_tutoriaStart(){
            return $this->tutoriaStart;
        }
        public function get_tutoriaEnd(){
            return $this->tutoriaEnd;
        }

        public function set_tutoriaStart($t_Start){
            $this->tutoriaStart = $t_Start;
        }
        public function set_tutoriaEnd($t_End){
            $this->tutoriaEnd = $t_End;
        }
    }
    Class Tutoria extends Actividade{
        private $tutoriaID;
        private $tutoriaAssunto;
        private $tutoriaNum;
        private $tutoriaLocal;
        private $tutoriaNumEstudante;
        private $tutoriaDescript;

        //Getters
        public function get_tutoriaID(){
            return $this->tutoriaID;
        }
        public function get_tutoriaAssunto(){
            return $this->tutoriaAssunto;
        }
        public function get_tutoriaNum(){
            return $this->tutoriaNum;
        }
        public function get_tutoriaLocal(){
            return $this->tutoriaLocal;
        }
        public function get_tutoriaNumEst(){
            return $this->tutoriaNumEstudante;
        }
        public function get_tutoriaDescript(){
            return $this->tutoriaDescript;
        }

        //Setters
        public function set_tutoriaID($t_ID){
            $this->tutoriaID = $t_ID;
        }
        public function set_tutoriaAssunto($t_Assunto){
            $this->tutoriaAssunto = $t_Assunto;
        }
        public function set_tutoriaNum($t_Num){
            $this->tutoriaNum = $t_Num;
        }
        public function set_tutoriaLocal($t_Local){
            $this->tutoriaLocal = $t_Local;
        }
        public function set_tutoriaNumEst($t_NumEst){
            $this->tutoriaNumEstudante = $t_NumEst;
        }
        public function set_tutoriaDescript($t_descript){
            $this->tutoriaDescript = $t_descript;
        }
    }
?>