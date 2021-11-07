<?php

namespace Controllers;

use Controllers\AdminController;
use Controllers\EmpresaController;
use Controllers\StudentController;
use DAO\AdminDAO;
use DAO\EmpresaDAO;
use DAO\StudentDAO;
use Models\Admin;
use Models\Empresa;
use Models\Student;

class SessionuserController{

private $adminDAO;
private $empresaDAO;
private $studentDAO;

private $adminController;
private $empresaController;
private $studentController;


public function __construct()
{
    $this->adminDAO = new AdminDAO();
    $this->empresaDAO = new EmpresaDAO();
    $this->studentDAO = new StudentDAO();

    $this->adminController = new AdminController();
    $this->empresaController = new EmpresaController();
    $this->studentController = new StudentController();
}


public function SessionLoguin($email,$password){


    $email = $_POST['email'];
    $password = $_POST['password'];




    if($this->adminController->AdminValidation($email,$password)){ // si es un ADMIN

        $admin = new Admin();

        $array = $this->adminDAO->BringAdmin($email,$password);
        


        foreach($array as $valuesArray){

            $admin->setIdAdmin($valuesArray['idAdmin']);
            $admin->setName($valuesArray['nameA']);
            $admin->setEmail($valuesArray['email']);
            $admin->setPasword($valuesArray['passwordS']);
            $admin->setRole($valuesArray['roles']);


        }

      
 
        $this->adminController->showPerfilAdmin($admin);

    }







    else if ($this->empresaDAO->CompanyExistSession($email,$password)){// si es una EMPRESA


        
        $empresa = new Empresa();

        $array = $this->empresaDAO->CompanyExistSession($email,$password);
        
     

        foreach($array as $valuesArray){

            $empresa->setIdEmpresa($valuesArray['idCompany']);
            $empresa->setName($valuesArray['nameC']);
            $empresa->setEmail($valuesArray['email']);
            $empresa->setPasword($valuesArray['passwordS']);
            $empresa->setRole($valuesArray['roles']);


        }

      
 
        $this->empresaController->ShowPerfilEmpresaViewActual($empresa);



    }
    else if($this->studentDAO->studentExist($email,$password)){ //si es un STUDENT


        $student = new Student();

        $array = $this->studentDAO->studentExist($email,$password);
        
     

        foreach($array as $valuesArray){

            $student->setStudentId($valuesArray['studentId']);
            $student->setFirstName($valuesArray['firstName']);
            $student->setLastName($valuesArray['lastName']);
            $student->setCareerId($valuesArray['careerId']);
            $student->setDni($valuesArray['dni']);
            $student->setPhoneNumber($valuesArray['phoneNumber']);
            $student->setGender($valuesArray['gender']);
            $student->setBirthDate($valuesArray['birthDate']);
            $student->setEmail($valuesArray['email']);
        $student->setPasword($valuesArray['passwordS']);
        $student->setRole($valuesArray['roles']);
        $student->setActive($valuesArray['activo']);
        $student->setFileNumber($valuesArray['fileNumber']);

        }

      
 
         $this->studentController->ShowPerfilView($student);



    }
    // else{
        
    //     $this->studentController->ShowLoginView();
    // }



    //aca tenemos que ver si ese email y contraseña esta en la tabla de Admin,Company o Students

    // depende donde este nos dirigimos a el metodo iniciar sesion de cada uno de estos





}



}




?>