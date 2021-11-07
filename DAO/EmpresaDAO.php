<?php
    namespace DAO;

use DAO\IEmpresaDAO as IEmpresaDAO;
use Exception;
use Models\Empresa as Empresa;
use DAO\Connection as Connection;

    class EmpresaDAO implements IEmpresaDAO
    {
        private $connection;
        private $tableName = "Company";

        public function Add(Empresa $empresa)
        {

            try
                {

                // Primero validar con el ExistCompany y luego hacer lo de abajo

                $query = "INSERT INTO ".$this->tableName." (nameC, email,passwordS, roles) 
                VALUES (:nameC, :email, :passwordS, :roles);";


               
                $parameters["nameC"] = $empresa->getName();
                $parameters["email"] = $empresa->getEmail();
             

                $parameters["passwordS"]=$empresa->getPasword();
                $parameters["roles"] = $empresa->getRole();

                $this->connection = Connection::GetInstance();
            
                
                $this->connection->ExecuteNonQuery($query, $parameters);
            
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        // reveer porque no funciona ===========================

        public function CompanyExist($email){
 
            try{
     
            $query = "SELECT * FROM ".$this->tableName. " WHERE email"."=".":email";


            $parameters["email"]=$email;
            $this->connection = Connection::GetInstance();


            return $this->connection->Execute($query,$parameters);


            }catch(Exception $ex){
                throw $ex;
            }
        }



        public function CompanyExistSession($email,$pasword){
 
  

            try{
                $query = "SELECT * FROM ". $this->tableName. " WHERE email "." =".":email"." and "." passwordS". "= ".":passwordS";



            $parameters["email"]=$email;
            $parameters["passwordS"]=$pasword;
            $this->connection = Connection::GetInstance();


            return $this->connection->Execute($query,$parameters);


            }catch(Exception $ex){
                throw $ex;
            }
        }








        public function RemoveData($index){
            $this->RetrieveData();

            unset($this->empresaList[$index]);

            $this->SaveData();
        }

        public function ModifyData($nuevaLista){

            $this->empresaList = $nuevaLista;
            $this->SaveData();
        }

        public function GetAll()
        {
          
            try
            {   $empresaList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $empresa = new Empresa();
                    $empresa->setName($row["name"]);
                    $empresa->setEmail($row["email"]);
                    array_push($empresaList, $empresa);
                }

                return $empresaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->empresaList as $empresa)
            {
              //  $valuesArray["idEmpresa"] = $empresa->getIdEmpresa();
                $valuesArray["name"] = $empresa->getName();
                $valuesArray["countryOrigin"] = $empresa->getCountryOrigin();
                $valuesArray["direction"] = $empresa->getDirection();
                $valuesArray["description"] = $empresa->getDescription();
                $valuesArray["img"] = $empresa->getImg();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/empresa.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->empresaList = array();

            if(file_exists('Data/empresa.json'))
            {
                $jsonContent = file_get_contents('Data/empresa.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $empresa = new Empresa();
                   // $empresa->setIdEmpresa($valuesArray["idEmpresa"]);
                    $empresa->setName($valuesArray["name"]);
                    // $empresa->setCountryOrigin($valuesArray["countryOrigin"]);
                    // $empresa->setDirection($valuesArray["direction"]);
                    // $empresa->setDescription($valuesArray["description"]);
                    // $empresa->setImg($valuesArray["img"]);
                    array_push($this->empresaList, $empresa);
                }
            }
        }

        
    }
?>