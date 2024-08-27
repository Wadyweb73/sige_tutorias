<?php
    Class Event{
        private $eventID;
        private $eventTitle;
        private $eventType;
        private $eventFaculty;
        private $eventSpeakers;
        private $eventTargetAudience;
        private $eventPartners;
        private $eventDescription;
        private $eventDate;
        private $eventTime;

        public function __construct(){
            $this->eventID = 0;
            $this->eventTitle = "";
            $this->eventDate = null;
            $this->eventTime = null;
            $this->eventType = "";
            $this->eventDescription = "";
            $this->eventSpeakers = "";
            $this->eventTargetAudience = "";
            $this->eventPartners = "";
        }

        public function get_eventID(){
            return $this->eventID;
        }
        public function set_eventID($e_ID){
            $this->eventID = $e_ID;
        }

        public function get_eventTitle(){
            return $this->eventTitle;
        }
        public function set_eventTitle($e_Title){
            $this->eventTitle = $e_Title;
        }
        public function get_eventFaculty(){
            return $this->eventFaculty;
        }
        public function set_eventFaculty($e_Faculty){
            $this->eventFaculty = $e_Faculty;
        }
        public function get_eventDate(){
            return $this->eventDate;
        }
        public function set_eventDate($e_Date){
            $this->eventDate = $e_Date;
        }
        public function get_eventTime(){
            return $this->eventTime;
        }
        public function set_eventTime($eventTime){
            $this->eventTime = $eventTime;
        }
        public function get_eventType(){
            return $this->eventType;
        }
        public function set_eventType($eventType){
            $this->eventType = $eventType;
        }
        public function get_eventDescription(){
            return $this->eventDescription;
        }
        public function set_eventDescription($eventDescription){
            $this->eventDescription = $eventDescription;
        }
        public function get_eventSpeakers(){
            return $this->eventSpeakers;
        }
        public function set_eventSpeakers($eventSpeakers){
            $this->eventSpeakers = $eventSpeakers;
        }
        public function get_eventTargetAudience(){
            return $this->eventTargetAudience;
        }
        public function set_eventTargetAudience($eventTargetAudience){
            $this->eventTargetAudience = $eventTargetAudience;
        }
        public function get_eventPartners(){
            return $this->eventPartners;
        }
        public function set_eventPartners($eventPartners){
            $this->eventPartners = $eventPartners;
        }
    }
?>