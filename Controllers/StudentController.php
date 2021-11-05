<?php

    // Archivo donde se controlan los student y se redirigen las vistas del mismo

    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use DAO\EmpresaDAO as EmpresaDAO;
     use Exception;
     use Alert;
    use Models\Empresa;

class StudentController
    {
        private $studentDAO;
        private $empresaDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->empresaDAO = new EmpresaDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowPerfilView($student)
        {
            require_once(VIEWS_PATH."perfil-alumno.php");
        }


        public function ShowPerfilEmpresaView()
        {
            require_once(VIEWS_PATH."empresa-list-student.php");
        }

        // public function ShowPerfilEmpresaViewActual()
        // {
        //    $empresaList = $this->empresaDAO->GetAll();
        //     require_once(VIEWS_PATH."perfil-empresa.php");
        // }

        public function ShowLoginView()
        {
            require_once(VIEWS_PATH."indexLogin.php");
        }


        public function ShowSetPassword($student)
        {
            require_once(VIEWS_PATH."set-password-alumno.php");
        }


        // se registraria un alumno o empresa

        public function register()
        {
            require_once(VIEWS_PATH."register.php");
        }






        public function Add($studentId, $firstName, $lastName,$dni,$phoneNumber,$gender,$birthDate,$email,$active,$fileNumber)
        {
            // $alert = new Alert("","");

            try{
                $student = new Student();
                $student->setStudentId($studentId);
                $student->setfirstName($firstName);
                $student->setLastName($lastName);
                $student->setDni($dni);
                $student->setPhoneNumber($phoneNumber);
                $student->setGender($gender);
                $student->setBirthDate($birthDate);
                $student->setEmail($email);
                $student->setActive($active);
                $student->setFilenumber($fileNumber);

                $this->studentDAO->Add($student);
            }catch(Exception $ex){
                // $alert->setType("danger");
                // $alert->setMessage($ex->getMessage());
            }finally{
                $this->ShowAddView();
            }
        }


        public function bringStudent($studentId=null,$firstName=null,$lastName=null){
            // $alert = new Alert("","");
            $ch = CURL_INIT();

            $url =  'https://utn-students-api.herokuapp.com/api/Student';
    
            $header = array(
                'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
            );

             curl_setopt($ch,CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
    
             $response = curl_exec($ch);
            
            $arrayToDecode = json_decode($response,true);
           
            
            foreach($arrayToDecode as $valuesArray){
                
                 $student= new Student();
                $student->setStudentId($valuesArray['studentId']);
                $student->setCareerId($valuesArray['careerId']);
                $student->setfirstName($valuesArray['firstName']);
                $student->setLastName($valuesArray['lastName']);
                $student->setDni($valuesArray['dni']);
                $student->setFilenumber($valuesArray['fileNumber']);
                $student->setGender($valuesArray['gender']);
                $student->setBirthDate($valuesArray['birthDate']);
                $student->setEmail($valuesArray['email']);
                $student->setPhoneNumber($valuesArray['phoneNumber']);
                $student->setActive($valuesArray['active']);
               
               $this->studentDAO->Add($student);  // guarda en base de datos

           
    
            //    $alert->setType("danger");
            //    $alert->setMessage($ex->getMessage());
           

            }
            $this->ShowAddView();
        }
        
        public function hola (){
            echo "hola hola <br>";
        }
     
        

        public function bringValidation($email,$password){
            
           


            $ch = CURL_INIT();

            $url =  'https://utn-students-api.herokuapp.com/api/Student';
    
            $header = array(
                'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
            );

             curl_setopt($ch,CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
    
             $response = curl_exec($ch);
            
            $arrayToDecode = json_decode($response,true);
           
            $student=new Student();


            // Si la persona presiona iniciar sesion el metodo es POST

            if($_POST){ 



                $email = $_POST['email'];
                $password = $_POST['password'];



                foreach($arrayToDecode as $valuesArray){

                
                    if($valuesArray['email'] == $email){


                      //  $this->studentDAO->buscoEmailPasw($email,$password);

                        $student= new Student();
                        $student->setStudentId($valuesArray['studentId']);
                        $student->setCareerId($valuesArray['careerId']);
                        $student->setfirstName($valuesArray['firstName']);
                        $student->setLastName($valuesArray['lastName']);
                        $student->setDni($valuesArray['dni']);
                        $student->setFilenumber($valuesArray['fileNumber']);
                        $student->setGender($valuesArray['gender']);
                        $student->setBirthDate($valuesArray['birthDate']);
                        $student->setEmail($valuesArray['email']);
                        $student->setPhoneNumber($valuesArray['phoneNumber']);
                        $student->setActive($valuesArray['active']);

                        $this->ShowPerfilView($student); // si es correcto me lleva al perfil del student
                    }
                    else if($email== 'matiastesoriero@gmail.com'){

                        $this->ShowAddView();
                    }
                    else {
                        $this->ShowLoginView(); // si esta mal me dirije al index otra vez
                    }
                }

            }

          
            }



            public function bringValidationRegister($email,$password){
            
           
                $ch = CURL_INIT();
    
                $url =  'https://utn-students-api.herokuapp.com/api/Student';
        
                $header = array(
                    'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08'
                );
    
                 curl_setopt($ch,CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
        
                 $response = curl_exec($ch);
                
                $arrayToDecode = json_decode($response,true);
               
                $student=new Student();
    
    
                // Si la persona presiona iniciar sesion el metodo es POST
    
                if($_POST){ 
    
    
    
                    $email = $_POST['email'];
                    $password = $_POST['password'];
    
    
    
                    foreach($arrayToDecode as $valuesArray){
                        

                    
                        if($valuesArray['email'] == $email){
    
    
                          //  $this->studentDAO->buscoEmailPasw($email,$password);
    
                            $student= new Student();
                            $student->setStudentId($valuesArray['studentId']);
                            $student->setCareerId($valuesArray['careerId']);
                            $student->setfirstName($valuesArray['firstName']);
                            $student->setLastName($valuesArray['lastName']);
                            $student->setDni($valuesArray['dni']);
                            $student->setFilenumber($valuesArray['fileNumber']);
                            $student->setGender($valuesArray['gender']);
                            $student->setBirthDate($valuesArray['birthDate']);
                            $student->setEmail($valuesArray['email']);
                            $student->setPhoneNumber($valuesArray['phoneNumber']);
                            $student->setActive($valuesArray['active']);
    
                            $this->studentDAO->AddwithPassword($student,$password);
                            $this->ShowPerfilView($student);
                        }
                        else if($email== 'matiastesoriero@gmail.com'){
    
                            echo "Error ese mail ya existe<br>";
                        }
                        
                        else {
                            $this->ShowLoginView(); // si esta mal me dirije al index otra vez
                        }
                    }
    
                }
    
                   
                    
    
    
                }



















            public function AddwithPassword($studentId,$careerId, $firstName, $lastName,$dni,$phoneNumber,$gender,$birthDate,$email,$active,$fileNumber,$password)
        {
            // $alert = new Alert("","");

            try{

                
                $student = new Student();
                $student->setStudentId($studentId);
                $student->setCareerId($careerId);
                $student->setfirstName($firstName);
                $student->setLastName($lastName);
                $student->setDni($dni);
                $student->setPhoneNumber($phoneNumber);
                $student->setGender($gender);
                $student->setBirthDate($birthDate);
                $student->setEmail($email);
                $student->setActive($active);
                $student->setFilenumber($fileNumber);

                //$this->studentDAO->Add($student);

                $this->studentDAO->AddwithPassword($student,$password);
            }catch(Exception $ex){
                // $alert->setType("danger");
                // $alert->setMessage($ex->getMessage());
            }finally{
                $this->ShowPerfilView($student);
            }
        }
        }

        

            

        


      

    
?>