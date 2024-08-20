<?php
    Class Event{
        public $eventID;
        public $eventTitle;
        public $eventDate;
        public $eventTime;
        public $eventType;
        public $eventDescription;
        public $eventSpeakers;
        public $eventTargetAudience;
        public $eventPartners;

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

        public function get_eventTitle(){
            return $this->eventTitle;
        }
        public function set_eventTitle($eventTitle){
            $this->eventTitle = $eventTitle;
        }
        public function get_eventDate(){
            return $this->eventDate;
        }
        public function set_eventDate($eventDate){
            $this->eventDate = $eventDate;
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