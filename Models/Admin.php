<?php

namespace Models;

class Admin extends User{

    private $idAdmin;
    private $name;
    

    public function __construct()
    {


        
    }




    public function getIdAdmin(){ return $this->idAdmin; }
    public function setIdAdmin($idAdmin): self { $this->idAdmin = $idAdmin; return $this; }

    public function getName(){ return $this->name; }
    public function setName($name): self { $this->name = $name; return $this; }
}




?>