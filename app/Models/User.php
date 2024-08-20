<?php
    Class User{
        public $uID;
        public $uName;
        public $uPasswd;
        public $uCategory;

        public function get_uName(){
            return $this->uName;
        }
        public function set_uName($uName){
            $this->uName = $uName;
        }
        public function get_uPasswd(){
            return $this->uPasswd;
        }
        public function set_uPasswd($uPasswd){
            $this->uPasswd = $uPasswd;
        }
        public function get_uCategory(){
            return $this->uCategory;
        }
        public function set_uCategory($uCategory){
            $this->uCategory = $uCategory;
        }
    }
?>