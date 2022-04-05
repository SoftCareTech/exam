<?php 
session_start();
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];

 }else{
  header('Location: index.php'); 
  die();
 } 

  
 
$user=null;
require('class/class.php');
 if(isset($_SESSION['user'])){
  $user= unserialize($_SESSION['user']); 

  if($user->role=='student'){
header('Location: index.php');
  }
  else if($user->role=='staff'){
header('Location: admin.php');
  }


 }else{
  header('Location: index.php'); 
  die();
 }
$stu=getStudent($c);
if($stu!=null){

       ?>

<!DOCTYPE html >


          
<html  >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">
<style type="text/css">
	
	label{
	 
	color: black;
    background-color:yellow; 
    font-family: 	Elephant;
    font-variant-caps:petite-caps;

	}
</style>
    <title> SofCare login |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
      
         
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/js/bootstrap.js">
    </head>
 
    <body  align="center">

    <div   class="container-fluid" style="width:100%">
    
      <div class="jumbotron">
      
        <?php include("class/sch.html"); ?>
    </div>
<h2  style="color:green">Student Detials </h2>
    <div align="left" class="col-md-6 col-md-offset-3" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 
     <p></p>

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">

    <div class="form-group">
     <label> Login Name  </label>
     <?php  echo $stu->user  ?>
     
    </div>
    <div class="form-group">
     <label> Login Password  </label>
     <?php  echo $stu->pass  ?> 
    </div>
     
      <div class="form-group">
     <label>   Full Name  </label>
     <?php  echo $stu->name  ?> 
    </div>
     <div class="form-group">
     <label>  Registration  Number </label>
     <?php  echo $stu->id  ?> 
    </div> 
    <div class="form-group">
     <label>   Phone  Number </label>
     <?php  echo $stu->phone  ?> 
    </div>
    <div class="form-group">
     <label> Guadian Full Name  </label>
     <?php  echo $stu->gName  ?> 
    </div>
    <div class="form-group">
     <label> Guardian Phone Number </label>
     <?php  echo $stu->gPhone  ?> 
    </div>
     
    <div class="form-group">
     <label> Admitted Class  </label>
     <?php  echo $stu->admittedClass  ?> 
    </div>
    <div class="form-group">
     <label> Admitted Session  </label>
    <?php  echo $stu->admittedSession  ?> 
<div class="form-group">
     <label> current class  </label>
     <?php  echo $stu->currentClass  ?> 
    </div>
    
    <div class="form-group">
     <label> current Session  </label>
    <?php  echo $stu->currentSession  ?> 
    </div>
    <div class="form-group">
     <label> Adress  </label>
    <?php  echo $stu->address  ?>   
    </div>
     <a href="createStudent.<?php  ?>"> <font face="Papyrus"> Add new Student </font>  </a>
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
<?php 

}else{
	echo "Error: ?The  student is  not found  <a href='admin.php'> Dash board</a>";
}

 ?>