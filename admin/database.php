<?php

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "AttendanceMonitoring";

$connection = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error());

if(!$connection){
  die("Connection Failed: ".mysqli_connect_error() );
}
/*
else{
  echo "Connected !";
}*/

/* $sql = "create database AttendanceMonitoring"; */

/*
$sql = "create table student(
   StudentID int(255) AUTO_INCREMENT PRIMARY KEY,
   StudentName varchar(255) NOT NULL,
   Guardian varchar(255) NOT NULL,
   StudentContact int(255) NOT NULL,
   GuardianContact int(255) NOT NULL,
   GradeLevel varchar(255) NOT NULL
)";

$result = mysqli_query($connection, $sql);

if($result){
  echo "Table Created Successfully";
}else{
  echo "Error : ".mysqli_error($connection);
}*/

/*
$sql = "create table admin(
   AdminID int(255) AUTO_INCREMENT PRIMARY KEY,
   AdminName varchar(255) NOT NULL,
   AdminUsername varchar(255) NOT NULL,
   Email varchar (255) NOT NULL,
   Password varchar(255) NOT NULL
  )";

  $result = mysqli_query($connection, $sql);

  if($result){
    echo "Table Created Successfully";
  }else{
    echo "Error : ".mysqli_error($connection);
  }
*/

/*
$sql = "create table message(
        MessageTo int(255) AUTO_INCREMENT PRIMARY KEY,
        MessageFrom varchar(255) NOT NULL,
        MessageText varchar(255) NOT NULL,
        SendTime date NOT NULL,
        UserInfo varchar(255) NULL,
        ErrorText varchar(255) NULL
  )";

  $result = mysqli_query($connection, $sql);

  if($result){
    echo "Table Created Successfully";
  }else{
    echo "Error : ".mysqli_error($connection);
  }*/

?>
