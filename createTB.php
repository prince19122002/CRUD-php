<?php
//connection to DB
$servername="localhost";
$username="root";
$password="";
$database="records";
// creating a connection
$conn = mysqli_connect($servername, $username, $password, $database);
//if connection was not successful
if(!$conn){
    die("Failed to connect" . mysqli_connect_error());
}else{
     echo "Connection  successful";
}
echo "<br>";
// Create a table in the DB
$sql = "CREATE TABLE `users` (
 `ID` INT(50) NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(100) NOT NULL ,
 
 `phoneno` VARCHAR(100) NOT NULL ,
 `fathername` VARCHAR(100) NOT NULL ,
 
 `class` VARCHAR(100) NOT NULL ,
 `gender` VARCHAR(100) NOT NULL ,

 `email` VARCHAR(100) NOT NULL ,
 `note` VARCHAR(100) NOT NULL ,

 `DOB` VARCHAR(100) NOT NULL ,
 `AccCreatedOn` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

 `status` VARCHAR(100) NOT NULL ,
 `createdby` VARCHAR(100) NOT NULL ,
 PRIMARY KEY (`ID`))" ;
$result = mysqli_query($conn, $sql);
// Check for the table creation success
if($result){
    echo "The tables is created ";
}
else{
    echo "The tables is not created ". mysqli_error($conn);
}
?>