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
    <meta name="author" content="SoftCare">
    <link rel="icon" href="../../../../favicon.ico">

    <title> SoftCare Running Task|</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="../lib/sticky-footer-navbar.css" rel="stylesheet">
      <link href="../lib/table.css" rel="stylesheet"> 
      <link href="../lib/form.css" rel="stylesheet">
      <!-- sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../lib/sweetalert.css">
   <script src="../lib/sweetalert.min.js"></script>  

   <style type="text/css">
     button{
      margin: 0px;
      padding: 0px
     }

   </style>
     
    </head>
  <body  align="center" >
      
        <?php include("sch.html");  ?>
<div align="center">
 <div align='center'><h3> <font face='Goudy Stout'>  <a href= '../task'  > Tasks 


<?php 
$taskExam=null;
$task=null;

function timeClashed($time1, $duration1, $time2, $duration2 ){
  
  if($time1< $time2) if (strtotime("+".$duration1." minutes",strtotime($time1) )> strtotime($time2)){
 return true; 
  }
 if($time2 < $time1) if (strtotime("+".$duration2." minutes",strtotime($time2))>strtotime($time1)){
 return true;
  }
  return false;
}

if(isset($_REQUEST['task']) ){
  if(isset($_REQUEST['c']) ){
  $taskExam =$_REQUEST['c'];
  $ex=getExamDetail($taskExam);
  if ($ex!=null){ 

}

  }
  
  $task =$_REQUEST['task'];
 } 


  
 $allClasses=getAllClass(); 
  $taskTypes=['Exam','practics','general','none'];  

   $tasks= getTasks();
 $count=0;




  if(isset($_POST['create'])){
      $classSelected='';
      $type=$_POST['type'];
     $examID= $taskExam;
     $classSelected =$_POST['classSelected'];
$submitDuplicate=false;
 foreach($tasks as $ta){
   $startTime =$_POST['startTime'];
     $duration=$_POST['duration'];
if(timeClashed($ta->date,$ta->duration,$startTime,$duration)&& $ta->id!=$t->id){
$submitDuplicate=true;
break;
}}
    
     if($submitDuplicate==false){
         $t=new Task();
     $t->id="".rand(100,999);
     $t->type=$type;
     $t->examID=$examID;
     $t->class=$classSelected;
     $t->date=$startTime;
     $t->duration=$duration;
 if($t->submit()==true){
 // new task addded  
  }
 
}else{
echo  "<br> clash in time";
}
} 



 else{
  foreach($tasks as $t){  
    if(isset($_POST['save'.$t->id])){ 
      $type=$_POST['type'.$t->id];
      $examID=$t->examID;
      if($t->id==$task)
     $examID= $taskExam;
     $classSelected =$_POST['classSelected'.$t->id];
$subm=false;
 $startTime =$_POST['startTime'.$t->id];
   $duration=$_POST['duration'.$t->id];
 foreach($tasks as $ta){
if(timeClashed($ta->date,$ta->duration,$startTime,$duration)&& $ta->id!=$t->id){
$subm=true;
break;
}} 
     if($subm==false){

     
   
     $t->type=$type;
     $t->examID=$examID;
     $t->class=$classSelected;
     $t->date=$startTime;
     $t->duration=$duration;
     if($t->submit()==true) {
//created
$tasks= getTasks();
    }
}else{
echo "<br> clash in time ";
}

 }else if (isset($_POST['delete'.$t->id])){
       
if($t->delete()==true){ 

  //deleted refresh
    
}} 

  }
  /// end tasks 

}




?>
      </a>  </font> </h3> </div> 
    <div class="col-md-12 col-md-offset-1" >

    <section class="panel panel-primary"> 

     
    
     

    <div class="panel-body"> 
    
    <section >
    <form  method="post">

        
 
<table   >
   <thead >  
   <tr >
   
 <td> Subject  </td>
  <td> Type </td>
 <td> Class </td> 
  <td>  Start Time </td>
   <td> Duration<br> (minutes) </td>
   <td> Expired time </td>
   <td <?php echo $action;?> colspan="5" > Action </td>
      </tr> 
   </thead>
 
<?php

 foreach($tasks as $t){

 $count=$count+1;
    //getExamDetail($id)
    $d=null;
    if($t->id==$task){
$d=getExamDetail($taskExam);
    }else{
      $d=getExamDetail($t->examID);
    }

?>
<tr>   
  <!--$id, $type, $examID, $class, $duration ,$date, $start;
$id, $clas, $ses,$sub,$term ; -->
 

  <td>  

    <?php   
     if($d!=null)      
  echo "<a href='../choose.php?c=task&task=".$t->id."' id=examID'".$t->id."'>".$d->ses." ".$d->clas." ".$d->sub."   ".$d->term."  </a";

else  echo "<a href='../choose.php?c=task&task=".$t->id."' id=examID'".$t->id."'>"."   --select-- Exam </a";
 

 
 ?> 
   </td>

<td> 
      <select  id='<?php echo"type".$t->id;  ?>'   name='<?php echo"type".$t->id;  ?>' required="true" class="form-control" >
    <?php  
     
    //search 
     echo "<option value='' >--select--</option>";
foreach ($taskTypes as $cl) {
  if($t != null)   
  if($t->type==$cl)
    echo "<option value='".$cl."'selected > ".$cl."</option>";
else
echo "<option value='".$cl."' >".$cl."</option>"; 
else
echo "<option value='".$cl."' >".$cl."</option>";  
}   ?>

 </select>  </td>

    <td> 
 <select  id='<?php echo"classSelected".$t->id;  ?>'   name='<?php echo"classSelected".$t->id;  ?>' required="true" class="form-control" >
    <?php  
    
     echo "<option value=''>--select--</option>";
foreach ($allClasses as $cl) {
     
  if($t->class==$cl->id)
    echo "<option value='".$cl->id."'selected > ".$cl->name."</option>";
else
echo "<option value='".$cl->id."' >".$cl->name."</option>"; 
  
}   ?>
 </select>
     </td> 

         <td><input type="datetime-local" id='<?php echo"startTime".$t->id;  ?>'   name='<?php echo"startTime".$t->id;  ?>' <?php echo " value= '".$t->date."'"; ?> >   
      </td>
    <td>   <input  id='<?php echo"duration".$t->id;  ?>'   name='<?php echo"duration".$t->id;  ?>' style="display:block;" type="number" <?php echo "  value= '".$t->duration."'"; ?> > </td>
    
<td>
  
  <?php
echo date("m-d-Y h:i:sa", strtotime("+".$t->duration." minutes",strtotime($t->date)));
?>
</d>
     
    <td> 
    <input  value="Save"   type="submit" <?php echo "name='save".$t->id."'";  ?>> 
  </td>
  <td>
     <input   type="submit" value="Remove"  <?php echo "name='delete".$t->id."'";  ?> > 
    </td>

      <?php   ?> 
</tr>
     
     

<?php 

} 

?>
</form>
<form method="post">
<tr>
  <td colspan="10" > <div align="center"><h4> <font face="Goudy Stout">   Add a Task
  </font> </h4> </div>
     </td> 
</tr>

<tr>  
 


 <td>  

    <?php   

    if(""==$task){
$d=getExamDetail($taskExam);
    }
     if($d!=null)      
  echo "<a href='../choose.php?c=task& task=' id='examID'>".$d->ses." ".$d->clas." ".$d->sub."   ".$d->term."  </a";

else  echo " <a href='../choose.php?c=task& task=' id='examID'>--select Exam-- </a>";
 

 
 ?> 
   
   </td>

<td>
   <select  id='type'   name='type' required="true" class="form-control" >
    <?php   
     echo "<option value='' >--select--</option>";
foreach ($taskTypes as $cl) {
   
echo "<option value='".$cl."' >".$cl."</option>";  
}   ?>

 </select>  </td>


    <td> 
 <select  id='<?php echo"classSelected" ; ?>'   name='<?php echo"classSelected" ; ?>' required="true" class="form-control" >
    <?php  
 
     echo "<option value=''>--select--</option>";
foreach ($allClasses as $cl) {
     
echo "<option value='".$cl->id."' >".$cl->name."</option>"; 
  
}   ?>
 </select>
     </td> 


     <td>
      <input type="datetime-local" id='startTime'  required='true'   name='startTime' >
        </td>

  
    <td>   <input required='true' id='duration'   name='duration' style="display:block;" type="number"  >
     </td>
     <td></td>
       
       
    <td> 
    <input  value="Create "   type="submit" id='create'   name='create'  > 
  </td> 

      <?php   ?> 
</tr>







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
