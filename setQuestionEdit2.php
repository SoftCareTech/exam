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

    <title id="title"> Set questions   </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template --> 

    <!-- Custom styles for this template --> 
    <link rel="stylesheet" type="text/css"href="lib/form.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="lib/new.css" rel="stylesheet">
       <link href="lib/sticky-footer-navbar.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
   <script src="lib/sweetalert.min.js"> </script>   
    </head>
 

    <body > 
  
 <?php include("sch.html"); ?> 
 <div align="center"> <h4  <?php echo "$tit";?> >Set Exam Questions </h4> </div> 
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





<form>
  <div class="exambody">    
  <div class="question">
    <div class="col-60"  > 
    <div style="float: left; " > <button> Previous</button></div><div align="center" >Question  <label class="selectedQuestion" > 50</label></div>
    <div> what is your name my name gggggggggggggggmy name is good
B my name gggggggggg ggggggggggggggggggis good
C my name is good
D my name is good
E my name is goodggggggggggggggggggis good </div>   <div align="right"  ><button>  Next</button></div></div>
    <div class="option" > <div>
      <label>A </label><input type="radio" name=""><span>my name is good</span><br>
  <label>B </label><input type="radio" name="a"><span>my name gggggggggg ggggggggggggggggggis good</span><br>
  <label>C </label><input type="radio" name="a"><span>my name is good</span><br>
  <label>D </label><input type="radio" name="a"><span>my name is good</span><br>
  <label>E </label><input type="radio" name="a"><span>my name is good</span></div></div>
  </div> 
</div> 
 



</form>


  <form method="post" >  
 <input type="submit"  value="Edit subject title" name="edit" id="edit">
  <div class="exambody">  
  <div class="question"> 
        <div class="col-60" > 

    <div style="float: left; " > <button  name="pre" > Previous</button>  </div>
    <div align="center" > Set Question  <label class="selectedQuestion" > <?php  echo "$exam->qn"; ?> </label>
    </div>
    <div> 
    <textarea   required="true" name="Question" rows="10" cols="100" id="quest"   >
      <?php      if(count($exam->questions)>0&&$exam->qn<=count($exam->questions)) echo $exam->questions[$exam->qn-1]->question;?>
       
     </textarea>  
       
     </div>   
     <form>  <div align="right"  ><button name="next" > Next</button></div></form>
    
   </div>
    <div class="option" > <div>

<?php   

for ( $i = 1; $i <= 5; $i++ ) {
  if(count($exam->questions)>0 &&count($exam->questions)>=$exam->qn){
   if( count($exam->questions[$exam->qn-1]->option)>=$i){
  ?>
  

<input   required="true" type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  <?php  if($exam->questions[$exam->qn-1]->ans==getOption($i) ) echo "checked='true' "; ?>  >
   
    <input   <?php if($i==1||$i==2) echo 'required= "true"';  ?>    type="text" value= '<?php echo $exam->questions[$exam->qn-1]->option[$i-1]; ?>'  
    name = 'op<?php echo $i  ?>' placeholder='option <?php echo getOption($i);  ?>'   > <br>
<?php
}else{
?>  
 <input   required="true" type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  >
<input   <?php if($i==1||$i==2) echo 'required= "true"';  ?>  name ='op<?php echo $i  ?>' type="text"      placeholder='option <?php echo getOption($i)  ?>'   >  <br>
   
<?php
}   }else{
?>
 
 
 <input     required="true"  type="radio"     name="ans"  value="<?php echo getOption($i); ?>"  >
  <input  <?php if($i==1||$i==2) echo 'required= "true"';  ?> name ='op<?php echo $i  ?>' type="text"       placeholder='option <?php echo getOption($i)  ?>'  >  <br>
<?php
} }  ?> 
  </div> 
</div> 
</div>
</div>


 
  <span  style="position: relative;;" > 
     
      <div  align="center" > 
      <input type="submit"   value="New  Question  " name="new" 
        >
       
       </div>

      <div align="right"  style="padding-right:5% "> 
      <input   type="submit" class="btn btn-primary" value="PREVIEW/SUBMIT" name="finish" style="color:#00FF00"> 
</div>
      <div>
        <input type="submit" value="Delete current Question  " name="delete" > 
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
