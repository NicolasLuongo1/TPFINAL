<?php

namespace Controllers;

use DAO\AdminDAO;
use DAO\EmpresaDAO;
use DAO\StudentDAO;
use Models\Admin;

class AdminController{


    private $AdminDAO;
    private $empresaDAO;
    private $studentDAO;


    public function __construct()
    {
        $this->AdminDAO = new AdminDAO();
        $this->empresaDAO = new EmpresaDAO();
        $this->studentDAO = new StudentDAO();
        
    }


    public function showPerfilAdmin($admin){

        require_once(VIEWS_PATH."perfil-admin.php");

    }



    public function RegisterAdmin2()
    {
        require_once(VIEWS_PATH."registerAdmin.php");
    }












//esta funcion lo que hace es buscar si existe ese admin en la base de datos y de ser asi inicia la session

public function AdminValidation($email,$password){


    if($this->AdminDAO->AdminExistSession($email,$password)){


        return true;

    }
    else{
        return false;
    }

  

}





    public function registerAdmin($email,$password,$name){
        

        if($this->empresaDAO->CompanyExist($email)){

            echo " ese mail lo tiene una empresa<br>";

        }

        else if($this->studentDAO->studentExistRegister($email)){

            echo " ese mail lo tiene un estudiante<br>";
        }
 
        else{

            if($this->AdminDAO->AdminExist($email) == false){


                $email = $_POST['email'];
                $password = $_POST['password'];
                $name = $_POST['name'];
        
                $Admin = new Admin();
        
                $Admin->setEmail($email);
                $Admin->setPasword($password);
                $Admin->setName($name);
                $Admin->setRole('Admin');
                
        
                $this->AdminDAO->add($Admin);
        
                    $this->showPerfilAdmin($Admin);  
        
        
        
        
                }
        
                else{
                    echo "ya existe el admin<br>";
                }

        }

        

    }





}


?>