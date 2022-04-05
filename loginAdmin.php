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
       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script>  
    </head>





<body style="background-image: url('images/softcare tech (1).jpg'); ba opacity: 0.7 ;
  filter: alpha(opacity=70); background-size: cover; ;
  background-repeat: no-repeat ;"   >
    
   
  <?php include("sch.html"); ?> 
</div>
    <div align="center"      > 
<h2  style="color:white ; padding: 3%" >Staff Login </h2 >

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

    $user= getUserA( $_POST['name'], $_POST['pass']);

    if($user!="x"){
  
$_SESSION["user"] = serialize($user); 

if(isset($_REQUEST["c"])){
    $c=$_REQUEST["c"];

if($c=="exam") {
        if(isset($_SESSION['user'])){
     header("Location: choose.php?c=write");
    die();     
    }
     }else if($c=="admin"){
        if(isset($_SESSION['user'])){
echo '<script type="text/javascript">',
 
     'swal({
  title: "Login Success",
  text: "You are login",
  timer: 2000,
  showConfirmButton: false
});' ,

     '</script>' ;
           
            echo " <div color='red' ><strong> <mark>  Your are login  </mark> </strong> </div>";
        
  header("Location: admin.php");
    die();
    }
} else{ 
    
    header("Location: index.php");
    die(); }
 }

} else{
   // echo " <div color='red' ><strong> <mark> wrong password or username  </mark> </strong> </div>";
 echo '<script type="text/javascript">',
     'sweetAlert("Login Error", "Wrong Password or Username!", "error");' ,
     '</script>' ;


 }

}}
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
