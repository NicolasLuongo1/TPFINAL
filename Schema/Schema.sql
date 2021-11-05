create database university;
use university;

CREATE TABLE students
(
    studentId INT NOT NULL ,
    careerId INT NOT NULL,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    dni VARCHAR(15) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    gender VARCHAR(100),
    birthDate DATE,
    email VARCHAR(50),
    activo VARCHAR(5),
    fileNumber VARCHAR(34) NOT NULL,
    CONSTRAINT pk_student PRIMARY KEY (email)

)Engine=InnoDB;

CREATE TABLE passwordStudent(
emailS varchar(50) not null,
passwordS varchar(20) not null,
constraint fk_emailS foreign key(emailS) references students(email)
)Engine=InnoDB;



