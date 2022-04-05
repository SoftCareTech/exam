<?php
 session_start();
       ?>

<!DOCTYPE html >
<html  >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SofCare login |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet"> 
        <!-- sweet Alert -->
      <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js">

     

   </script>     
    </head>





<body style="background-image: url('images/softcare tech (1).jpg'); ba opacity: 0.7 ;
  filter: alpha(opacity=70); background-size: cover; ;
  background-repeat: no-repeat ;"   > 
  <?php include("sch.html"); ?>  

    
</div>
    <div align="center"      > 
<h2  style="color:white ; padding: 3%" >Student Login </h2 >

    <div class="col-md-3 col-md-offset-3"   style=" background-color:#e6e6e6; "   >
      
     <p></p>
    <form   method="post"> 
    <div class="form-group">
     <label>  Name  </label>
    <input  type="text" class="form-control"  name="name" required="true">
    </div>
    <div class="form-group">
     <label> Password  </label>
    <input  type="password" class="form-control"  name="pass" >
    </div>
    
    <input  type="submit" class="btn btn-primary" value="login" name="login"  ; margin: 2%;">
    
    </form>

    
    </div> 
       </div> 
           
           
 
        
   <?php 


require('class/class.php');
   
 if(isset($_POST['login'])) {

if(isset($_POST['name'])&isset($_POST['pass'])) {

//login validation
$user= getUserS( $_POST['name'], $_POST['pass']);
 

if($user!="x"){
  $c =$_REQUEST['c'];
$_SESSION["user"]= serialize($user);
 $res= new Result();
//setInit($id, $stuID,$examID) 
if($c=="practics"){
  $task=getTasks();
  $boo=null;
  ///checking for exams
 foreach ($task as $t) {
  if($t->type=="Exam"){
    header("Location: staff/error.php?c= you can not do practics during Exams ::::: Ask admin to activate you <a href='../'> Back</a>"); 
  die(); 
  }
} //end checking

$st=getStudent($user->id);
 $boo=null;
 $task=getTasks();
foreach ($task as $t) {
  if($t->class==$st->currentClass){
    $boo=$t;

  }
}
if($boo!=null){

$_SESSION["task"]= serialize($boo);
  if($boo->type=="practics"){
     header("Location: practicss.php?c=".$boo->examID);
  } else if($boo->type=="general"){
header("Location: choose.php?c=practics");
  } else{

  }
}else{
   header("Location: staff/error.php?c=No task found   for you <a href='../'> Back</a>"); 
  die();
}


}
else{   

 $st=getStudent($user->id);
 $boo=null;
 $task=getTasks();
foreach ($task as $t) {
  if($t->class==$st->currentClass){
    $boo=$t;

  }
}
if($boo==null){
   header("Location: staff/error.php?c=No task found   for you <a href='../'> Back</a>"); 
  die();
}

if($boo->type!="Exam"){
 header("Location: staff/error.php?c=No exam task found for you but <mark> $boo->type </mark> is ready for your <a href='../'> Back</a>"); 
  die();
}
$exam=null;
if($boo!=null)
$exam = getExam($boo->examID);

if($exam!=null){
$exam->qn=1;
$_SESSION["task"]= serialize($boo);
$_SESSION["user"]= serialize($user);
$_SESSION["exam"]= serialize($exam);
$res->setInit($user->id.$exam->id,$user->id,$exam->id);
$_SESSION["res"] = serialize($res); 
if(isset($_SESSION['res'])){
header('Location: task/ready.php'); 
 exit;
}
}
else{
   
  header("Location: staff/error.php?c=The Exams id problem: contact admin <a href='../'></a>"); 
    die();}

}//end else of practics

} //if not login
else{
   // echo "  wrong password or username";

echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "Wrong Password or Username!", "error");' ,
     '</script>' ;


     }

}
else{

  echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "Wrong Password or Username!!!... Note All Fileds are required", "error");' ,
     '</script>' ;

    //echo "all field required :wrong password or username";
  }
///end login validation


}//end if login button
   ?>

    <?php include("class/footer.html") ?>


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
