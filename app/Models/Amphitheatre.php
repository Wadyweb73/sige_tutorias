<?php
    Class Amphthreate{
        public $amphID;
        public $amphName;
        public $amphFaculty;
        public $amphCapacity;
        
        public function get_amphID(){
            return $this->amphID;
        }
        public function set_amphID($a_ID){
            $this->amphID = $a_ID;
        }
        public function get_amphName(){
            return $this->amphName;
        }
        public function set_amphName($a_name){
            $this->amphName = $a_name;
        }
        public function get_amphFaculty(){
            return $this->amphFaculty;
        }
        public function set_amphFaculty($a_faculty){
            $this->amphFaculty = $a_faculty;
        }
        public function get_amphCapacity(){
            return $this->amphCapacity;
        }
        public function set_amphCapacity($a_capacity){
            $this->amphCapacity = $a_capacity;
        }

    }
?>