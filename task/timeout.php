<?php 
 session_start();  

require('../class/class.php');
$exam =null;
if(isset($_SESSION['exam'])){
  $exam = unserialize($_SESSION['exam']); 

  $result=unserialize($_SESSION['res']);
  $task=unserialize($_SESSION['task']);
}else if(isset($_SESSION['practics'])){
  $exam = unserialize($_SESSION['practics']); 
$result=unserialize($_SESSION['res']);
  $task=unserialize($_SESSION['task']);

} 
  


if(intval($task->duration- ((time()-$task->start)/60))<1){
  ///submit top 
  echo "string";
   if(isset($_POST['ans']))
  $result->answers[$exam->qn-1]= $_POST['ans']; 
 $_SESSION['exam']= serialize($exam);
 $_SESSION['res']= serialize($result);

if($task->type=="Exam"){
             if ($result->submit()){
 if(isset($_SESSION['exam'])&isset($_SESSION['res'])){  
 header('Location: endExam.php'); 
 exit();

}      }
else{ 
  
$us=getUserByIdA($exam->teacherID);
/*
 echo "  <mark> subJect :</mark>    ".$exam->subName."<mark> Eximinal :</mark>    ";
    if($us!="x"){
    echo $us->name;}
       else{
  echo "Unknown";
}
    echo"  <mark> duration :</mark>    ".getDuration($task->duration*60)."
<mark> start time :</mark>    ".$task->date."
<mark>  current( time) :</mark>    ".date('h:i:s')."
<label style= ' color:#DC143C;' ><mark style= ' color:blue;'> remainig time :</mark>    ".getDuration(intval(($task->duration*60)- ((time()-$task->start))))."</label>  ";   */
echo '<script type="text/javascript">',
     'sweetAlert("Dupplicate input", "You have already submitted!", "error");' ,
     '</script>' ;
  //echo "<div align='center' style='color:red;'> Error: you  alreader submitted </div> ";
  echo getDuration(intval(($task->duration*60)- ((time()-$task->start))));
} ///end submit exam error


}

  if($task->type=="practics"){
           if($result->submit()){
               header('Location: previewExam.php?c= submited succefully: see preview'); 
             }else{
          header('Location: previewExam.php?c=unable to submit call the for help do no closs the page'); 
                    }  }
       else{
              header('Location: previewExam.php?c= see preview'); 
              }
 
 
}  //end time expired

else{
 
$us=getUserByIdA($exam->teacherID);
/*echo "  <mark> subJect :</mark>    ".$exam->subName."<mark> Eximinal :</mark>    ";
    if($us!="x"){
    echo $us->name;}
       else{
  echo "Unknown";
}
    echo"  <mark> duration :</mark>    ".getDuration($task->duration*60)."
<mark> start time :</mark>    ".$task->date."
<mark>  current( time) :</mark>    ".date('h:i:s')."
<label style= ' color:#DC143C;' ><mark style= ' color:blue;'> remainig time :</mark>    ".   getDuration(intval(($task->duration*60)- ((time()-$task->start)))); ."</label>  ";  */
 echo getDuration(intval(($task->duration*60)- ((time()-$task->start))));
}

?> 