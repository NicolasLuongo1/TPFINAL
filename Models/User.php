<?php

namespace Models;

class User{



private $email;
private $pasword;
private $role;


function __construct()
{
    
}



public function getEmail(){ return $this->email; }
public function setEmail($email): self { $this->email = $email; return $this; }

public function getPasword(){ return $this->pasword; }
public function setPasword($pasword): self { $this->pasword = $pasword; return $this; }

public function getRole(){ return $this->role; }
public function setRole($role): self { $this->role = $role; return $this; }
}




?>

