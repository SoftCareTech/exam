
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
if(isset($_REQUEST['s'])){
  $c =$_REQUEST['s'];
}else{
  header('Location: ../exam'); 
}
$practics= getExam($c);
 
$res = new Result();
  if($practics==null){
 echo "exam is not found in the database |".$c."|";
  }
else{
  $res->setInit($user->id.$practics->id."p",$user->id,$practics->id);

  	$practics->qn=1;

$_SESSION['practics']=serialize($practics);
$_SESSION['res']=serialize($practics);
if(isset($_SESSION['practics'])){
  $p  = unserialize($_SESSION['practics']); 
  echo $p->id;
    
 header('Location: task/ready.php'); 
   
  die();

}

  }
  



 }else{
  header('Location: choose.php?c=practics'); 
  die();
 }
     



?>