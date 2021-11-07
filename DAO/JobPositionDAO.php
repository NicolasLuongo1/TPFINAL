<?php

namespace DAO;
use \Exception as Exception;
use DAO\IJobPositionDAO as IJobPositionDAO;
use Models\JobPositions as JobPositions;
use DAO\Connection as Connection;


class JobPositionDAO implements IJobPositionDAO
{

private $connection;
private $tableName="jobPosition";

public function Add(JobPositions $jobPositions)
{
    try{
        $query="INSERT INTO".$this->tableName."(jobPositionId, descriptionJ, careerId)
        VALUES (:jobPositionsId, :descriptionJ, careerId);";
        $parameters["jobPositionId"]=$jobPositions->getJobPositionId();
        $parameters["descriptionJ"]=$jobPositions->getDescriptionJ();
        $parameters["careerId"]=$jobPositions->getCareerId();
        $this->connection= Connection::GetInstance();
        $this->connection->ExecuteNonQuery($query,$parameters);
    }catch(Exception $ex){
        throw $ex;
    }
}

public function GetAll()
{
    try{
        $jobPositionsList=array();
        $query="SELECT * FROM ". $this->tableName;
        $this->connection=Connection::GetInstance();
        $resultSet=$this->connection->Execute($query);
        foreach($resultSet as $row){
            $jobPositions= new JobPositions();
            $jobPositions->setJobPositionId($row["jobPositionId"]);
            $jobPositions->setDescriptionJ($row["descriptionJ"]);
            $jobPositions->setCareerId($row["careerId"]);
            array_push($jobPositionsList,$jobPositions);
             }
             return $jobPositionsList;
    }catch(Exception $ex)
    {
        throw $ex;
    }
}

}


?>