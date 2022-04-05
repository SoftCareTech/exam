  <?php 
  session_start(); 
require('class/class.php');
$exam = unserialize($_SESSION['exam']); 
if(isset($_POST['submit'])){
  if(count($exam->questions)<1){
    echo "No question is set set: <a href'setQuestionEdit'> SET Question</a> ";
  } else{
$exam->submit() ;
}
 //header('Location: index.php'); 
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
    <style>

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}
  
tr:nth-child(odd){background-color: #fff3e6;}
</style>

    </head>





    <body style="green; background:black; ">

        
    <div class="container-fluid jumbotron" style="width:100%">
        
       
   

    <div class="col-md-10 col-md-offset-1" >
    <div class="panel panel-primary">

    
    
    <div class="panel-body"> 
    
     

    
<?php
foreach ($exam->questions as $question) {
    

 if($question->ans==getOption($i )){
     echo "<tr style='color: #004d00; background-color:  #ffdab3;'>
     <td> <mark> ".getOption($i )."::    ".$opt."</mark>"."&#10004 </td>
</tr>" ; 
}
else {
  ?>
 <tr style='color: #004d00; background-color:  #ffdab3;'>
     <td>   <?php echo getOption($i )."::    ".$opt ; 
   ?>
</td>
</tr> 
<?php
}
 $i++;
 
} /// end of question
?>

 </div  >
 
     <form method="post" align="right">
      <input type="submit" class="btn btn-primary" value="update" name="submit" style="color:#00FF00">
    </div>
     </form>
 
    
    </div>
    </div>

    </div>

    </div> 
         

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
         
          <div class="sidebar-module">
            
          </div>
         
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
    

    </div><!-- /.container -->

    

<?php 
require('class/class.php'); ?>
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