<?php
    namespace Models;

    class Person
    {
        private $firstName;
        private $lastName;



        


        // getters and setters


       

        public function getFirstName(){
             return $this->firstName; 
            }

        public function setFirstName($firstName){ 
            $this->firstName = $firstName; return $this; 
        }

        public function getLastName(){
             return $this->lastName; 
            }

        public function setLastName($lastName){
             $this->lastName = $lastName; return $this; 
            }
    }
?>