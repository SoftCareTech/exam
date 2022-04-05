<?php
 session_start();
require('../class/class.php');
 $user= unserialize( $_SESSION["user"]);


$task=null;  

if (isset( $_SESSION['user'] )) {
    $user = unserialize($_SESSION['user']); 
    $task=unserialize($_SESSION['task']);
}else{
    header('Location: ../exam'); 
}
 

 if(isset($_POST['s'])){
     $task->start=time();
$task->date=date('h:i:s');

$_SESSION["task"] = serialize($task); 
  if($task->type=="Exam"){
$r=unserialize($_SESSION['res']);


$res= new Result();
$res->setInit($r->id,$r->stuID,$r->examID);
$_SESSION["res"] = serialize($res);
 header('Location: ../answerQuestion.php'); 
 die();
  }else{
    header('Location: ../practice.php');  
    die();
  } 

}
   ?>

<!DOCTYPE html >


          
<html  >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SofCare Ready  </title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
       <link href="../lib/sticky-footer-navbar.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../lib/login.css">
    </head>





    <body align="center">
<?php include("../sch.html"); ?>
    <div align="center"   style="width:100% ;   ">
    
       
      <h2 style="color:green"> <font face="Algerian"> you are about to start <?php  echo $task->type; ?> </font> </h2>
     
 <form method="post">
     
     <h1 style="color:green">     <input type="submit" value="Start" name="s" id="s">  </h1>
 </form>    
     
 
     
         
<h3 style="color:green">   WE WISH YOU SUCCESS    <u> <?php echo $user->name;?></u>  </h3>
     
     
     
 
          
       
    </div><!-- /.container -->

    <?php include("../class/footer.html") ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>