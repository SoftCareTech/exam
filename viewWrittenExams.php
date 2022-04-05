<?php
 session_start();
unset( $_SESSION["exam"]);
unset( $_SESSION["res"]);

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

    <title> View Exams SofCare  |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
     <link href="lib/table.css" rel="stylesheet">
 
    <!-- Custom styles for this template --> 
    </head>
  <body  align="center" >
   
        <?php include("class/sch.html");  ?>
     


<div align="center" class="container">
    <div class="col-md-10 col-md-offset-2" > 

     <div <?php echo $tit; ?>> <h3>Results</h3> </div> 
      <form class="form" method="post">
      <div><input name='q' placeholder='Search here...' size='15' type='text'/>
<input id='button-submit' type='submit' value='Search'/></div></form>
     <p></p>
 

    
<table width="89%" >
   <thead >  
   <tr >
    <td> Session </td>
 <td> Class </td>
  <td>  Subject </td>
   <td> Term </td>
   <td <?php echo $action; ?> > Actions </td>
      </tr> 

   </thead>
 
<?php 
 
 $results= getResults($user,"order by e.session desc , c.name asc , e.subName asc ,s.name asc,e.term asc ");

 $count=0;
  foreach($results as $ch){
    $count=$count+1;
   ?> 
<tr>   
 <td>  <?php echo  $ch->ses; ?>  </td>
  <td>  <?php echo  $ch->clas; ?>  </td>
    <td>   <?php echo  $ch->sub; ?>  </td> 
    <td>    <?php echo  $ch->term  ?>  </td>
   
    <td> 
      <?php   ?>
      <a href= 'viewScores.php?c=<?php echo$ch->id ?>' style='color:#008000;'> view Student scores </a> </td>

      <?php   ?> 
</tr>
     
     

<?php } ?>
</table> 

    
   </div>   

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
