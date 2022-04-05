<?php



$hostname="localhost:2008";
$username="root";
$password ="NGUEMO";
 $dbname="exam";

$db = mysqli_connect($hostname,$username,$password,$dbname);
if(!$db){
     echo"errror in connection ";
die(mysqli_connection_error());
    echo"connection Error";
}else{
  // echo"connected";
}


?>
