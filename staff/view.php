

<?php
 session_start();
$user=null;
require('staff.php');
require('../class/class.php');
$c="";
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 }else{
  header('Location: index.php'); 
  die();
 } 
 if(isset($_SESSION['user'])){
  $user= unserialize($_SESSION['user']); 

  if($user->role=='student'){
header('Location: ../');
  }   
 
 }else{
  header('Location: ../');
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

    <title> SofCare login |</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../lib/sticky-footer-navbar.css" rel="stylesheet">
      <link href="../lib/view.css" rel="stylesheet">
 <script type="text/javascript">
            
        </script>
    <!-- Custom styles for this template --> 
    </head>





    <body >
<?php include("sch.html"); ?>
    
    <div align="center" >  
 
<h2  <?php echo "$tit"; ?> > Staff  Detailes</h2> 
     

<?php  
   
 $sta= getStaffById($c);
    if($sta==null){
     header('Location: error.php?c=The seleted Staff Detail Cannot by View'); 
  die();  
    }
 ?>


     <div class="col-md-6 col-md-offset-3" >
<div align="left" class="container"> 
<div class="row">
      <div class="col-25">
          <label> Login Name  </label>
      </div>
      <div class="col-75">
          <label >  <?php echo $sta->user ?> </label>
      </div>
    </div>  

<div class="row">
      <div class="col-25">
         <label> Staff full Name  </label>
      </div>
      <div class="col-75">
         <label >  <?php echo $sta->name   ?> </label>
      </div>
    </div>  

    <div class="row">
      <div class="col-25">
         <label> Staff Registration  number </label>
      </div>
      <div class="col-75">
         <label > <?php echo  $sta->id   ?> </label>
      </div>
    </div>  

    <div class="row">
      <div class="col-25">
        <label> Staff phone number  </label>
      </div>
      <div class="col-75">
       <label >  <?php echo $sta->phone  ?> </label>
      </div>
    </div> 
 
<div class="row">
      <div class="col-25">
       <label> email </label>
      </div>
      <div class="col-75">
         <label > <?php echo  $sta->email  ?> </label>
      </div>
    </div> 
    <div class="row">
      <div class="col-25">
        <label> Date of birth  </label>
      </div>
      <div class="col-75">
         <label >  <?php echo $sta->dBirth  ?> </label>
      </div>
    </div> 

    <div class="row">
      <div class="col-25">
        <label> Marital Status  </label>
      </div>
      <div class="col-75">
        <label >  <?php echo $sta->married  ?> </label>
      </div>
    </div>  
 <div class="row">
      <div class="col-25">
      <label> Role </label>
      </div>
      <div class="col-75">
       <label >  <?php echo $sta->role  ?> </label>
      </div>
    </div> 

<div class="row">
      <div class="col-25">
        <label> Gender </label>
      </div>
      <div class="col-75">
         <label > <?php echo  $sta->gender   ?> </label>
      </div>
    </div> 
     
     <div class="row">
      <div class="col-25">
        <label> Adress  </label>
      </div>
      <div class="col-75">
         <label >   <?php echo $sta->address ?> </label>
      </div>
    </div> 

    <div class="row">
      <div class="col-25">
        <label> Report  </label>
      </div>
      <div class="col-75">
        <label >   <?php echo $sta->case ?> </label>
      </div>
    </div>  
    <div class="row">
      <div class="col-25">
        <label> date Created  </label>
      </div>
      <div class="col-75">
        <label >   <?php echo $sta->dateCreated ?> </label>
      </div>
    </div> 

    <div class="row">
      <div class="col-25">
        <label> Blocked  </label>
      </div>
      <div class="col-75">
         <label >   <?php echo $sta->blocked ?> </label>
      </div>
    </div> 
    <div class="row">
      <div class="col-25">
        <label> Created by </label>
      </div>
      <div class="col-75">
         <label >   <?php echo getCreator($sta->createdBy) ?> </label>
      </div>
    </div> 
<div class="row">
      <div class="col-25">
        <label> Block Message </label>
      </div>
      <div class="col-75">
        <label >   <?php echo $sta->blockMsg ?> </label>
      </div>
    </div> 

 </div><!-- /.container -->
<a href= 'edit.php?c=<?php echo$sta->id ?>' style='color:#008000; font-weight: bolder;'> EDIT  </a>
   </div> 

    <?php include("../class/footer.html") ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>


</html>