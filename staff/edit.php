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
  header('Location: index.php'); 
  die();
 } 


  
  function getStaffID(){
        return "sta".rand(100000,999999);
    }   
  




 $sta= getStaffById($c);
    if($sta==null){
     header('Location: error.php?c=The seleted Staff Detail Cannot by View'); 
  die();  
    }
    $u=getStaffById($user->id);

  if($sta->role=="admin"&& $sta->createdBy=$u->id){

  } else 
if($sta->role=="admin"&& $u->id!=$u->createdBy){
  header("Location: error.php?c=You don't have a right to Edit this User"); 
  die(); 
     
}








 /// id, name, pass, role, phone, address, user, dateCreated, married, dBirth, blocked, createdBy, email, gender, case, blockMsg
 if(isset($_POST['Register'])) {
    if($_POST['pass']==$_POST['cpass'] ){  

     $id=$_POST['id'];
       $name=$_POST['fullName'];
       $address=$_POST['address'];
        $phone=$_POST['phone'];   
        $userName=$_POST['user'];  
      $pass=$_POST['pass'];
    $role=""  ;
    if(isset($_POST['role'])) {
    $role=$_POST['role'];  }
    $married="";
    $gender="";
  if(isset($_POST['married'])) {
    $married=$_POST['married'];  }

    if(isset($_POST['gender'])) {
     $gender =$_POST['gender'];
}

     $dBirth= $_POST['dBirth'];
 $email= $_POST['email'];

    $createdBy= $sta->createdBy; 
   $blocked=$sta->blocked; 
      $case=$sta->case;     
     $blockMsg=$sta->blockMsg;    
      $dateCreated=$sta->dateCreated;
//login validation
$st= getUserA( $userName, $pass);
if($st!="x"){
 
 $st= new Staff();
$st->setAll($id, $name, $pass, $role, $phone, $address, $userName, $dateCreated, $married, $dBirth, $blocked, $createdBy, $email, $gender, $case, $blockMsg);
$st->submitUpdate(); 
 $sta= getStaffById($c); 
}
else{
echo "A staff Exist do not   with that username and password  you not alter<a href='view.php?c=".$sta->id."' > view the staff </a>";
 }

}else{

  echo "user name and pass field not found. ";
}

} // End of register student.............


   















       ?>

<!DOCTYPE html>  
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
      <link href="../lib/form.css" rel="stylesheet">
  
         
    
    </head>





    <body align="center"> 
      
        <?php include("sch.html"); ?>
    
<h4    <?php echo "$tit"; ?>>Edit  <?php echo $sta->name ?> </h4>  


   <div align="center">

<div align="center" class="col-md-6 col-md-offset-3" >
<div align="left" class="container"> 
    <form class="form" method="post"> 
<div class="row">
      <div class="col-25">
       <label> Login name  </label>
      </div>
      <div class="col-75">
        <input  type="text"  value="<?php echo $sta->user  ?> "  name="user" required="true">
      </div>
    </div>  
     
<div class="row">
      <div class="col-25">
         <label> Login password  </label>
      </div>
      <div class="col-75">
        <input  value="<?php echo $sta->pass ?> " type="password"   name="pass" >
      </div>
    </div>  
     
<div class="row">
      <div class="col-25">
        <label> Confirm Login password  </label>
      </div>
      <div class="col-75">
         <input  value="<?php echo $sta->pass ?> "type="password"   name="cpass" >
      </div>
    </div>  
<div class="row">
      <div class="col-25">
          <label> Staff full Name  </label>
      </div>
      <div class="col-75">
          <input  value="<?php echo $sta->name ?> " type="text"   name="fullName" >
      </div>
    </div>  
      
<div class="row">
      <div class="col-25">
          <label> Staff Registration  number </label>
      </div>
      <div class="col-75">
        <input value="<?php echo $sta->id ?> " type="text"   name="id" >
      </div>
    </div>  
         
<div class="row">
      <div class="col-25">
          <label> Staff phone number  </label>
      </div>
      <div class="col-75">
          <input  value="<?php echo $sta->phone ?>" type="text"   name="phone" >
      </div>
    </div>  
<div class="row">
      <div class="col-25">
          <label> Email </label>
      </div>
      <div class="col-75">
        <input value="<?php echo $sta->email ?> " type="email"   name="email" >
      </div>
    </div>  
         
<div class="row">
      <div class="col-25">
           <label> Date of birth  </label>
      </div>
      <div class="col-75">
         <input value="<?php echo $sta->dBirth ?> " type="date"   name="dBirth" >
      </div>
    </div>  
      
    
<div class="row">
      <div class="col-25">
      <label>  Marrital Status</label>
      </div>
      <div class="col-75">
          <select  name="married" required="true"  >
            <option value=''>--select--</option>
            <option value='single'   <?php if($sta->married=='single') echo "selected";  ?> > single</option>
            <option value='married'   <?php if($sta->married=='married') echo "selected";  ?> > married</option>
          </select>
         
      </div>
    </div>  
     
    

   <div class="row">
      <div class="col-25">
      <label>Role</label>
      </div>
      <div class="col-75">
          <select  name="role" required="true"  >
            <option value=''>--select--</option>
            <option value='staff'   <?php if($sta->role=='staff') echo "selected";  ?> >staff</option>
            <option value='admin'   <?php if($sta->role=='admin') echo "selected";  ?> >admin</option>
          </select>
         
      </div>
    </div>  
 
       <div class="row">
      <div class="col-25">
     <label>Gender</label>
      </div>
      <div class="col-75">
          <select  name="gender" required="true"  >
            <option value=''>--select--</option>
            <option value='female'   <?php if($sta->gender=='female') echo "selected";  ?> > female</option>
            <option value='male'   <?php if($sta->gender=='male') echo "selected";  ?> >male</option>
          </select>
         
      </div>
    </div> 
    
<div class="row">
      <div class="col-25">
         <label> Address  </label>
      </div>
      <div class="col-75">
        <textarea name="address" id="address" rows="2" ><?php echo $sta->address ?></textarea>
      </div>
    </div>  
     
    

     
   
    <div class="form-group col-md-12 col-md-offset-0"  align="right"> 
    <input type="submit"   value="Submit Changes" name="Register" >
    </div>
     
   
    </form> 
    </div>
    </div> 
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
