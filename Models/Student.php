<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $studentId;
        private $careerId;
        private $dni;
        private $fileNumber;
        private $gender;
        private $birthDate;
        private $email;
        private $phoneNumber;
        private $active;


        function __construct()
        {
            
        }





        // getters and setters


       

        public function getStudentId(){ return $this->studentId; }
        public function setStudentId($studentId): self { $this->studentId = $studentId; return $this; }

        public function getCareerId(){ return $this->careerId; }
        public function setCareerId($careerId): self { $this->careerId = $careerId; return $this; }


        public function getDni(){ return $this->dni; }
        public function setDni($dni): self { $this->dni = $dni; return $this; }

        public function getFileNumber(){ return $this->fileNumber; }
        public function setFileNumber($fileNumber): self { $this->fileNumber = $fileNumber; return $this; }

        public function getGender(){ return $this->gender; }
        public function setGender($gender): self { $this->gender = $gender; return $this; }

        public function getBirthDate(){ return $this->birthDate; }
        public function setBirthDate($birthDate): self { $this->birthDate = $birthDate; return $this; }

        public function getEmail(){ return $this->email; }
        public function setEmail($email): self { $this->email = $email; return $this; }

        public function getActive(){ return $this->active; }
        public function setActive($active): self { $this->active = $active; return $this; }

        public function getPhoneNumber(){ return $this->phoneNumber; }
        public function setPhoneNumber($phoneNumber): self { $this->phoneNumber = $phoneNumber; return $this; }
    }
?>

