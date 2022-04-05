<?php
 session_start();
unset( $_SESSION["exam"]);
unset( $_SESSION["res"]);
 $c="";
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 }else{
  header('Location: index.php'); 
  die();
 } 
require('class/class.php');
$user = unserialize($_SESSION['user']); 
 
       ?>
<!DOCTYPE html > 
<html  >
    <head>
        
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> View Scores |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
     <link href="lib/table.css" rel="stylesheet">
 
    </head>
  <body  align="center" >
    <div class="container-fluid" style="width:100%"> 
        <?php include("class/sch.html");  ?>
    
<div align="center">
    <div class="col-md-6 col-md-offset-3" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 

     <div class="panel-title"> <?php $detail= getExamDetail($c);  ?>

      <mark>  <?php echo  $detail->ses; ?>  </mark>  
  <strong>  <?php echo  $detail->clas; ?>  </strong>
    <mark>   <?php echo  $detail->sub; ?>  </mark> 
    <strong>    <?php echo  $detail->term  ?>  </strong>

      </div>
    </div>
     <p></p>

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">
<table width="89%" >
   <thead  >  
   <tr >
    <td> id </td>
 <td> Name </td>
  <td>  Scores </td>
   <td> percent </td>
   <td colspan="2"> Action </td>
      </tr> 
   </thead>
 
<?php 

 $results= getClassResult($c);
 $count=0;
  foreach($results as $ch){
    $count=$count+1;
   ?> 
<tr>   
 <td>  <?php echo  $ch->ses; ?>  </td>
  <td> <strong>   <?php echo  $ch->clas; ?> </strong> </td>
    <td> <strong>  <?php echo  $ch->sub; ?>  </strong> </td>  
    <td>    <?php echo  $ch->term  ?>  </td>
   
    <td> 
      <?php   ?>
      <a href= 'student/view.php?c=<?php echo $ch->ses ?>' style='color:#008000;'> view Student Details </a> </td>

      <td> 
      <?php   ?>
      <a href= 'Review.php?examID=<?php echo $ch->block."&& result=".$ch->id ?>' style='color:#008000;'> Review Marking </a> </td>

      <?php   ?> 
</tr>
     
     

<?php } ?>
</table> 

    </form>

    </section>
    </div>
    </div>

    </section>

    </div> 
         

        </div><!-- /.blog-main -->

         

      </div><!-- /.row -->
      

    </div><!-- /.container -->

    


      <?php include("class/footer.html");  ?>

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