<?php
session_start();  
require('class/class.php');
if(isset($_REQUEST['examID'])  && isset($_REQUEST['result']) ){
  $c =$_REQUEST['c']; 
$exam=  getExam($_REQUEST['examID']);
$result= new Result();
$result->setResult($_REQUEST['result']);
 $_SESSION['res']= serialize($result);
  $_SESSION['practics']= serialize($exam);
header('Location: previewExam.php?c= submited succefully: see preview');
}else{

echo " Wrong  ID <br>";
echo $_REQUEST['examID']."<br>";
echo $_REQUEST['result'];
}
 

?>