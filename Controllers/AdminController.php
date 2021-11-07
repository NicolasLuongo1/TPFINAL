<?php

namespace Controllers;

use DAO\AdminDAO;
use Models\Admin;

class AdminController{


    private $AdminDAO;


    public function __construct()
    {
        $this->AdminDAO = new AdminDAO();
        
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


    $email = $_POST['email'];
    $password = $_POST['password'];


    $admin = new Admin(); // seguro hay que borrar esto, lo hago para evitar que tire errores

    if(null){ //aca lo que hago es ver si ese email y contraseña existen en la base de datos y de ser asi inicio la sesion

        $this->showPerfilAdmin($admin);

    }




}





    public function registerAdmin($email,$password,$name){
        
        echo "entre a register admin<br>";
     

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

                // $this->ShowPerfilEmpresaViewActual($Admin);  Esto aun no nesta hecho en AdminController




        }

        else{
            echo "ya existe el admin<br>";
        }


   



    }





}


?>