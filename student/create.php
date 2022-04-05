<?php
 session_start();
$user=null;
require('../class/class.php');
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
    </head>





    <body align="center">

        <?php include("sch.html"); ?>
     
    <div align="center" class="container-fluid" style="width:100%"> 
      
<h2  style="color:green">Student Login </h2>
    <div class="col-md-6 col-md-offset-3" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 
     <p></p>

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">

    <div class="form-group">
     <label> login name  </label>
    <input  type="text" class="form-control"  name="user" required="true">
    </div>
    <div class="form-group">
     <label> Login password  </label>
    <input  type="password" class="form-control"  name="pass" >
    </div>
    <div class="form-group">
     <label> confirm Login password  </label>
    <input  type="password" class="form-control"  name="cpass" >
    </div>
      <div class="form-group">
     <label> Student full Name  </label>
    <input  type="text" class="form-control"  name="fullName" >
    </div>
     <div class="form-group">
     <label> Student Registration  </label>
    <input  type="text" class="form-control"  name="id" >
    </div>
    <div class="form-group">
     <label> student phone  </label>
    <input  type="number" class="form-control"  name="phone" >
    </div>
    <div class="form-group">
     <label> Guadian full Name  </label>
    <input  type="text" class="form-control"  name="gName" >
    </div>
    <div class="form-group">
     <label> Guardian phone number </label>
    <input  type="number" class="form-control"  name="gPhone" >
    </div>
     
    <div class="form-group">
     <label> admitted class  </label>
    <select name="aClass" required="true" class="form-control" >
    <?php  $gc=getAllClass(); 
     echo "<option value=''>--select--</option>";
foreach ($gc as $cl) {
    echo "<option value=".$cl->id.">".$cl->name."</option>";
}

    ?>

  
   
</select>
    </div>
<div class="form-group">
     <label> current  Class</label>
  <select name="cClass" required="true" class="form-control" >
    <?php  $gc=getAllClass(); 
     echo "<option value=''>--select--</option>";
foreach ($gc as $cl) {
    echo "<option value=".$cl->id.">".$cl->name."</option>";
}

    ?>

  
   
</select>
    
    </div>
    <div class="form-group">
     <label> admitted session  </label>
    <input  type="text" class="form-control"  name="aSession" >
    </div>
    <div class="form-group">
     <label> current Session  </label>
    <input  type="text" class="form-control"  name="cSession" >
    </div>
    <div class="form-group">
     <label> Adress  </label>
   <textarea name="address" id="address" rows="2" cols="79"> </textarea>
    </div>
    <div class="form-group col-md-12 col-md-offset-0"  align="center"> 
    <input type="submit" class="btn btn-primary" value="Register" name="Register" style="color:#00FF00">
    </div>

    </form>

    </section>
    </div>
    </div>

    </section>

    </div> 
         

        </div><!-- /.blog-main -->

        

      </div><!-- /.row -->
      <?php  
  function getStudentID(){
        return "stu-".rand(100000,999999);
    }   
 if(isset($_POST['Register'])) {
if($_POST['pass']=$_POST['cpass'] ){}
if(isset($_POST['user'])&isset($_POST['pass'])) {
$id=$_POST['id'];
$name=$_POST['fullName'];$address=$_POST['address'];
  $phone=$_POST['phone'];   $gPhone=$_POST['gPhone'];
    $userName=$_POST['user'];   $pass=$_POST['pass'];
   $role='student';    $gName=$_POST['gName'];
    
    $createdBy=$user->id;   
     $admittedClass=$_POST['aClass'];
   $admittedSession=$_POST['aSession'];    
   $currentClass=$_POST['cClass'];
    $currentSession=$_POST['cSession'];   
    $block='no';
    $case='';      $blockMsg="";     
    $dateCreated=Date('Y:M:D:H:L:S');
//login validation
$stu= getUserS( $userName, $pass);
if($stu=="x"){
 $stu= getUserByIdS($id);
  if($stu=="x"){
 $stu= new Student();
$stu->setAll($id, $name, $address, $phone, $gPhone, $userName, $pass, $role, $gName, $createdBy, $admittedClass, $admittedSession, $currentClass, $currentSession, $block, $case, $blockMsg, $dateCreated);
$stu->submit();
echo "<a href='view.php?c=".$stu->id."''> view details </a> " ;
}else{

  echo "A student Exist with that Registration Number <a href='viewStudent?c=".$stu->id."' > view the student </a>";
}   
}
else{
echo "A student Exist with thesame username and password <a href='view.php?c=".$stu->id."' > view the student </a>";
 }

}else{

  echo "user name and pass field not found. ";
}

} // End of register student.............


   ?> 
    </div><!-- /.container -->

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