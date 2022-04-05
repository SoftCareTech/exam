  <?php 
  session_start(); 
require('class/class.php');  
$ids = unserialize($_SESSION['ids']); 
$examMerge =new Exam();
$qn=1;
for( $i=0; $i<count($ids) ;$i++) { 
$e =getExam($ids[$i]); 
if($e!=null)
foreach ($e->questions as $question) {
  $question->qn=$qn;
  $examMerge->questions[]=$question; 
$qn++;
} 
}

$_SESSION['exam']=serialize($examMerge);
header('Location:addExam.php'); 
 