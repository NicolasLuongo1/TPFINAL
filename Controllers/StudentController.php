<?php

    // Archivo donde se controlan los student y se redirigen las vistas del mismo
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
     use Exception;
     use Alert;
use DAO\AdminDAO;
use DAO\EmpresaDAO;

class StudentController
    {
        private $studentDAO;
        private $empresaDAO;
        private $adminDAO;

        public function __construct()
        {
        
           $this->studentDAO= new StudentDAO();
           $this->empresaDAO = new EmpresaDAO();
           $this->adminDAO=new AdminDAO();
    
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."perfil-admin.php");
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

                $this->stuAdentDO->Add($student);
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

                // aca con el email deberiamos recorrer la tabla de admin, de company y ver si existe ese email, si no existe recorremos la api y seguimos con lo de abajo

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


                if($this->empresaDAO->CompanyExist($email)){

                    echo "ese email lo tiene una empresa<br>";


                }
                else if($this->adminDAO->AdminExist($email)){
                    echo " ese email lo tiene un admin<br>";
                }
          
                else{


                    if($this->studentDAO->studentExistRegister($email)){

                        echo "ese email ya existe en otro alumno<br>";


                    }
                    else{

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
        
        
        
        
                            $email = $_POST['email'];
                            $password = $_POST['password'];
        
                            $student= null;
        try{
                            foreach($arrayToDecode as $valuesArray){
        
        
                                if($valuesArray['email'] == $email){
    
                                    echo "me rompi<br>";
        
                                    if($this->studentDAO->studentExistRegister($email)==false){
    
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
        
        
        
                                    $student->setPasword($password); // le seteo la password del form de register
                                    $student->setRole('user'); // aca le agrego por defecto que este sera un rol de tipo usuario
                                  $this->studentDAO->Add($student);
                                    $this->ShowPerfilView($student);
        
                                }
                                else{
                                    $this->ShowLoginView();
                                }
                            }
        
        
                            }
        
        
                            if($student==null){
                                $this->ShowLoginView(); // si esta mal me dirije al index otra vez
                            }
                        }  catch(Exception $ex){
                            throw $ex;
                        }


                    }

                          }



                }





        }

        

            

        


      

    
?>