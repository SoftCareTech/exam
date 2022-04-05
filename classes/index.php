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
  else if($user->role=='staff'){
header('Location: ../admin.php');
  }
       ?>
   
<!DOCTYPE html>
<html> 
    <head> 
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare Tech">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SoftCare Classes  |</title>
<?php
 ?>
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../lib/table.css">
 <link href="../lib/sticky-footer-navbar.css" rel="stylesheet">
  <link href="../lib/form.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../lib/sweetalert.css">
   <script src="../lib/sweetalert.min.js"></script> 
    <!-- Custom styles for this template --> 
 
   </head>
  <body  align="center" >
      
   <?php include("sch.html");  ?>
<div align="center">
 <div align='center'><h3> <font face='Goudy Stout'>  <a href= '../classes'  > Classes
  </a>  </font> </h3> </div>
    <div class="col-md-12 col-md-offset-1" >

      

<?php
 
$taskExam=null;
$task=null;
if(isset($_REQUEST['task']) ){
  if(isset($_REQUEST['c']) ){
  $taskExam =$_REQUEST['c'];
  $ex=getExamDetail($taskExam);
  if ($ex!=null){ 

}

  }
  
  $task =$_REQUEST['task'];
 } 



$results= getAllClasses();
 
  foreach($results as $t){
    if(isset($_POST['b'.$t->id])){
      $level=$_POST['level'.$t->id];
     $examID= $taskExam;
     $name =$_POST['name'.$t->id];
     $session =$_POST['session'.$t->id];
     $t->level=$level;
     

$subm=false;

foreach($results as $ta){
if(!strcasecmp($ta->name,$name)&&$ta->id!=$t->id ){
$subm=true;
} else{
}
}

$t->name=$name;
     $t->session=$session; 
     $t->monitor1="";
     $t->monitor2="";
     $t->master="";  
if($subm==false){  
     if($t->submit()==true) {
       echo '<script type="text/javascript">',
     'swal({
  title: "Class is created!",
  text: "Refreshing...",
  timer: 2000,
  showConfirmButton: false
});' ,
     '</script>';
  } 
 }else{ 
  echo '<script type="text/javascript">',
     'sweetAlert("Error input", "class name already exist!", "error");' ,
     '</script>' ;
}

} else if (isset($_POST['d'.$t->id])){ 
$inUse=false;
$exam=getAllExams("c.name");
$errorlist="";
foreach ($exam as $e){
if($e->class==$t->id){
$errorlist=$errorlist.$e->clas."-------".$e->sub."<br>";
$inUse=true;

}

}
if($inUse==false){
        if($t->delete()==true){ 
        // deleted  
}  }else{

?> <script type="text/javascript">
     swal({
  title: "This is in use<small>  You can not remove it </small>!",
  text: "<div style='color:#F8BB86; '> class---------- exam <br><?php   echo $errorlist; ?> </div> ",
  html: true
});  </script>


<?php
}
 

}  } 



 





    if(isset($_POST['b'])){
      $t= new Classes();
      $level=$_POST['level'.$t->id];
     $examID= $taskExam;
     $name =$_POST['name'.$t->id];
     $session =$_POST['session'.$t->id];
     $t->level=$level;
     $t->name=$name;

$subm=false;

foreach($results as $ta){
if(!strcasecmp($ta->name,$t->name)){
$subm=true;
}

}
     $t->session=$session;
     $t->id="".rand(100,999);
   $t->monitor1="";
     $t->monitor2="";
     $t->master="";    
 if($subm==false){  
     if($t->submit()==true) {
    
    echo '<script type="text/javascript">',
     'swal({
  title: "Class is created!",
  text: "Refreshing...",
  timer: 2000,
  showConfirmButton: false
});' ,
     '</script>';
        
  }  
}else{

   echo '<script type="text/javascript">',
     'sweetAlert("Error input", "class name already exist!", "error");' ,
     '</script>' ;
}

}




?>

    <section class="panel panel-primary"> 

     
    
     

    <div class="panel-body"> 
    
    <section >
    <form class="form" method="post">

        
 
<table   >
   <thead  >  
   <tr >
    <td> S/N </td>
    <td> Level </td>
 <td>Class Name </td>
  <td> Session  </td>
 <td> Montior 1  </td>
 <td> Monitor 2  </td>
  <td>  Class Master </td>
  
   <td <?php echo $action; ?> colspan="5" > Actions </td>
      </tr> 
   </thead>
 
<?php 
//id, level, name, monitor1, monitor2, master, session
  
 $results= getAllClasses();
 $count=0;
  foreach($results as $t){
    $count=$count+1;
    $d=new User();
    
    
   ?> 
<tr> 

<td>  <?php echo $count; ?> </td>  
 <td>
 
      <select  id='<?php echo"level".$t->id;  ?>'   name='<?php echo"level".$t->id;  ?>' required="true" >
    <?php  
    $gc=[1,2,3,4,5,6]; 
    //search 
     echo "<option value='' >--select--</option>";
foreach ($gc as $cl) {
  if($t != null)   
  if($t->level==$cl)
    echo "<option value='".$cl."'selected > ".$cl."</option>";
else
echo "<option value='".$cl."' >".$cl."</option>"; 
else
echo "<option value='".$cl."' >".$cl."</option>";  
}   ?> </select>  </td>

<td>   
  <input  id='<?php echo"name".$t->id;  ?>'   name='<?php echo"name".$t->id;  ?>'   type="text" <?php echo "  value= '".$t->name."'"; ?> > 
</td>
     
<td>   
  <input  id='<?php echo"session".$t->id;  ?>'   name='<?php echo"session".$t->id;  ?>' stype="text" <?php echo "  value= '".$t->session."'"; ?> > 
</td>

<td>  
    <?php   if($d!=null)      
  echo "<a href='../student/choose.php?c=task&task=".$t->id."' id='monitor1'".$t->id."'>".$d->name."   </a>";
   else  echo "<a href='../student/choose.php?c=task&task=".$t->id."' id='monitor1".$t->id."'>"."   --select-- Exam </a>";
 ?>  
</td>

<td>  <?php   if($d!=null)      
  echo "<a href='#".$t->id."' id='monitor2".$t->id."'>".$d->name."  </a>";
else  echo "<a href='#".$t->id."' id='monitor2".$t->id."'>"."   --select-- Exam </a>";
 ?>  </td>

<td>  <?php   if($d!=null)      
  echo "<a href='../student/choose.php?c=task&task=".$t->id."' id='master".$t->id."'>".$d->name."  </a>";
else  echo "<a href='../student/choose.php?c=task&task=".$t->id."' id='master".$t->id."'>"."   --select-- Exam </a>";
 ?>  </td>

<td> 
    <input    value="commit changes "  type="submit" name='<?php echo"b".$t->id;  ?>' id='<?php echo"b".$t->id;  ?>'  > 
  </td> 
  <td>
<input  value="remove"   type="submit" name='<?php echo"d".$t->id;  ?>' id='<?php echo"d".$t->id;  ?>'  > 
  </td>
    
</tr>
     
     

<?php 

} 

?>
</form>
<form method="post">
<tr><td colspan="10" > <div align="center"><h4> <font face="Goudy Stout">   Add a Class
  </font> </h4> </div>
     </td></tr>

<tr> 

<td>  <?php echo "new "; ?> </td>  
 <td>
 
      <select  id='<?php echo"level";  ?>'   name='<?php echo"level";  ?>' required="true" class="form-control" >
    <?php  
    $gc=[1,2,3,4,5,6]; 
    //search 
     echo "<option value='' >--select--</option>";
foreach ($gc as $cl) {
echo "<option value='".$cl."' >".$cl."</option>";  
}   ?> </select>  </td>

<td>   <input  id='<?php echo"name";  ?>'   name='<?php echo"name";  ?>' style="display:block;" type="text"  </td>
     
<td>   <input  id='<?php echo"session";  ?>'   name='<?php echo"session";  ?>' style="display:block;" type="text" > </td>

  <td>  <?php   
 echo "<a href='../student/choose.php?c=task&class=' id='monitor1' >   --select-- Exam </a>";
 ?>  </td>

<td>  <?php     echo "<a href='../student/choose.php?c=task&class=' id='monitor2'>   --select-- Exam </a>";
 ?>  </td>

<td>  <?php  
echo "<a href='../student/choose.php?c=task&class=' id='master'>   --select-- Exam </a>";
 ?>  </td>

<td> 
    <input  value="save " class="btn-primary" type="submit" name='b' id='b'  > 
  </td> 
  <td>
 
    
</tr>







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

    
<?php include("../class/footer.html"); ?>

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
