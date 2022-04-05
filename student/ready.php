<?php
 session_start();
require('../class/class.php');
 $user= unserialize( $_SESSION["user"]);
 
   ?>

<!DOCTYPE html >


          
<html  >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SofCare End Exam  </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
      
         
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/js/bootstrap.js">
    </head>





    <body align="center">

    <div align="center" class="container-fluid" style="width:100%">
    
      <div class="jumbotron">
      
        <?php include("../class/sch.html"); ?>
    </div>
<h1 style="color:green"> <font face="Algerian">  WE WISH YOU SUCCESS</font> <font face="AR DESTINE">  <?php echo $user->name;?></font> </h1>
     
     
   <button name="start"> <h1 style="color:green">  <font face="AR DESTINE"> Start </font> </h1> </button> 
     
     
     
 
          
       
    </div><!-- /.container -->

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