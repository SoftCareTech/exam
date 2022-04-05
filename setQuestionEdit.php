  <?php 
  session_start(); 



 function getQuestion(){
     return "q-".rand(1000  ,9999);
 }



?>   
<html >
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
   
    <!-- Custom styles for this template     --> 
    
     <link rel="stylesheet" type="text/css"href="lib/form.css" rel="stylesheet">
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script> 

     <link rel="stylesheet" type="text/css" href="lib/new.css" rel="stylesheet">
    </head>




    <body > 
    
 <?php include("sch.html"); ?> 
 <h4><div <?php  echo $tit; ?> align="center"> Set Exam Questions  </div></h4>
     

<?php 

require('class/class.php'); 

if(isset($_SESSION['exam'])){
$exam = unserialize($_SESSION['exam']); 




?>









<<?php 

$exam->total=count($exam->questions); 
 


 

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

<div class="header">    
<div class="col-60-head"> 
<div class="personal_details"  > 
<img src='images/national-flag-nigeria-rectangular-shape-patriotic-symbol_18719-126.jpg'  >
 <div id="d_name" >  
    <label>NAME:  <span><?php echo getStaffName($exam->teacherID); ?></span></label>  <br>
    <label>SUBJECT:  <span><?php echo $exam->subName; ?></span></label>
  </div> 

<div id="term" > 
<div > <?php echo $exam->term; ?> <br>
  <?php echo  $exam->session." session";  ?>
</div>    
</div>  
</div>  
   </div>
    <div class="head-2-3" id="time">
      <label >Total Questions </label> <br>
 <label id="timetime">  <?php echo count($exam->questions); ?>  </label>
    </div>
    <div class="head-2-3"  > 
<button id="examheadbutton"  name="finish" class="row-20"> Submit</button>
    </div>
  </div>
 








<div class="exambody">
 <button   name="edit" id="edit">   Edit title </button> 
  <div class="question">
    <div class="col-60"  > 
    <div style="float: left; " > <button name="pre"> Previous</button></div><div align="center" > SetQuestion  <label class="selectedQuestion" > <?php  echo "$exam->qn"; ?> </label></div>
    <div> <textarea   required="true" name="Question" rows="7" cols="70" id="quest" ><?php 
     if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)) echo $exam->questions[$exam->qn-1]->question;?></textarea> 
      </div>   <div align="right"  ><button name="next" >  Next</button></div></div>
    <div class="option" > <div>

      <?php for ( $i = 1; $i <= 5; $i++ ) {
  if(count($exam->questions)>0 &&count($exam->questions)>=$exam->qn){
   if( count($exam->questions[$exam->qn-1]->option)>=$i){

?>
  <label>Option <?php echo getOption($i)  ?> </label><input style=" min-width: 5px;" required="true"  type="radio" name="ans" value="<?php echo getOption($i); ?>"  checked="checked">
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?>   value= '<?php echo $exam->questions[$exam->qn-1]->option[$i-1]; ?>'   name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
<?php
    
   }else{

?>
 <label >Option <?php echo getOption($i)  ?> </label><input  style=" min-width: 5px;" required="true"  type="radio" name="ans" value="<?php echo getOption($i); ?>" >
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
 
<?php

   } } else{
  ?>
   <label>Option <?php echo getOption($i)  ?> </label><input  style=" min-width: 5px;" required="true"  type="radio" name="ans"  value="<?php echo getOption($i); ?>"  >
   <span><input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>' ></span><br>
  
 
<?php
}
}
?> 
 
</div>
  </div> 


</div> 
</div>








 <div > 
      <input type="submit"   value="New   " name="new" ><br>
      <input   type="submit"   value="Preview" name="finish"  > 
</div>
    



 

<div class="question" >
  <div class="questions" >

    <?php
for($i=0;$i<count($exam->questions); $i++){
             if($i==10)echo "</div> <div class='questions' > "; 

if ($i==$exam->qn-1){  
?>

  <div class="selectedQuestion" ><button onclick=" return false;" style="width: 100%;text-align: center;margin-top:0px; border-radius:inherit;background-color:inherit; color:inherit;border-width: 0;" name='question' value=' > <?php echo ($i+1); ?>'> <?php echo ($i+1); ?> </button>  </div>


<?php 

 }  
  else  {   
     
?>

  <div   class="unansweredQuestion"><button style="width: 100%; text-align: center; margin-top:0px;border-radius:inherit;background-color:inherit; color:inherit;border-width: 0;" name='question'   value='<?php echo ($i+1); ?>' >  <?php echo ($i+1); ?>   </button> </div>
 <?php  

  }  

} ?> 

</div>
</div>  


        <input type="submit"   value="Delete " name="delete"   style=" 
color: #F5F5F5; background: #F25773;  
border-radius: 15px;  "   > 
 </div>
  
</form>


 

  
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
