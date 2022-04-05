<?php
 session_start();
$user=null;
require('staff.php');
require('../class/class.php');

 if(isset($_SESSION['user'])){
  $user= unserialize($_SESSION['user']); 

  if($user->role=='student'){
header('Location: ../');
  }  else if($user->role=='staff'  ){
header('Location: ../admin.php');
  }
 
 }else{
  header('Location: ../');
 }
 

$c="";
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 }else{
  header('Location: ../staff'); 
  die();
 } 

 $sta= getStaffById($c);
    if($sta==null ){
      if($_REQUEST['msg']==null)
  header('Location: error.php?c=The seleted Staff Detail Cannot by View'); 
    else   echo "Error ...........|".$c."|.........";
  die();  
    }



 


if(isset($_REQUEST['msg'])){
  $msg =$_REQUEST['msg'];
  $block=$_REQUEST['block']; 
if($block=="block"){
  $sta->blocked="yes";
  $sta->blockMsg=$msg; 
 } else 
 {
   $sta->blocked="no";
   $sta->case=$sta->case.$sta->blockMsg;
   $sta->blockMsg='';
 } 
   if( $sta->submitUpdate()==true) echo "true"; else  echo " Error "; 
    
 
    
die();
 
} // End of block from outside.............




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
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="../lib/sticky-footer-navbar.css" rel="stylesheet">
      <link href="../lib/table.css" rel="stylesheet">
      <!-- sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../lib/sweetalert.css">
   <script src="../lib/sweetalert.min.js"></script> 
    </head>





    <body align="center">

    <div align="center" class="container-fluid" style="width:100%">
    
      <div class="jumbotron">
      
        <?php include("sch.html"); ?>
    </div>
<h2  style="color:green">Block Staff </h2>
    <div class="col-md-6 col-md-offset-3" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 
     <p></p>

<?php  
  function getStaffID(){
        return "sta".rand(100000,999999);
    }   
   /// id, name, pass, role, phone, address, user, dateCreated, married, dBirth, blocked, createdBy, email, gender, case, blockMsg
 if(isset($_POST['Register'])) {
    if($_POST['Register']=="Block"){
  $sta->blocked="yes";
  $sta->blockMsg=$_POST['blockMsg'];
 } else 
 {
   $sta->blocked="no";
   $sta->case= $sta->case.$sta->blockMsg;
   $sta->blockMsg='';
 }
     $sta->submitUpdate(); 
  
 
} // End of register student.............


   ?>

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">
<div class="form-group">
     <div class="form-group">
     <label> Name </label>
    <?php echo $sta->name ;  ?>
    </div>
     
    <div class="form-group">
     <label> Type block message </label>
   <textarea name="blockMsg" id="blockMsg" rows="5" cols="79">   </textarea>
    </div>


    <div class="form-group col-md-12 col-md-offset-0"  align="center"> 
    <?php if($sta->blocked=="no"){  ?>
    <input type="submit" class="btn btn-primary" value="Block" name="Register" style="color:#00FF00">

  <?php }else{

    ?>
    <input type="submit" class="btn btn-primary" value="Unblock" name="Register" style="color:#00FF00">

   <?php } ?>
    </div>

    </form>

    </section>
    </div>
    </div>

    </section>

    </div> 
         

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
           
          <div class="sidebar-module">
            
          </div>
         
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
       
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