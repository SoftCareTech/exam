  <?php 
  ///////////////////////////////////php now/////////////////////// ///////////////
session_start();  
require('class/class.php');
if(isset($_SESSION['exam'])){
  $exam = unserialize($_SESSION['exam']); 
  $result=unserialize($_SESSION['res']);
  $task=unserialize($_SESSION['task']);
  $user = unserialize($_SESSION['user']); 
}else{
  echo "error:  UNSET sesesion ";
  header('Location: staff/error.php?c=UNSET sesesion (examination) '); 
  die();
}
 
if(!isset($_SESSION['user'])){
header("Location: ../staff/error.php?c=UNSET sesesion (user) "); 
  die();
}
 


if(isset($_POST['question'])){ 

 if(isset($_POST['ans']))
 $result->answers[$exam->qn-1]= $_POST['ans'];  

 $exam->qn  =intval($_POST['question']);
//
 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['exam'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}
  


}



if(isset($_POST['next'])){ 
  if(isset($_POST['ans']))
$result->answers[$exam->qn-1]= $_POST['ans']; 
if($exam->qn==count($exam->questions)){
$exam->qn=1;
  }else{
$exam->qn=intval($exam->qn)+1 ;
}

 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['exam'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}    
}   
 


if(isset($_POST['pre'])){ 
   
   if(isset($_POST['ans']))
   $result->answers[$exam->qn-1]= $_POST['ans']; 
if(intval($exam->qn)==1){
$exam->qn=count($exam->questions);
  } 
  else{
$exam->qn=intval($exam->qn)-1 ;
  }    
 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['exam'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}
  

} 
   ?>  

     
<html >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title id="title"> Answer question <?php echo"$topic->qn"; ?> |</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
      <link href="css.css" rel="stylesheet">
      <!-- sweet Alert -->
      <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"></script>     
   <link rel="stylesheet" type="text/css" href="lib/new.css"> 


 </head> 


   <body> 
<?php include("sch.html"); ?>
 <div  <?php echo$tit;?> align="center"> <h3>Examination in progress </h3></div>
<?php  
$us=getUserByIdA($exam->teacherID);
/*echo "  <div align='center' name='timeout' id='timeout'>  
    <mark> Eximinal :</mark>    ";

    if($us!="x")
    echo $us->name;
else
  echo "Unknown";
    echo"


 <mark> duration :</mark>    ".getDuration($task->duration*60)."
<mark> start time :</mark>    ".$task->date."
<mark>  current( time) :</mark>    ".date('h:i:s')."
<label ".$loc." ><mark ".$tit."> remainig time :</mark>    ".getDuration(intval(($task->duration*60)- ((time()-$task->start))))."</label>  
</div>";   
*/


if(intval(($task->duration*60)- ((time()-$task->start)))<1){
  ///submit top 
  if(isset($_POST['ans']))
  $result->answers[$exam->qn-1]= $_POST['ans']; 
   
 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);
             if ($result->submit()){
 if(isset($_SESSION['exam'])&isset($_SESSION['res'])){  
 header('Location: endExam.php'); 
 exit();

} }else{


echo '<script type="text/javascript">',
     'sweetAlert("Dupplicate input", "You have already submitted!", "error");' ,
     '</script>' ;
  //echo "<div align='center' style='color:red;'> Error: you  alreader submitted </div> ";
}
}
////   ?> 
 

<form method="post"   >

<div class="header">    
<div class="col-60-head"> 
<div class="personal_details"  > 
<img src='images/national-flag-nigeria-rectangular-shape-patriotic-symbol_18719-126.jpg'  >
 <div id="d_name" >  
    <label>NAME:  <span><?php echo $user->name; ?></span></label>  <br>
    <label>SUBJECT:  <span><?php echo $exam->subName; ?></span></label>
  </div> 

<div id="term" > 
<div > <?php echo $exam->term; ?>
</div>    
</div>  
</div>  
   </div>
    <div class="head-2-3" id="time">
      <label > Remaining Time </label> <br>
 <label id="timetime">   <?php echo getDuration(intval(($task->duration*60)- ((time()-$task->start)))); ?> </label>
    </div>
    <div class="head-2-3"  > 
<button id="examheadbutton"  name="finish" class="row-20"> Submit</button>
    </div>
  </div>
 


<?php 

if(isset($_POST['finish'])){
  ///submit top 

  if(isset($_POST['ans']))
  $result->answers[$exam->qn-1]= $_POST['ans']; 
   
$q=0;
$score=0;
foreach ($exam->questions as $question) {
 
if(isset($result->answers[$q])) if($result->answers[$q]==$question->ans) {$score++;}     
      
    $q++;

  }



    $result->score=$score;
 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);
             if ($result->submit()){
 if(isset($_SESSION['exam'])&isset($_SESSION['res'])){  
 header('Location: endExam.php'); 
 exit();

} }else{

echo '<script type="text/javascript">',
     'sweetAlert("Dupplicate input", "You have already submitted!", "error");' ,
     '</script>' ;
  //echo "<div align='center' style='color:red;'> Error: you  alreader submitted </div> ";
}
  
}



 ?> 
 
<div class="exambody"> 
  <div class="question">
        <div class="col-60" > 

    <div style="float: left; " > <button  name="pre" > Previous</button>  </div>
    <div align="center" >Question  <label class="selectedQuestion" > <?php  echo "$exam->qn"; ?> </label>
    </div>
    <div> 
    <?php 
   
        if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)) echo $exam->questions[$exam->qn-1]->question;

    ?>
       
     </div>   <div align="right"  ><button name="next" > Next</button></div>
   </div>
    <div class="option" > <div>

<?php   

for ( $i = 1; $i <= 5; $i++ ) {
  if(count($exam->questions)>0 &&count($exam->questions)>=$exam->qn){
   if( count($exam->questions[$exam->qn-1]->option)>=$i){
  ?>

      <label><?php echo getOption($i); ?></label><input  type="radio"     name="ans"  value='<?php echo getOption($i); ?>' 
 <?php if(isset($result->answers[$exam->qn-1])) if($result->answers[$exam->qn-1]==getOption($i) ) echo "checked='true' "; ?>     > <span><?php echo  $exam->questions[$exam->qn-1]->option[$i-1] ?> </span><br>

<?php
}} }  ?> 
  </div> 
</div> 
</div>
</div>

     
 

<div class="question" >
  <div class="questions" >

    <?php
$e=0;


for($i=0;$i<count($exam->questions); $i++){
             if($i==10)echo "</div> <div class='questions' > "; 

if ($i==$exam->qn-1){  
?>

  <div class="selectedQuestion" ><button onclick=" return false;" style="width: 100%; border-radius:inherit;background-color:inherit; color:inherit;border-width: 0;" name='question' value=' > <?php echo ($i+1); ?>'> <?php echo ($i+1); ?> </button>  </div>


<?php 

 } else if(isset($result->answers[$i]))  {
        if($i!=$exam->qn-1){       ?>
  <div class="answeredQuestion"  ><button style=" width: 100%; border-radius:inherit; background-color:inherit; color:inherit;border-width: 0;" name='question'   value='<?php echo ($i+1); ?>' >  <?php echo ($i+1); ?>   </button></div>

<?php } }
  else if($i!=$exam->qn-1) {   
     
?>

  <div class="unansweredQuestion"><button style="width: 100%; border-radius:inherit;background-color:inherit; color:inherit;border-width: 0;" name='question'   value='<?php echo ($i+1); ?>' >  <?php echo ($i+1); ?>   </button> </div>
 <?php   }  

} ?> 

</div>
</div> 
</form> 
<div style="padding-left:10px; ">

   <?php 
   echo "    
    <mark> Eximinal :</mark>  ";

    if($us!="x")
    echo $us->name." <br> ";
else
  echo "Unknown  <br> ";
    echo" <mark> duration :</mark>     ".getDuration($task->duration*60)." <br> 
<mark> start time :</mark>     ".$task->date;
?>

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


<script type="text/javascript">

 
// Warning before leaving the page (back button, or outgoinglink)
window.onbeforeunload = function() {
  //window.alert(window.Location.href);
   return  ;
   //if we return nothing here (just calling return;) then there will be no pop-up question at all
   //return;
}; 


 


 function requestq(){ 
       var    xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {

                document.getElementById("timetime").innerHTML = xmlhttp.responseText;
               
             // console.log(" callback refresh  in 10s   ");
             ref(100);  }

        };
        xmlhttp.open("GET", "task/timeout.php", true); 
        xmlhttp.send();

      }  

  function ref(t){
   setTimeout( "requestq()"  ,t);
}

requestq();



</script> 
</body> 
</html>
