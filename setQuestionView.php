  <?php 
  session_start(); 
require('class/class.php');   ?>  

 
<!DOCTYPE html > 
<html >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" href="images/national-flag-nigeria-rectangular-shape-patriotic-symbol_18719-126.jpg">

    <title> View Questions </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template --> 
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link href="lib/form.css" rel="stylesheet">
        <link href="lib/view.css" rel="stylesheet">

       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script>  
       
 
    </head>





    <body>

        
     
 <?php include("sch.html"); ?> 
<?php

$exam = unserialize($_SESSION['exam']); 

foreach ($exam->questions as $question) {
    if(isset($_POST['edit'.$question->qn])){
$exam->qn=$question->qn;
$_SESSION['exam']= serialize($exam);
header('Location:setQuestionEdit.php');
die();

}
}
if(isset($_POST['submit'])){
  if(count($exam->questions)<1){
    echo "No question is set set: <a href='setQuestionEdit'> SET Question</a> ";
  } else{


    ?>
  <div align='center'> <a href="../exam/admin.php" > Staff Menu</a>  </div>
  <div style= "color:red;" align="right"><h4><a href="../exam/" > logout</a> 
  <a style= "color:yellow;" href="staff/about.php" > About</a> </h4>
  </div>


<h4><div align="center">PREVIEW QUESTION READY TO SUBMIT  </div></h4>
    <?php
$exam->submit() ;
}
 //header('Location: index.php'); 
}else{
?>
<h4><div align="center">PREVIEW QUESTION READY TO SUBMIT  </div></h4>
<?php }

?>
 
    <div class="container"> 
     <form method="post"  > 
<?php
foreach ($exam->questions as $question) {
?>
 <div class="row">
             <div class="col-75">
              <label><input  type="submit"  <?php echo "id='edit".$question->qn."' name='edit".$question->qn."' value='Question ".$question->qn."'";  ?>   >  
  </label>
   <?php echo $question->question;
   ?> 
 </div> 
 <div class='col-25'>
  <?php
  $i=1; 
  foreach ($question->option as $opt) {
 // echo "answere ...> ". $question->ans; 
 if($question->ans==getOption($i )){

  ?>
     <div  style='color: #004d00; background-color:  #ffdab3;'>
     <label> <mark> 
      <?php echo getOption($i )."::    ".$opt; ?>
       </mark>&#10004          
     </label>
     </div> 
<?php 
}
else {
  ?>
 <div  style='color: #004d00; background-color:  #ffdab3;'>
     <label>   <?php echo getOption($i )."::    ".$opt ; 
   ?>  </lable>
</div>

<?php
}
 $i++;
} // end  options
?>
  </div>

</div>

<?php

} /// end of question
?>

 </div  >
 
    
<div align='right'> 
      <input type="submit"  value="submit changes" name="submit" style="color:#00FF00">
    </div>
     </form> 

    

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
