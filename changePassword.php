<?php
 session_start();
$user=null;
require('staff/staff.php');
require('class/class.php');

 if(isset($_SESSION['user'])){
  $user= unserialize($_SESSION['user']); 

}else{
 

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

    <title> SofCare change password |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

     <link href="lib/sticky-footer-navbar.css" rel="stylesheet"> 
     <link href="lib/form.css" rel="stylesheet"> 
    <!-- Custom styles for this template --> 
    <!-- sweet Alert -->
      <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script>

     
    </head>





    <body  align='center'> 
        <?php include("class/sch.html"); ?>
   
<div  <?php echo "$tit"; ?>align='center'><h3>   <a href= '#'  > Change Password
      </a>  </h3> </div>   
     <p></p>

<?php   


 if(isset($_POST['Register'])) {

$u="";
$nu="";
$pass="";
$npass="";
$cpass="";

$u=$_POST['login'];
$nu=$_POST['nlogin'];
$pass=$_POST['pass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
$st=null;


if($npass==$cpass){


$s=null;
    if($user->role!="student"){
$s= getUserA($nu,$npass);
$ss= getUserA($u,$pass);

 $st= getStaffById($user->id);
    if($st==null){
     header('Location: error.php?c=login  to  change password Or user is not in staff  table '); 
  die();  
    }

  }else{
    $s= getUserS($nu,$npass);
    $ss= getUserS($u,$pass);
    $st= getStudentById($user->id);
    if($st==null){
     header('Location: error.php?c=login  to  change password Or user is not in student  table '); 
  die();  
    }

  }

  if($ss!="x"){
if($s=="x"){





if(trim($st->user," \n\t\0\x0B\r")==$u){
if(trim($st->pass," \n\t\0\x0B\r")==$pass ){

$st->pass= $npass;
$st->user=$nu;
//echo "here1".$st->pass.$st->user;
$st->submitUpdate1($st->id);


  
}else{
 // echo  "|".$pass."| <mark> Old password  is not correct ok! </mark> ";

 echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "Old password  is not correct ok!!!... Note All Fileds are required", "error");' ,
     '</script>' ;


}}
  else{
    echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "Old Username is not correct ok!!!... Note All Fileds are required", "error");' ,
     '</script>' ;

 // echo  "|".$u."|<mark> Old Username is not correct ok! </mark>";
}


}else{

  echo '<script type="text/javascript">',
     'sweetAlert("Error", "change NEW login or NEW passsword  !!!", "error");' ,
     '</script>' ;
//echo "<mark> Error ocured: change NEW login or NEW passsword  </mark>";
  }

} else{
   echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "old username and password  is/are not correct   !!!", "error");' ,
     '</script>' ;
 // echo $ss."<mark> old username and password  is/are not correct </mark>";
}

}else{
  echo '<script type="text/javascript">',
     'sweetAlert("Error", "Error in  new password comfirmation!!!", "error");' ,
     '</script>' ;
  //echo " <mark> Error in passs new password comfirmation </mark>";
}


} // End of register student.............


   ?>
 
<div class="container">
    <div class="row col-md-8 col-md-offset-3" >

 
    <form   method="post">
   
    <div class="row">
      <div class="col-25"> <label> Old login </label></div>
      <div class="col-75">   <input type="text" class="form-control"  name="login" > </div>
    </div>
    <div class="row">
   <div class="col-25">   <label> Old password </label></div>
      <div class="col-75">  <input type="password" class="form-control" name="pass"  ></div>
    </div>
    <div class="row">
       <div class="col-25">  <label> New login </label></div>
      <div class="col-75"> <input type="text" class="form-control"  name="nlogin" ></div>
    </div>

    <div class="row">
       <div class="col-25">  <label> New password </label></div>
      <div class="col-75"> <input type="password" class="form-control"  name="npass"  ></div>
   
   
    </div>
<div class="row">
   <div class="col-25">  <label> Retype New login </label></div>
      <div class="col-75"> <input type="password" class="form-control"  name="cpass"  ></div>
   
   
    </div>


    <div class="row col-md-12 col-md-offset-0"  align="center">    
    <input type="submit" class="btn btn-primary" value="submit changes" name="Register" >
    </div>

    </form>
 

 </div>
</div></div>

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
