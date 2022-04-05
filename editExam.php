
<?php

if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 session_start(); 
require('class/class.php');
$editExam= getExam($c);

  if($editExam!=null)
  $_SESSION['exam']=serialize($editExam);
if(isset($_SESSION['exam'])){
  $editExam = unserialize($_SESSION['exam']); 
 header('Location: addExam.php'); 
  die();

}



 }else{
  header('Location: choose.php?c=edit'); 
  die();
 }
     



?>