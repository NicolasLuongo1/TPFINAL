<?php
    namespace DAO;


    use \Exception as Exception;
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;    
    use DAO\Connection as Connection;

    class StudentDAO implements IStudentDAO
    {
        private $connection;
        private $tableName = "students";
    

        public function Add(Student $student)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (studentId, careerId, firstName, lastName, dni, phoneNumber, gender, birthDate, email, activo, fileNumber,passwordS,roles) 
                VALUES (:studentId, :careerId, :firstName, :lastName, :dni, :phoneNumber, :gender, :birthDate, :email, :activo, :fileNumber, :passwordS, :roles);";
                $parameters["studentId"] = $student->getStudentId();
                $parameters["careerId"] = $student->getCareerId();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["email"] = $student->getEmail();
                $parameters["activo"] = $student->getActive();
                $parameters["fileNumber"] = $student->getFileNumber();
                
                // nuevo ==========================

                $parameters["passwordS"]=$student->getPasword();
                $parameters["roles"] = $student->getRole();

                $this->connection = Connection::GetInstance();
            
                
                $this->connection->ExecuteNonQuery($query, $parameters);
            
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {

            
            try
            {

              

                $studentList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $student = new Student();
                    $student->setStudentId($row["studentId"]);
                    $student->setCareerId($row["careerId"]);
                    $student->setFirstName($row["firstName"]);
                    $student->setLastName($row["lastName"]);
                    $student->setDni($row["dni"]);
                    $student->setPhoneNumber($row["phoneNumber"]);
                    $student->setGender($row["gender"]);
                    $student->setBirthDate($row["birthDate"]);
                    $student->setEmail($row["email"]);
                    $student->setActive($row["activo"]);
                    $student->setFileNumber($row["fileNumber"]);
                    

                    array_push($studentList, $student);
                }

                return $studentList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }





        public function AddwithPassword($student,$password)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (studentId, careerId, firstName, lastName, dni, phoneNumber, gender, birthDate, email, activo, fileNumber) 
                VALUES (:studentId, :careerId, :firstName, :lastName, :dni, :phoneNumber, :gender, :birthDate, :email, :activo, :fileNumber);";
                $parameters["studentId"] = $student->getStudentId();
                $parameters["careerId"] = $student->getCareerId();
                $parameters["firstName"] = $student->getFirstName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["email"] = $student->getEmail();
                $parameters["activo"] = $student->getActive();
                $parameters["fileNumber"] = $student->getFileNumber();
        

                
                $this->connection = Connection::GetInstance();
                
                $this->connection->ExecuteNonQuery($query, $parameters);


                // aca lo que haria seria agregar la contraseña en la tabla

                $query2 = "INSERT INTO ".$this->tableName2."(passwordS,emailS) VALUES (:passwordS, :emailS);";

                
                $parameters2["passwordS"] = $password;
                $parameters2["emailS"] = $student->getEmail();

                $this->connection = Connection::GetInstance();
            
                
                $this->connection->ExecuteNonQuery($query2, $parameters2);
            
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }




        public function studentExist($email,$pasword)   
        {
            try
            {

            $query = "SELECT * FROM ". $this->tableName. " WHERE email "." =".":email"." and "." passwordS". "= ".":passwordS";
            
                 $parameters["email"]=$email;
                 $parameters["passwordS"]=$pasword;
 
                 $this->connection = Connection::GetInstance();
                return $this->connection->Execute($query,$parameters);
                 
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function studentExistRegister($email)   
        {
            try
            {

            $query = "SELECT * FROM ". $this->tableName. " WHERE email "." =".":email";
            
                 $parameters["email"]=$email;
 
                 $this->connection = Connection::GetInstance();
                return $this->connection->Execute($query,$parameters);
                 
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }







    }


    
?>