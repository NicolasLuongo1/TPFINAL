<?php

    // Archivo donde se controlan los student y se redirigen las vistas del mismo

    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
     use Exception;
     use Alert;


class StudentController
    {
        private $studentDAO;
   

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
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
        
       
        public function bringValidation($email,$password){ /// funcion para inicio de sesion. YA FUNCIONA CON BASE DE DATOS
            
           


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
                $student= null;
                foreach($arrayToDecode as $valuesArray){

                
                    if($valuesArray['email'] == $email){


                       if($this->studentDAO->studentExist($email,$password)==true){
                       

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
                }
                    else if($email== 'matiastesoriero@gmail.com'){

                        $this->ShowAddView();
                    }
                    
                 
                }
                
                if($student==null){
                    $this->ShowLoginView(); // si esta mal me dirije al index otra vez
                }
                
            }

          
            }


 

            public function bringValidationRegister($email,$password){// esta funcion lo que hace es validar si el mail existe en la api, y si existe guarda el alumno con los datos de la api, mas la contraseña y le agrega el rol de students. FUNCIONANDO 
            

                
           
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
                        else if($email== 'matiastesoriero@gmail.com'){
    
                            echo "Error ese mail ya existe<br>";
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

        

            

        


      

    
?>