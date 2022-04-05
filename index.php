<?php
 session_start();
 unset( $_SESSION["exam"]);
unset( $_SESSION["res"]);
unset( $_SESSION["user"]); 
       ?>

<!DOCTYPE html >
         
<html >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SofCare |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
      <link href="lib/form.css" rel="stylesheet">
      
       
    </head>

    <body  style="background-image: url('images/computers.jpg') ; background-repeat: no-repeat;background-size: 100% 100%; height: 100%  ;" > 
<?php 
include("head.php");

?>
 
<h1> <a href="staff/about.php" > SoftCare Tech Computer Guide </a> </h1>

</div>

<div  style="  padding-top: 3%;  ;   align-self: center;"  >
       

  <p align="center">
      <a id='e' href="loginStudent.php?c=exam">  <button type="button"    >Examination </button>    </a>
</p>  
<p align="center" >
    
 <button style=" margin : 6% 9% 6% 9%;" type="button"   data-toggle="modal" data-target="#myModal">Help</button> 
   <a id="a" href="loginAdmin.php?c=admin"> 
    <button style=" margin : 6% 9% 6% 9%;" type="button"    >Staff </button>  </a>
            
        </p>
<p align="center">
   <a  id='p' href="loginStudent.php?c=practics">  <button type="button" > Practice  </button> </a>
</p>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quick Guide     </h4>
      </div>
      <div class="modal-body">
        <p>Press <b>Examination</b>  for test or Examination(your scores will be recorded) </p>
        <p> Press <b>Practice</b> for Traning on E-test (No scores will be recorded)</p>
          <p> Press <b>Staff</b> if you are a Staff </p>
          <P> <a href="help">Read more...</a> <a style="float:right;" href="staff/about.php">About the Developer</a></P>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

<div style="color: white; border-color:yellow; display: inline-block; background:#37b2cf ">
  Objectives of th software
  <ul>
    
    <ol>
    help the examination marking and enhances accuracy and tranparancy 
    </ol>
    <ol>
     Train student to known use mouse, keyboard operation 
    </ol>
    <ol>
     Remove the fear of computer based test from student 
    </ol>
      </ul>
     <h3> <a style="float:right; background-color: #f2f2f2" href="staff/about.php">About the Developer</a></h3>
</div>

    
<?php 
require('class/footer.html'); ?>

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
