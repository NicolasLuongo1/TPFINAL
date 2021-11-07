<?php

use Controllers\AdminController;
use Controllers\EmpresaController;
use Controllers\StudentController;

class whoSessionLoguin{

private $adminController;
private $empresaController;
private $studentController;


public function __construct()
{
    $this->adminController = new AdminController();
    $this->empresaController = new EmpresaController();
    $this->studentController = new StudentController();
}


public function SessionLoguin($email,$password){

    //aca tenemos que ver si ese email y contraseña esta en la tabla de Admin,Company o Students

    // depende donde este nos dirigimos a el metodo iniciar sesion de cada uno de estos





}



}




?>