<?php 
session_start();
 $c="";
 if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 }else{
  header('Location: ../'); 
  die();
 } 
require('../class/class.php');
if(isset($_SESSION['user'])){
$user= unserialize($_SESSION['user']); }
else {
  $user=null; 
  }     ?>
<!DOCTYPE html > 
<html  >
    <head>
        <style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}


tr:nth-child(odd){background-color: #f2f2f2}
</style>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SofCare error page  |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
      
         
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/js/bootstrap.js">
    </head>
  <body  align="center" >
    <div class="container-fluid" style="width:100%"><div class="
      jumbotron"> 
        <?php include("../sch.html");  ?>
    </div>
<div align="center">
    <div class="col-md-6 col-md-offset-3" >
    
    
    <h1 style="color: red;"> Error: </h1><h2>  <?php echo $c;  ?></h2>
 
   <?php  if($user!=null) echo " <a  ".$uc."' href='../changePassword.php' > ".$user->name."  </a>"; ?>

    </div> 
         

        </div><!-- /.blog-main -->

        <div> <a href="../"> Back to home</a> </div>

      </div><!-- /.row -->
      

    </div><!-- /.container -->

    


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
