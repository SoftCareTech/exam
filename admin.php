<?php
 session_start();
 unset( $_SESSION["exam"]);
require('class/class.php');
if(isset($_SESSION["user"])){
  $user=unserialize($_SESSION["user"]);
  if($user->role=="student"){
     header('Location: index.php'); 
   }

}else{
header('Location: index.php'); 

   exit;
}

       ?>

<!DOCTYPE html > 
<html >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" style="border-radius:30%;"  href="images/softcare tech (1).jpg">

    <title> Staff </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template --> 
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script>  
      <link href="lib/nav.css" rel="stylesheet">
      <link href="lib/slide.css" rel="stylesheet"> 
  
    </head>


 

    <body    >     
      
        <?php include("class/sch.html");  ?>
                   
  <div class="side-c" >
 <div class="sidenav"> 
       <label><a href="addExam.php"   >Set Exam Questions </a>    </label><br>
   <label> <a href="choose.php?c=edit"> Edit Exam Questions  </a>    </label><br>
   <label><a href="choose.php?c=merge"> Set Exam Questions From past Exams </a>  </label><br>
   <label><a href="viewWrittenExams.php"> View students Performances </a>    </label><br>
  
      <?php  if ($user->role=="admin"){ ?>
      <label><a href="staff">Manage Staff </a>   </label><br>
       <label><a href="classes">Manage Class </a>  </label><br>
       <label> <a href="student">Manage Student  </a>   </label><br>
      <label> <a href="task">Manage Task  </a>  </label><br>
       
<?php } ?> 
 
  </div>

        <div > 

          <div  class="slideshow-container" align="center">
<div class="mySlides fade"> 
  <img src="images/fgc gate (2).jpg"    > 
  <div class="text">The Target School</div>
</div>

<div class="mySlides fade"> 
    <img src="images/Raph at gate (1).jpg"    > 
  <div class="text">The Developer</div>
</div>

<div class="mySlides fade">
  
   <img src="images/softcare tech (1).jpg"    > 
  
  <div class="text">SoftCare </div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
 
</div> 
<div >
  Objectives of th software
  <ul>
    
    <ol>
   ----help the examination marking and enhances accuracy and tranparancy 
    </ol>
    <ol>
     -----train student to known use mouse, keyboard operation 
    </ol>
    <ol>
     ---remove the fear of computer based test from student 
    </ol>
      </ul>
     <h3> <a style="float:right; background-color: #f2f2f2 ;text-decoration:none;" href="staff/about.php">About the Developer</a></h3>
</div>









  </div>    
 
  <script type="text/javascript">
      var slideIndex = 0;

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}

showSlides();
</script>
 
    
<?php  
 include("class/footer.html") ?>

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
