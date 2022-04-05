  <?php 
  session_start(); 



 function getQuestion(){
     return "q-".rand(1000  ,9999);
 }



?>   
<html style="color: green;">
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gbenge Aondoakula  Raphael">
    <link rel="icon" href="../../../../favicon.ico">

    <title id="title"> create question |  </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

      <script type="text/javascript" src="generic_wiris/core/core.js"></script>
<script type="text/javascript" src="generic_wiris/wirisplugin-generic.js"></script>


          
   
    <!-- Custom styles for this template --> 
    <link rel="stylesheet" type="text/css"href="lib/form.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="lib/new.css" rel="stylesheet">
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script> 
    </head>




    <body > 
    <div> 
 <?php include("sch.html"); ?> 
 <h4><div align="center"> Set Exam Questions  </div></h4>
    

<?php 

require('class/class.php'); 

if(isset($_SESSION['exam'])){
$exam = unserialize($_SESSION['exam']); 

$exam->total=count($exam->questions);
echo " <mark>  subJect Name :  </mark> ".$exam->subName; 


echo " <mark>  Teacher Name :  </mark> ".getStaffName($exam->teacherID); 
echo " <mark>  Session   :  </mark> ".$exam->session; 
echo " <mark>  Term :  </mark> ".$exam->term; 

echo " <mark>  Total Number of set Questions:  </mark> ".count($exam->questions)."  <br>"; 

  }else{
    header('Location: /exam');
 exit();
  } 
////  

 
if(isset($_POST['question'])){ 

  $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
  if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans); 
  for($i=1;$i<=5;$i++){
       $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end
$exam->qn  =intval($_POST['question']);

 $_SESSION['exam']= serialize($exam);
 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
 exit();
}
  


}




if(isset($_POST['next'])){ 
///submit top
    $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
  if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans); 
  for($i=1;$i<=5;$i++){
       $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end
if($exam->qn==count($exam->questions)){
$exam->qn=1;
  }else{
$exam->qn=intval($exam->qn)+1 ;
}

 $_SESSION['exam']= serialize($exam);
 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
 exit();
}
  

}   


if(isset($_POST['delete'])){ 
///submit top
    $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
  if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans); 
  for($i=1;$i<=5;$i++){
       $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$pqn=count($exam->questions);
array_splice($exam->questions,$exam->qn-1,1); 

}

  //submit end
if($exam->qn< count($exam->questions)){
$exam->qn=intval($exam->qn)+1 ;
  }else
if($exam->qn<=1&& count($exam->questions)>0){
$exam->qn=count($exam->questions) ;
}else
$exam->qn=1 ;;

 $_SESSION['exam']= serialize($exam);
 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
 exit();
}
  

}   





if(isset($_POST['new'])){ 
///submit top
    $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
      if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans);
  for($i=1;$i<=5;$i++){
        $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end 
$exam->qn=count($exam->questions)+1 ; 

 $_SESSION['exam']= serialize($exam);
 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
 exit();
}
  

}   



if(isset($_POST['pre'])){ 
  ///submit top
  $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
     if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans);
  for($i=1;$i<=5;$i++){
       $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end
if(intval($exam->qn)==1){
$exam->qn=count($exam->questions);
  } 
  else{
$exam->qn=intval($exam->qn)-1 ;
  }
     
 $_SESSION['exam']= serialize($exam);
 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionEdit.php'); 
 exit();

} 

}


if(isset($_POST['finish'])){
  ///submit top
    $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
     if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans);
  for($i=1;$i<=5;$i++){
      $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end
   $_SESSION['exam']= serialize($exam);

 if(isset($_SESSION['exam'])){  
 header('Location: setQuestionView.php'); 
 die();
} 
}
 
 




if(isset($_POST['edit'])){
  ///submit top
    $ans="X";
  $quest = $_POST['Question'];
  $q = new Question();
      //$id,$question,$option ,$qn
     if(isset($_POST['ans']))
  $ans=  $_POST['ans'];
     $q->setAll(getQuestion(),$quest,$exam->qn,$ans);
  for($i=1;$i<=5;$i++){
      $opt="op".$i;
      if(isset($_POST[$opt])){
        if(strlen($_POST[$opt])>0)
      $q->option[]=$_POST[$opt];

        }else{
           // break;
        }
      } 
if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)){
$exam->questions[$exam->qn-1] = $q; 

}
  else
    $exam->questions[] = $q; 
  //submit end
   $_SESSION['exam']= serialize($exam);

 if(isset($_SESSION['exam'])){  
 header('Location: addExam.php'); 
 die();
} 
}

 
  ?>






<form method="post">
<div class="exambody"> 
  <div class="question">
    <div class="col-60"  > 
    <div style="float: left; " > <button name="pre"> Previous</button></div><div align="center" >Question  <label class="selectedQuestion" > Set Question <?php  echo "$exam->qn"; ?> </label></div>
    <div> <textarea   required="true" name="Question" rows="10" cols="100" id="quest" style="border: 2; border-color:blue;position: relative;" ><?php 
     if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)) echo $exam->questions[$exam->qn-1]->question;?></textarea> 
      </div>   <div align="right"  ><button name="next" >  Next</button></div></div>
    <div class="option" > <div>

      <?php for ( $i = 1; $i <= 5; $i++ ) {
  if(count($exam->questions)>0 &&count($exam->questions)>=$exam->qn){
   if( count($exam->questions[$exam->qn-1]->option)>=$i){

?>
  <label>Option <?php echo getOption($i)  ?> </label><input  required="true"  type="radio" name="ans" checked="checked">
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?>   value= '<?php echo $exam->questions[$exam->qn-1]->option[$i-1]; ?>'   name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
<?php
    
   }else{

?>
 <label>Option <?php echo getOption($i)  ?> </label><input  required="true"  type="radio" name="ans">
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
 
<?php

   } } else{
  ?>
   <label>Option <?php echo getOption($i)  ?> </label><input  required="true"  type="radio" name="ans">
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
 
<?php
}
}
?>









  </div> 
</div> 

</form>







     <form method="post"> 
      <div >
      <button class="btn-primary" name="edit" id="edit">   Edit subject title </button>
</div>

 
    
     
 

    
      <label> Set Question <?php  echo "$exam->qn"; ?> </label>
 <table>
<tr  >
  <td rowspan="7">
    <textarea   required="true" name="Question" rows="7" cols="50" id="quest" style="border: 2; border-color:blue;position: relative;" ><?php 
     if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)) echo $exam->questions[$exam->qn-1]->question;?></textarea> 
 
  </td>
</tr>
<?php 

for ( $i = 1; $i <= 5; $i++ ) {
  if(count($exam->questions)>0 &&count($exam->questions)>=$exam->qn){
   if( count($exam->questions[$exam->qn-1]->option)>=$i){
  ?>
 
 <tr >
  <td>
  <input   required="true" type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  <?php  if($exam->questions[$exam->qn-1]->ans==getOption($i) ) echo "checked='true' "; ?>  >
   
    <input   <?php if($i==1||$i==2) echo 'required= "true"';  ?>    type="text" value= '<?php echo $exam->questions[$exam->qn-1]->option[$i-1]; ?>'  
    name = 'op<?php echo $i  ?>' placeholder='option <?php echo getOption($i);  ?>'   style='border: 2; border-color:blue;position: relative;'> 
  </td>
  </tr>
   
<?php  
}else{
?>
 
 <tr>
  <td>
 <input   required="true" type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  >
<input   <?php if($i==1||$i==2) echo 'required= "true"';  ?>  name ='op<?php echo $i  ?>' type="text"      placeholder='option <?php echo getOption($i)  ?>'  style='border: 2; border-color:blue;position: relative;'> 
</td>
</tr>
   
<?php
}}else{
?>
 

<tr>
  <td>
 <input     required="true"  type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  >
  <input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' style='border: 2; border-color:blue;position: relative;'> 
</td>
</tr>
<?php
}}
?>  
  
 </table>

  <span  style="position: relative;;" > 
    <div >

      
    </div>

      <div  align="center" "> 
      <input type="submit" class="btn btn-primary" value="New  Question  " name="new" 
      style="color:#00FF00" >
       
       </div>

      <div align="right"  style="padding-right:5% "> 
      <input   type="submit" class="btn btn-primary" value="PREVIEW/SUBMIT" name="finish" style="color:#00FF00"> 
</div>
      <div>
        <input type="submit" class="btn btn-primary" value="Delete current Question  " name="delete"      style="color:#00FF00" > 
 </div>
</span>

 
<table>
  <tr>
<?php
$e=0;


for($i=0;$i<count($exam->questions); $i++){
if($e==10)echo "</tr> <tr>"; 
echo "<td> <button name='question' value='".($i+1)."'>".($i+1)."</button>  </td>";
}

?>  

</tr>
</table>

 </form>
 
    
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
