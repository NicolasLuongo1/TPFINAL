<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Exception;
use Models\Admin as Admin;
use DAO\Connection as Connection;

    class AdminDAO implements IAdminDAO
    {
        private $connection;
        private $tableName = "Admin_";


        public function __construct()
        {
            
        }


public function Add(Admin $admin){


    try
    {
        $query = "INSERT INTO ".$this->tableName." (email, passwordS,roles,nameA) 
        VALUES (:email, :passwordS, :roles, :nameA);";
        $parameters["email"] = $admin->getEmail();
        $parameters["passwordS"] = $admin->getPasword();
        $parameters["roles"] = $admin->getRole();
        $parameters["nameA"] = $admin->getName();
        


        $this->connection = Connection::GetInstance();
    
        
        $this->connection->ExecuteNonQuery($query, $parameters);
    
    }
    catch(Exception $ex)
    {
        throw $ex;
    }

}

public function GetAll()
{
    
}
        
// si existe debe retornar el admin
// o nulo en caso de no existir

public function AdminExist($email){
     try
    {

    $query = "SELECT * FROM ".$this->tableName. " WHERE email"."=".":email";


    // SELECT * FROM passwordStudent WHERE password = :password
         $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();

        $this->connection->Execute($query,$parameters);
    
        return ($this->connection->Execute($query,$parameters));

    }
    catch(Exception $ex)
    {
        throw $ex;
    }


}

public function AdminExistSession($email,$password){



    try
    {

        $query = "SELECT * FROM ". $this->tableName. " WHERE email "." =".":email"." and "." passwordS". "= ".":passwordS";

        


    // SELECT * FROM passwordStudent WHERE password = :password

         $parameters["email"] = $email;
         $parameters["passwordS"] = $password;

        $this->connection = Connection::GetInstance();

        $this->connection->Execute($query,$parameters);
    
        return ($this->connection->Execute($query,$parameters));

    }
    catch(Exception $ex)
    {
        throw $ex;
    }


}

public function BringAdmin($email,$password){



    try
    {

        $query = "SELECT * FROM ". $this->tableName. " WHERE email "." =".":email"." and "." passwordS". "= ".":passwordS";

     


    // SELECT * FROM passwordStudent WHERE password = :password
    
         $parameters["email"] = $email;
         $parameters["passwordS"] = $password;

        $this->connection = Connection::GetInstance();

        $this->connection->Execute($query,$parameters);
    
        return ($this->connection->Execute($query,$parameters));

    }
    catch(Exception $ex)
    {
        throw $ex;
    }


}













    }

    

   
?>