
<!DOCTYPE html>
<?php
session_start();
require('class/class.php');


 
    
$exam=null;
  if(!isset($_SESSION['user'])){
    echo " error in setting session ";
  }
 if(isset($_SESSION["exam"])){
  
  $e=$_SESSION["exam"];
  $exam=  unserialize( $e);
  
}else{
 // echo "un set";
}

 $user = unserialize($_SESSION['user']);  
$userID=$user->id;
  if(isset($_POST['next'])){

  if(isset($_POST['term'])&&isset($_POST['subName']) && isset($_POST['ses'])&& isset($_POST['clas'])&& isset($_POST['examDate'])){
 
 
$examID= getExamID();
$opendate=date("Y:M:d:D");
$clas=$_POST['clas'];
$ses=$_POST['ses'];
$subName=$_POST['subName'];
$examDate=$_POST['examDate'];
$term=$_POST['term'];
//setAll($id, $clas, $session,   $setDate, $examDate, $subName, $teacherID)
if(isset($_SESSION["exam"])){ 
 
  $exam->setHead($exam->id,$clas,$ses,$opendate,$examDate,$subName, $userID,1,$term);
}else{
$exam = new Exam();
$exam->setAll($examID,$clas,$ses,$opendate,$examDate,$subName, $userID,1,$term);
}


$_SESSION["exam"] = serialize($exam); 

 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
  exit;

 }
 
 }
         }
     ?>


   <style type="text/css">
     

/* Add a black background color to the top navigation */
.seletedform {
  
  overflow: hidden;
}
/* Style the links inside the navigation bar */
.seletedform  input{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.seletedform input :hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.seletedform input .active {
  background-color: #4CAF50;
  color: white;
}

</style>
   </style>       
<html>
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

<?php if($exam==null)
echo "<title> Add Examiation |</title>";
else echo "<title> Edit Examiation </title>";

 ?>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
      
        <link href="lib/form.css" rel="stylesheet">
      
       
    </head>





    <body >
 <?php include("class/sch.html");  ?>
     
  
     

        
       <div align="center"      > 
         <h3 <?php echo "$tit";  ?>>   Set  Examiation Tiltle       </h3> 
        <div  class="col-md-6 col-md-offset-2" align="left"> 
    <form class="form" method="post" >
     <div class="container"   >
     
<div class="row">
      <div class="col-25">
        <label for="subName">Subject Name</label>
      </div>
      <div class="col-75">
         <input  type="text" class="form-control" placeholder="subject name" name="subName" value="<?php if($exam!=null) echo $exam->subName ?>" required="true">
      </div>
    </div>
     

<div class="row">
      <div class="col-25">
        <label for="session">Session</label>
      </div>
      <div class="col-75">
        <input type="text" class="form-control" placeholder="session" name="ses" value='<?php if($exam != null) echo $exam->session ?>' >
      </div>
    </div> 


<div class="row">
      <div class="col-25">
        <label for="clas">Class</label>
      </div>
      <div class="col-75">
         <select  name="clas" required="true" class="form-control" >
    <?php  $gc=getAllClass(); 
     echo "<option value=''>--select--</option>";
       foreach ($gc as $cl) {
     if($exam != null)   
      if($exam->clas==$cl->id)
    echo "<option value='".$cl->id."'selected > ".$cl->name."</option>";
    else
      echo "<option value='".$cl->id."' >".$cl->name."</option>"; 
      else
     echo "<option value='".$cl->id."' >".$cl->name."</option>";  
        }   ?>
       </select>
      </div>
    </div>

 

 <div class="row">
      <div class="col-25">
        <label for="term">Term</label>
      </div>
      <div class="col-75">
        <select  name="term" required="true" class="form-control" >
    <?php  
    $gc=['First Term','Second Term','Third Term']; 
     echo "<option value=''>--select--</option>";
foreach ($gc as $cl) {
  if($exam != null)   
  if($exam->term==$cl)
    echo "<option value='".$cl."'selected > ".$cl."</option>";
else
echo "<option value='".$cl."' >".$cl."</option>"; 
else
echo "<option value='".$cl."' >".$cl."</option>";  
}   ?>
 </select>
      </div>
    </div>

    
<div class="row">
      <div class="col-25">
        <label for="examDate">Exam Date</label>
      </div>
      <div class="col-75">
        <input type="Date" class="form-control" placeholder="Exam Date" name="examDate"  value='<?php if($exam != null) echo $exam->examDate ?>' >
      </div>
    </div>

    <div align="right" > 
    <input type="submit"  value="Next" name="next"  >
    </div>
</div>
    </form>

    </div>
 </div>
    

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
