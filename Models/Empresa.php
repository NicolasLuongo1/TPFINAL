<?php

namespace Models;

use Models\User as User;

class Empresa extends User
{
private $idEmpresa;
private $name;
// private $countryOrigin;
// private $direction;
// private $description;
// private $img;


function __contructor(){

}

/* getters y setters */




public function getName(){ return $this->name; }
public function setName($name) { $this->name = $name; return $this;}


public function getIdEmpresa(){ return $this->idEmpresa; }
public function setIdEmpresa($idEmpresa): self { $this->idEmpresa = $idEmpresa; return $this; }
 
// public function getCountryOrigin(){ return $this->countryOrigin; }
// public function setCountryOrigin($countryOrigin) { $this->countryOrigin = $countryOrigin; return $this; }


// public function getDirection(){ return $this->direction; }
// public function setDirection($direction) { $this->direction = $direction; return $this; }


// public function getDescription() { return $this->description; }
// public function setDescription($description) { $this->description = $description; return $this; }


// public function getIdEmpresa() { return $this->idEmpresa; }
// public function setIdEmpresa($idEmpresa) { $this->idEmpresa = $idEmpresa; return $this; }



// public function getImg(){ return $this->img; }
// public function setImg($img): self { $this->img = $img; return $this; }


}



?>