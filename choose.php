<?php
 session_start();
unset( $_SESSION["exam"]);
unset( $_SESSION["res"]);

require('class/class.php');
$user = unserialize($_SESSION['user']); 
if(isset($_REQUEST['c'])){
  $c =$_REQUEST['c'];
 }else{
  header('Location: index.php'); 
  die();
 } 


 $task=null;
 if(isset($_REQUEST['task'])){
  $task =$_REQUEST['task']; 
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
    <title> SofCare Choose Subject  |</title> 
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="lib\table.css" rel="stylesheet">

    <!-- Custom styles for this template -->
     <link href="lib/sticky-footer-navbar.css" rel="stylesheet"> 
         <link href="lib/form.css" rel="stylesheet"> 
    </head>
  <body  align="center" >
      <?php include("class/sch.html");  ?>
     <div align='center'>
      <h3> 

 <?php 


 $exams= getALLExams("e.session desc , c.name asc , e.subName asc ,s.name asc,e.term asc ");


  if($c=="merge"){ 
 echo " Select Examinations to merge questions ";
if(isset($_POST['go'])){
  $ids =  array() ;
foreach($exams as $ch){
  if(isset($_POST[$ch->id.""])){
 $ids[] =$ch->id;
  }
}

//echo var_dump($ids);
$_SESSION['ids']=serialize($ids); 
 
  header('Location: merge.php?');
}

}

 else
   echo "Select An Exam";





     ?>    
         </h3> 

       </div>
       
<div align="center">
    <div class="col-md-9 col-md-offset-2" >
    <section class="panel panel-primary">

    <div class="panel-heading" style="color:green"> 

    </div>
     <p></p>

    <div class="panel-body">  
    <form class="form" method="post">
<table width="89%" >
   <thead >  
   <tr >
    <td> Session </td>
 <td> Class </td>
  <td>  Subject </td>
  <td> Staff </td>
   <td> Term </td>
   <td <?php echo $action ?><?php if($c=="merge") echo " colspan='0'"; else echo " colspan='4'" ;?> > <?php if($c=="merge"){
  echo " Select "
     ?>
     <td>
<input type="submit" name="go" value="Go" style="min-width: 8px;">
      </td>     

      <?php }else
      echo " Actions ";        ?>  </td>

      </tr> 
   </thead>
 
<?php 
 $count=0;
  foreach($exams as $ch){
    $count=$count+1;
   ?> 
<tr>   
 <td>  <?php echo  $ch->ses; ?>  </td>
  <td>  <?php echo  $ch->clas; ?>  </td>
    <td>   <?php echo  $ch->sub; ?>  </td> 
   
    <td>    <?php echo  $ch->teacherID  ?>  </td>
    <td>    <?php echo  $ch->term  ?>  </td>

       <?php    if($c=="edit"){  ?>
        <td>
      <a href= 'editExam.php?c=<?php echo$ch->id ?>' style='color:#008000;'> edit </a> </td>
      <td>
      <a href= 'exam.php?c=<?php echo$ch->id ?>' style='color:#008000;'> view </a> </td>

        <td>
 

      <?php } else if($c=="practics"){  ?>
<td>
      <a href= 'practicss.php?c=<?php echo$ch->id ?>&s=no' style='color:#008000;'> start 
       </a> </td>

      <?php }   
        else if($c=="task"){  ?>
    <td>  <a href= 'task?c=<?php echo$ch->id."&task=".$task ?>' style='color:#008000;'> select 
       </a> </td>
       <td>
      <a href= 'exam.php?c=<?php echo$ch->id ?>' style='color:#008000;'> view </a> </td>

      <?php }else if($c=="merge"){  ?>
<td> <?php echo$count?>
<input type="checkbox" value="<?php echo$ch->id?>" name="<?php echo$ch->id ?>">
          </td>

      <?php }        ?> 
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
