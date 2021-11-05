<?php


$studentId=8;
 $careerId=4;
 $lastName="nico";
 $firstName="Longo";
 $dni=43387321;
 $fileNumber=123;
 $gender="hola";
 $birthDate=null;
 $email="dsadsa";
 $phoneNumber=321332;
 $active=true;

 try{


    $pdo= new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  

    


    $insertStatement=$pdo->prepare("INSERT INTO students(studentId,careerId,lastName,firstName,dni,fileNumber,gender,birthDate,email,phoneNumber,activo) 
    VALUES (:studentId,:careerId,:lastName,:firstName,:dni,:fileNumber,:gender,:birthDate,:email,:phoneNumber,:activo)");

    $insertStatement->bindParam(":studentId",$studentId);
    $insertStatement->bindParam(":careerId",$careerId);
    $insertStatement->bindParam(":lastName",$lastName);
    $insertStatement->bindParam(":firstName",$firstName);
    $insertStatement->bindParam(":dni",$dni);
    $insertStatement->bindParam(":fileNumber",$fileNumber);
    $insertStatement->bindParam(":gender",$gender);
    $insertStatement->bindParam(":birthDate",$birthDate);
    $insertStatement->bindParam(":email",$email);
    $insertStatement->bindParam(":phoneNumber",$phoneNumber);
    $insertStatement->bindParam(":activo",$active);

    $insertStatement->execute();

    $selectStatement=$pdo->prepare("SELECT studentId,careerId,lastName,firstName,dni,fileNumber,gender,birthDate,email,phoneNumber,activo FROM students");
    $selectStatement->execute();
    $result=$selectStatement->fetchAll();

    

 }catch(PDOException $ex){
     echo $ex->getMessage();
 }
 
 

?>
