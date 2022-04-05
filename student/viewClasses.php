<?php
 session_start();
unset( $_SESSION["exam"]);
unset( $_SESSION["res"]);
 $c=""; 
require('../class/class.php');
$user = unserialize($_SESSION['user']); 
  if($user->role=='student'){
header('Location: ../');
  }
  
       ?>
<!DOCTYPE html > 
<html  >
    <head>
        <style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}


tr:nth-child(odd){background-color: #f2f2f2}
</style>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title>  Choose class  |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
      
         
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/js/bootstrap.js">
    </head>
  <body  align="center" >
    <div class="container-fluid" style="width:100%"><div class="
      jumbotron"> 
        <?php include("sch.html");  ?>
    </div>
<div align="center">
    <div class="col-md-6 col-md-offset-3" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 

     <div class="panel-title">

      </div>
    </div>
     <p></p>

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">

        <h4> <font face="Goudy Stout">  <a href= 'create.php'  > Create a Student

      </a>  </font> </h4> 
    
<table width="89%" >
   <thead style="background-color:#1a0013;">  
   <tr style="background-color:#1a0013; color:#ffe6f8">
    <td> S/N </td>
 <td> Name </td>
  <td>  class </td>
   <td> Created by </td>
   <td style="  color:#ccffcc;" colspan="4" > Action </td>
      </tr> 
   </thead>
 
<?php 

 $results= getClasses();
 $count=0;
  foreach($results as $ch){
    $count=$count+1;
   ?> 
<tr>   
 <td>  <?php echo  $ch->id; ?>  </td>
  <td> <strong>   <?php echo  $ch->name; ?> </strong> </td>
    <td> <strong>  <?php echo  $ch->role; ?>  </strong> </td>  
    <td>    <?php echo  getCreator($ch->id); ; ?>  </td>
   
    <td> 

      <a href= 'view.php?c=<?php echo$ch->id ?>' style='color:#008000;'> view staff Details 
      </a> 
    </td>
    <td>
<a href= 'edit.php?c=<?php echo$ch->id ?>' style='color:#008000;'> edit staff Details 
      </a> 
       </td>
    <td>
      <a href= 'block.php?c=<?php echo$ch->id ?>' style='color:#008000;'> block staff   

      </a>
       </td>
    <td> 
      <a href= 'delete.php?c=<?php echo$ch->id ?>' style='color:#008000;'> delete staff   
      </a> 
    </td>

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

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
         
          <div class="sidebar-module">
            
          </div>
         
        </div><!-- /.blog-sidebar -->

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

  


</html>