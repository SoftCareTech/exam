<?php

function getDuration($t){

  if(intval($t)>3600){
   $h= intval($t/3600);
   if(intval($h)>1)
    return  $h."hrs ".getDuration($t %3600);
  else  
   return $h." hr ".getDuration($t % 3600);

  }else  if(intval($t)>59){
    $m= intval($t/60);
    if(intval($m)>1)
    return $m." mins ".getDuration($t %60);
  else return $m." min ".getDuration($t %60);
  }else{
    if(intval($t)>1)
    return $t." s";
  else return $t." s";
  }

}
 class exam {

public
	$qn,$id, $clas, $session,	$subName,	 $teacherID,	  $examDate,	   $setDate,	   $total=0,$term, $questions = array(); 

public function submit(){
  include ("class/kon.php");     
    $ques=serialize($this->questions); 
///$this->teacherID="22l";
$query ="";
    $e= getExam($this->id);
    if($e!=null){
    if ($this->teacherID==$e->teacherID) {
     //update exam set session='go'
     // id, class, session, question, total, setDate, examDate, subName, teacherID, term

    $query ="UPDATE  exam SET
       
   class =   '$this->clas',
     session = '$this->session', 
   question=   '$ques' ,
     total= $this->total,
     setDate = '$this->setDate', 
     examDate = '$this->examDate', 
      subName = '$this->subName',
      teacherID = '$this->teacherID',
      term = '$this->term' WHERE id= '$this->id'
    ";

  }
  else{
    $this->id = $this->id.$this->teacherID;
///

 $query ="insert into exam values
      ( 
      '$this->id',
      '$this->clas',
      '$this->session', 
      '$ques' ,
      $this->total,
      '$this->setDate', 
      '$this->examDate', 
      '$this->subName',
      '$this->teacherID',
      '$this->term'
    )";
echo "creating new  Exam from somebody exams";
 echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "creating new  Exam from somebody exams ", "success");' ,
     '</script>' ;
///
  }
 }else{
    // id, class, session, question, total, setDate, examDate, subName, teacherID
    //insert into exam  values( 'a','$b','c', 'd' ,'4','e','f','g','h');
      $query ="insert into exam values
      ( 
      '$this->id',
      '$this->clas',
      '$this->session', 
      '$ques' ,
      $this->total,
      '$this->setDate', 
      '$this->examDate', 
      '$this->subName',
      '$this->teacherID',
      '$this->term'
    )";


  }

      if(mysqli_query($db,$query)){
         //  echo"<div align='center'>You have Saved the Exams </div>";
         echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "You have Saved the Exams ", "success");' ,
     '</script>' ;
        }
      else{
       echo"error occure in Class.php    ";
        }  
    
}

public function setHead($id, $clas, $session,   $setDate, $examDate, $subName, $teacherID,$qn,$term){ 
 $this->id=$id;
  $this->clas=$clas;
    $this->session=$session;
      $this->qn=$qn; 
      $this->setDate=$setDate;
      $this->examDate=$examDate;
      $this->subName=$subName;
      $this->teacherID=$teacherID; 
      $this->term=$term;  
}
public function setAll($id, $clas, $session,   $setDate, $examDate, $subName, $teacherID,$qn,$term){ 
 $this->id=$id;
  $this->clas=$clas;
    $this->session=$session;
      $this->qn=$qn; 
      $this->setDate=$setDate;
      $this->examDate=$examDate;
      $this->subName=$subName;
      $this->teacherID=$teacherID; 
      $this->term=$term; 
$this->questions= array();
}
  }
 
function getOption($i){ 

  if($i==1){
    return "A";
  } else
  if($i==2){
    return "B";
  }else
  if($i==3){
    return "C";
  }else
  if($i==4){
    return "D";
  }else
  if($i==5){ 

    return "E";
  }
  return 'X';
}

class Question{
public $id;
public $question;
public $option = array() ;
public $qn;
public $ans;

public function setAll($id,$question ,$qn,$ans) {
  $this->option = array(); 
    $this->id=$id;
     $this->qn=$qn;
     $this->question=$question;
      $this->ans=$ans;
}
}

class Result{
  public
  $id, $stuID, $examID,  $answers, $score, $date;
//id, stuID, examID, answers, score
  public function setInit($id, $stuID,$examID){
$this->id =$id;
$this->stuID=$stuID;
$this->examID=$examID;
$this->score=0;
$this->answers =   array();
}
public function submit(){
  include ("class/kon.php");     
    $answers=serialize($this->answers); 
    //id, stuID, examID, answers, score, date
    $cd=Date('Y:M:D:H:L:S');
      $query ="insert into result values
      ( 
      '$this->id',
      '$this->stuID',
      '$this->examID', 
      '$answers',
      $this->score,
      '$cd'
    )";

      if(mysqli_query($db,$query)){
           return true;
        }
      else{
        return false;
       echo"error occure in Class.php    ";
        }  
    
} 
public function setResult($id){
  require("kon.php");
 $total =getTotal($e);
 $sql="SELECT id, stuID, examID, answers, score, date   from    result where id='".$id."';";  
$stmt = mysqli_query($db, $sql);  
if ($stmt!=null)
while ($row = $stmt->fetch_assoc()){  
 
$this->id =$row["id"];
$this->stuID=$row["stuID"];
$this->examID=$row["ExamID"];
$this->score=$row["score"];
$this->score=$row["date"];
$this->answers = unserialize($row["answers"]);


}   
 
return ; 
} 

}

 

 class User{
  public
  $id, $name,   $role ,$block; 
  public function setAll( $id, $name, $role,$block){
$this->id =$id;
$this->name=$name;
$this->role =$role ;  
$this->block =$block ; 
}

  
 }
 

function getUserS($user,$pass){
  require("kon.php");
 $sql="SELECT id, name, role, block FROM  students  where pass = '$pass' and user='$user' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["role"],$row["block"]); 
     return $user; 
}   
return "x";
}




function getStaff(){
  require("kon.php");
 $sql="SELECT id, name, role, blocked FROM  staff ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
$a= array();
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["role"],$row["blocked"]); 
     $a[]= $user; 
}   
return $a;
}

function getStudents( ){
  require("kon.php");
 $sql="SELECT id, name, currentClass ,block FROM  students ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
$a= array();
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["currentClass"],$row["block"]); 
     $a[]= $user; 
}   
return $a;
}

function getStudentByCol( $col, $value){
  require("kon.php");
 $sql="SELECT id, name, currentClass, block FROM  students WHERE  `".$col."`='".$value."'" ;   
 
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
$a= array();
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["currentClass"],$row["block"]); 
     $a[]= $user; 
}   
return $a;
}
class Classes{


  public $id, $level, $name, $monitor1, $monitor2, $master, $session;

  public function setAll($id, $level, $name, $monitor1, $monitor2, $master, $session){

    $this->id=$id;$this->level= $level;
    $this->name=$name;$this->monitor1=$monitor1;
    $this->monitor2= $monitor2;
    $this->master= $master;$this->session=$session;
}



public function getClass(){

  require("kon.php");
 $sql="SELECT  *  from class  where id='$this->id'   ";   
$stmt = mysqli_query($db, $sql); 
 
if($stmt!=null)
while ($row = $stmt->fetch_assoc()){  

$t= new Classes(); 
$t->setAll($row["id"],$row["level"],$row["name"],$row["monitor1"],$row["monitor2"],$row["master"],$row["session"]);
        
  return $t;   
}  
return null;
}
//id, level, name, monitor1, monitor2, master, session

public function submit(){
include ("../class/kon.php"); 
 
    $e= $this->getClass();
    if($e!=null){ 
    $query ="UPDATE  class SET
       
   level =   $this->level,
     name = '$this->name', 
     monitor1= '$this->monitor1',
     monitor2 = '$this->monitor2', 
     master = '$this->master',
     session = '$this->session'    WHERE id='$this->id'
    ";

   
 }else{ 
      $query ="INSERT INTO class VALUES
      ( 
      '$this->id',
        $this->level,
      '$this->name', 
      '$this->monitor1',
     '$this->monitor2', 
     '$this->master',
     '$this->session'
    )";
  } 
      if(mysqli_query($db,$query)){
      //echo"<div align='center'>You have Saved the class </div>";
            echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "You have Saved the Class", "success");' ,
     '</script>' ;
           return true;
        }
      else{
       echo"error occure in Class.php   in classes submit  ";
       return false;
        } 
}

public function delete(){

include ("../class/kon.php");     
///id, type, examID, class, duration, date $id, $type, $examID, $class, $duration ,$date, $start;
    $e=  $this->getClass();
    if($e!=null){ 
    $query ="DELETE FROM class   WHERE id='$this->id'
    ";

   if(mysqli_query($db,$query)){
        //   echo"<div align='center'>You have deleted the class </div>";
             echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "You have deleted the class", "success");' ,
     '</script>' ;

           return true;
        }
      else{
       echo"error occure in Class.php  classes->delete()  ";
       return false;
        } 
 }else{ 
   echo"<div align='center'>class  not found </div>";
     echo '<script type="text/javascript">',
     'sweetAlert("Error", "Class  not found", "error");' ,
     '</script>' ;

    return false;
}
}
      
}   

///end class table


function getAllClasses( ){
  require("kon.php");
 $sql="SELECT * FROM  class " ;   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
$a= array();
while ($row = $stmt->fetch_assoc()){  
  $c= new Classes();
     $c->setAll( $row["id"],$row["level"],$row["name"],$row["monitor1"],$row["monitor2"],$row["master"],$row["session"]); 
     $a[]= $c; 
}   
return $a;
}



function getAllClass( ){
  require("kon.php");
 $sql="SELECT id, name, level FROM  class " ;   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
$a= array();
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["level"],""); 
     $a[]= $user; 
}   
return $a;
}


function getUserByIdS($id){
  require("kon.php");
 $sql="SELECT id, name, role , block FROM  students  where id = '$id' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["role"],$row["block"]); 
     return $user; 
}   
return "x";
}

function getCreator($id){
  require("kon.php");
 $sql="SELECT   c.name FROM  staff c,staff s  where c.id=s.createdBy  and   s.id ='".$id."'";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){   
     
     return $row["name"]; 
}   
return "x";
}


function getStudentCreator($id){
  require("kon.php");
 $sql="SELECT   c.name FROM  staff c,students s  where c.id=s.createdBy  and   s.id ='".$id."'";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){   
     
     return $row["name"]; 
}   
return "x";
}



function getClassName($id){
  require("kon.php");
 $sql="SELECT   name FROM  class WHERE id ='".$id."'";  
 
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'unknown class';
}
while ($row = $stmt->fetch_assoc()){   
     
     return $row["name"]; 
}   
return "unknown class";
}

function getUserByIdA($id){
  require("kon.php");
 $sql="SELECT id, name, role , blocked FROM  staff  where id = '$id' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["role"],$row["blocked"]); 
     return $user; 
}   
return "x";
}

function getUserA($user,$pass){
  require("kon.php");
 $sql="SELECT id, name, role, blocked FROM staff  where pass = '$pass' and user='$user' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'x';
}
while ($row = $stmt->fetch_assoc()){  
  $user= new User();
     $user->setAll( $row["id"],$row["name"],$row["role"],$row["blocked"]); 
     return $user; 
}   
return "x";
}




function getStaffName($id){
require("kon.php");
 $sql="SELECT   name  FROM staff  where id = '$id' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'X Teacher';
}
while ($row = $stmt->fetch_assoc()){  
     return $row["name"]; 
}   
return "x  Teacher";

}


function getStudentName($id){
require("kon.php");
 $sql="SELECT   name  FROM students  where id = '$id' ";   
$stmt = mysqli_query($db, $sql); 
if($stmt==null){
  return 'X Student ';
}
while ($row = $stmt->fetch_assoc()){  
     return $row["name"]; 
}   
return "x  Student ";

}


function getExamID(){
        return "exam-".rand(100000,999999);
    }
    function getQuestionID(){
        return "que-".rand(1,999999);
    }


    class Choose{
      public $id, $clas, $ses,$sub,$term,$teacherID,$class;
    }

function getALLExams($orderby){
  require("kon.php");
 $sql="SELECT  e.id, e.class, e.session,    e.subName ,e.term , s.name from exam e, staff s, class c  where s.id=e.teacherID and c.id=e.class   order by   ".$orderby; 
  
$stmt = mysqli_query($db, $sql); 
$res=array();
while ($row = $stmt->fetch_assoc()){  

$ch= new Choose(); 
    $ch->id=$row["id"];  
    $ch->clas= getClassName($row["class"]);
    $ch->class=$row["class"];
    $ch->ses=$row["session"];
    $ch->sub=$row["subName"];
 $ch->term=$row["term"];
 $ch->teacherID=$row["name"];
    $res[]=$ch;
}  
return $res; 
}

class Task{
  public $id, $type, $examID, $class, $duration ,$date, $start;

  public function setAll($id, $type, $examID, $class, $duration ,$date){
    $this->id=$id;
$this->type=$type;$this->examID=$examID;
$this->class=$class ;
$this->duration=$duration; 
$this->date=$date;
}



public function getTask(){

  require("kon.php");
 $sql="SELECT  *  from task  where id='$this->id'   ";   
$stmt = mysqli_query($db, $sql); 
 
if($stmt!=null)
while ($row = $stmt->fetch_assoc()){  

$t= new Task(); 
$t->setAll($row["id"],$row["type"],$row["examID"],$row["class"],$row["duration"],$row["date"]);
        
  return $t;   
}  
return null;
}


public function submit(){
include ("../class/kon.php");     
    
///id, type, examID, class, duration, date $id, $type, $examID, $class, $duration ,$date, $start;
 
    $e= $this->getTask();
    if($e!=null){ 
    $query ="UPDATE  task SET
       
   type =   '$this->type',
     examID = '$this->examID', 
     class= '$this->class',
     duration = '$this->duration', 
     date = '$this->date'    WHERE id='$this->id'
    ";

   
 }else{ 
      $query ="insert into task values
      ( 
      '$this->id',
      '$this->type',
      '$this->examID', 
     '$this->class',
     '$this->duration', 
     '$this->date'
    )";


  } 
      if(mysqli_query($db,$query)){
          // echo"<div align='center'>You have Saved the Task </div>";
            echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "You have Saved the Task", "success");' ,
     '</script>' ;

           return true;
        }
      else{
       echo"error occure in Class.php    ";
       return false;
        } 
}

public function delete(){

include ("../class/kon.php");     
///id, type, examID, class, duration, date $id, $type, $examID, $class, $duration ,$date, $start;
    $e=  $this->getTask();
    if($e!=null){ 
    $query ="DELETE FROM task   WHERE id='$this->id'
    ";

   if(mysqli_query($db,$query)){
           //echo"<div align='center'>You have deleted the Task </div>";

           echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "Deleted succefully", "success");' ,
     '</script>' ;

           return true;
        }
      else{

       echo"error occure in Class.php  task->delete()  ";
       return false;
        } 
 }else{ 
   //echo"<div align='center'>Task not found </div>";

    echo '<script type="text/javascript">',
     'sweetAlert("Error", " Task not found","error");' ,
     '</script>' ;
    return false;
}
}
      
}



function getTasks(){
  require("kon.php");
 $sql="SELECT  *  from task    ";   
$stmt = mysqli_query($db, $sql); 
$res=array();
if($stmt!=null)
while ($row = $stmt->fetch_assoc()){  

$t= new Task(); 
$t->setAll($row["id"],$row["type"],$row["examID"],$row["class"],$row["duration"],$row["date"]);
        
    $res[]=$t;
}  
return $res; 
}
//
function getExamDetail($id){
  require("kon.php");
 $sql="SELECT  id, class, session,    subName ,term  from exam e  WHERE e.id='".$id."'";  
// $sql=SELECT  e.id, e.class, e.session,    e.subName ,e.term , s.name from exam e, staff s, class c  where s.id=e.teacherID and c.id=e.class and e.id='".$id."'   order by   ".$orderby; 
$stmt = mysqli_query($db, $sql); 
while ($row = $stmt->fetch_assoc()){  

$ch= new Choose(); 
    $ch->id=$row["id"];  
    $ch->clas=getClassName($row["class"]);
    $ch->ses=$row["session"];
    $ch->sub=$row["subName"];
 $ch->term=$row["term"];
  return $ch;  
}   

return null ;
}

function getTotal($id){
 require("kon.php");
  
 $sql="SELECT  total  from    exam  WHERE id='".$id."'";  
$stmt = mysqli_query($db, $sql); 

if ($stmt!=null)
while ($row = $stmt->fetch_assoc()){  
 return $row["total"];
}   

return null;

}
function getClassResult($e){
  require("kon.php");
 $total =getTotal($e);
 $sql="SELECT id ,score, stuID , examID   from    result where examID='".$e."';";  
$stmt = mysqli_query($db, $sql); 
$res=array();
if ($stmt!=null)
while ($row = $stmt->fetch_assoc()){  
$ch= new Choose(); 
 $ch->id=$row["id"];  
 $ch->ses= $row["stuID"];

    $ch->clas=getStudentName($row["stuID"]);
    
    $ch->sub=$row["score"];
   $ch->block=$row["examID"];
   $sc=$row["score"];
if($total!=null&$total!=0 ){
 $ch->term= (($sc/$total)*100)." %  of ".$total;
}
  else 
    $ch->term= "undefined";



$res[]=$ch;
}   
 
return $res; 
}
function getResults($user,$orderBy){
  require("kon.php");
//$sql="SELECT  e.id, e.class, e.session,    e.subName ,e.term , s.name from exam e, staff s, class c  where s.id=e.teacherID and c.id=e.class   order by   ".$orderby; 
  
  if($user->role=="admin"){
 $sql="SELECT DISTINCT examID  FROM result r,exam  e where e.id= r.examID ";
  
}else{
$sql="SELECT DISTINCT examID  FROM result r,exam  e where e.teacherID =".$user->id." and e.id= r.examID  "; 
}

$stmt = mysqli_query($db, $sql); 
$res=array();
if ($stmt!=null)
while ($row = $stmt->fetch_assoc()){  
$ch= new Choose(); 
  $ch= getExamDetail($row['examID']); 
if($ch!=null)
    $res[]=$ch;
}   

return $res;
}












 function getExam($idn) {
 require("kon.php");
 $sql="SELECT  * FROM exam   where id = '$idn' ";   
$stmt = mysqli_query($db, $sql); 
//id, class, session, question, total, setDate, examDate, subName, teacherID TERM

$e=null; 
while ($row = $stmt->fetch_assoc() ){ 
    $e= new Exam();  
    $e->id=$row["id"]; 
      $e->clas=$row["class"];
      $e->session =$row["session"];
      $e->questions= unserialize($row["question"]);
      $e->total=$row["total"];
      $e->setDate=$row["setDate"] ;
      $e->examDate=$row["examDate"];
      $e->subName=$row["subName"];
       $e->teacherID=$row["teacherID"];
       $e->term=$row["term"];
   
}    
return $e;

 }  

/**
* 
*/
class Student
{
  public $id, $name, $address, $phone, $gPhone, $user, $pass, $role, $gName, $createdBy, $admittedClass, $admittedSession, $currentClass, $currentSession, $block, $case, $blockMsg, $dateCreated;
   
function setAll($id, $name, $address, $phone, $gPhone, $user, $pass, $role, $gName, $createdBy, $admittedClass, $admittedSession, $currentClass, $currentSession, $block, $case, $blockMsg, $dateCreated){

  $this->id =$id ;  $this->name= $name;
  $this->address= $address;  $this->phone= $phone;
  $this->gPhone= $gPhone;  $this->user= $user;
  $this->pass= $pass;  $this->role= $role;
  $this->gName= $gName; $this->createdBy=  $createdBy;
 $this->admittedClass=$admittedClass; $this->admittedSession= $admittedSession;
  $this->currentClass=$currentClass;  $this->currentSession=$currentSession;
   $this->block=$block;   $this->case= $case;
   $this->blockMsg= $blockMsg ;   $this->dateCreated=$dateCreated;
}


   
public function submit(){
  include ("kon.php");  
   
      $query ="insert into students values
      (  '$this->id' ,
  '$this->name',  '$this->address',
  '$this->phone',  '$this->gPhone',
  '$this->user',  '$this->pass',
  '$this->role',  '$this->gName',
 '$this->createdBy', '$this->admittedClass',
 '$this->admittedSession',  '$this->currentClass',
  '$this->currentSession',   '$this->block',
   '$this->case',   '$this->blockMsg',   '$this->dateCreated'
    )";

      if(mysqli_query($db,$query)){
           
        // echo" cerated succefully  ";

           echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "Created succefully", "success");' ,
     '</script>' ;

         return true;
        }
      else{
        
       echo"error occure in Class.php    ";
       return false;
        }  
 }

//id, name, address, phone, gPhone, user, pass, role, gName, createdBy, admittedClass, admittedSession, currentClass, currentSession, block, case, blockMsg, dateCreated
public function submitUpdate(){
  include ("kon.php");  
   
      $query ="UPDATE students SET
    `id`= '$this->id' ,
  `name`='$this->name', 
  `address`= '$this->address',
  `phone`='$this->phone',  
  `gPhone`='$this->gPhone',
  `user`='$this->user', 
   `pass`= '$this->pass',
  `role`='$this->role',
   `gName`= '$this->gName',
 `createdBy`='$this->createdBy', 
 `admittedClass`='$this->admittedClass',
 `admittedSession`='$this->admittedSession', 
  `currentClass`='$this->currentClass',
  `currentSession`='$this->currentSession',  
  `block`= '$this->block',
  `case`= '$this->case', 
   `blockMsg`=  '$this->blockMsg',
    `dateCreated`=    '$this->dateCreated' WHERE `pass`= '$this->pass' and `user`='$this->user'
    ";

      if(mysqli_query($db,$query)){
           
        //echo" Updated  succefully  "; 
         return true;
        }
      else{
        
       echo"error occure in Class.php    ";
       return false;
        }  
 }

}
function getStudent($id){
  require("kon.php");
 $sql="SELECT  * FROM students   where id = '$id' ";   
$stmt = mysqli_query($db, $sql);  
//id, name, address, phone, gPhone, user, pass, role, gName, createdBy, admittedClass, admittedSession, currentClass, currentSession, block, case, blockMsg, dateCreated 
$e=null;
while ($row = $stmt->fetch_assoc() ){ 
$e= new Student(); 
$e->setAll(
$row["id"], $row["name"],
$row["address"],$row["phone"],
$row["gPhone"],$row["user"],
$row["pass"],$row["role"],
$row["gName"],$row["createdBy"],
$row["admittedClass"],$row["admittedSession"],
$row["currentClass"],$row["currentSession"],
$row["block"],$row["case"],
$row["blockMsg"],$row["dateCreated"]
) ;
    
   
}   
return $e;

}

 

 
 ?>
