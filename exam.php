
<?php
 session_start(); 
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];

require('class/class.php');

if (isset( $_SESSION['user'] )) {
	$user = unserialize($_SESSION['user']); 
}else{
	header('Location: ../exam'); 
}

$practics= getExam($c);
$res = new Result();
$res->setInit($id.$exam->id,$id,$exam->id);
  if($practics!=null){
  	$practics->qn=1;
$_SESSION['exam']=serialize($practics); 
if(isset($_SESSION['exam'])){
  $p  = unserialize($_SESSION['practics']); 
 header('Location: setQuestionView.php'); 
   
  die();

}

  }
  



 }else{
  header('Location: choose.php?c=practics'); 
  die();
 }
     



?>