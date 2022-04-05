
  <?php 
  session_start(); 
require('class/class.php');



if(isset($_SESSION['practics'])&&$_SESSION['res']){
  $exam = unserialize($_SESSION['practics']);  
$result=unserialize($_SESSION['res']);
}else{
  echo "<a href='choose.php?c=practics'> choose Another Subject</a>";
}


   ?>        
<html style="green; background:black; ">

    <head>
    	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title id="title"> View questions  ?> |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link href="lib/form.css" rel="stylesheet">
        <link href="lib/view.css" rel="stylesheet">

   

    </head>





    <body  >
  
        <?php include("class/sch.html");  ?>
       <div align='left' class="container-fluid" style="width:100%">
          <div  >  
    <div   style="width:100%" >
        
       
   

    <div class="col-md-10 col-md-offset-1" >
    <div class="container"> 
    
<?php
$q=0;
$score=0;
foreach ($exam->questions as $question) {
    

?>

    <div style=" position: relative;"  class="row" > 
      <div class="col-75">
      <label>Question <?php  echo $question->qn;   ?>  </label>
       
        
   <?php echo $question->question;
   ?>
 </div> 
 <div class='col-25'>
  
  <?php
  $i=1;
  if(!isset($result->answers[$q]))echo " <mark color='yellow'> &#10068   not attemted  </mark>" ;  
  foreach ($question->option as $opt) { 
  ?>

 <div  style='color: #004d00; background-color:  #ffdab3;'> 

  <?php 
if(isset($result->answers[$q]))if($result->answers[$q]==getOption($i )){
       echo "&#10059" ;
}
 if($question->ans==getOption($i )){
     echo "<mark> ".getOption($i )."::    ".$opt."</mark>" ; 
}
 else{
  echo getOption($i )."::    ".$opt ; 
 }
if(isset($result->answers[$q])) if($result->answers[$q]==getOption($i )&$question->ans==getOption($i )) {echo "&#10004" ; $score++;}
else  if(isset($result->answers[$q]))if($result->answers[$q]==getOption($i ))
 echo "&#10005" ;     
     $i++;
   ?>
 
     </div> 
<?php
 


} // end  options

$q++;
?>

  
</div>
 </div>
<p></p>
<p> </p>

<?php
} /// end of question

echo " your scores is ".$score." out of ".count($exam->questions);
?>

 </div  >
 
     <form method="post" align="right">
      
    </div>
     </form> 
    </div>
    </div> 
    </div>    </div>  
    </div><!-- /.blog-main --> 
      </div><!-- /.row -->

      

    </div><!-- /.container -->


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

    
<?php include("class/footer.html") ?>
</html>
