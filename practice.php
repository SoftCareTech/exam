  
<script type="text/javascript">


 function requestq(){ 
       var    xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {

                document.getElementById("timeout").innerHTML = xmlhttp.responseText;
               
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








  <?php  ///////////////////////////////////end of script////////////////////////// 
  session_start(); 
require('class/class.php');
$user = unserialize($_SESSION['user']); 

 function getQuestion(){
     return "q-".rand(1000  ,9999);
 }
 
if(isset($_SESSION['practics'])){
  $practics = unserialize($_SESSION['practics']); 
  $result=unserialize($_SESSION['res']);
   $task=unserialize($_SESSION['task']);
}else{
  echo "error:  UNSET  in practics sesesion ";
  die();
}
  
 

if(isset($_POST['question'])){ 

 if(isset($_POST['ans']))
 $result->answers[$practics->qn-1]= $_POST['ans'];   
 $practics->qn  =intval($_POST['question']);
//
 $_SESSION['practics']= serialize($practics);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['practics'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}
  


}


if(isset($_POST['next'])){ 
  if(isset($_POST['ans']))
$result->answers[$practics->qn-1]= $_POST['ans']; 
if($practics->qn==count($practics->questions)){
$practics->qn=1;
  }else{
$practics->qn=intval($practics->qn)+1 ;
}

 $_SESSION['practics']= serialize($practics);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['practics'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}
  
  

}   


 



if(isset($_POST['pre'])){ 
   
   if(isset($_POST['ans']))
   $result->answers[$practics->qn-1]= $_POST['ans']; 
if(intval($practics->qn)==1){
$practics->qn=count($practics->questions);
  } 
  else{
$practics->qn=intval($practics->qn)-1 ;
  }
     
 $_SESSION['practics']= serialize($practics);
 $_SESSION['res']= serialize($result);
 if(isset($_SESSION['practics'])&$_SESSION['res']){  
 header('Location: answerQuestion.php'); 
 exit();
}
  

}


if(isset($_POST['finish'])){
  ///submit top 
  if(isset($_POST['ans']))
  $result->answers[$practics->qn-1]= $_POST['ans']; 

 $_SESSION['practics']= serialize($practics);
 $_SESSION['res']= serialize($result);
       
 if(isset($_SESSION['practics'])&isset($_SESSION['res'])){  
   if($task->type=="practics"){
    if($result->submit()){
 header('Location: previewExam.php?c= submited succefully: see preview'); 
    }else{
       header('Location: previewExam.php?c=unable to submit call the for help do no closs the page'); 
    }
   }else{
     header('Location: previewExam.php?c= see preview'); 
   }


 exit();

}
 
  
}
 
 

   ?>  

     
<html style="color: green;">
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title id="title"> Answer question <?php echo $practics->qn ; ?>  </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
      
          
    <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/js/bootstrap.js">
    </head>




    <body  >

     
   <?php include("class/sch.html");  ?>
   

    <div  >

<?php  
$us=getUserByIdA($practics->teacherID);
echo "  <div align='center' name='timeout' id='timeout'>   

   <mark> subJect :</mark>    ".$practics->subName."
    <mark> Eximinal :</mark>    ";
    if($us!="x")
    echo $us->name;
else
  echo "Unknown";
    echo"
   <mark> duration :</mark>    ".getDuration($task->duration)."
<mark> start time :</mark>    ".$task->date."
<mark>  current( time) :</mark>    ".date('h:i:s')."
<label ".$loc." ><mark ".$tit."> remainig time :</mark>    ".getDuration(intval(($task->duration*60)- ((time()-$task->start))))."</label>  
</div>";  


if(intval(($task->duration*60)- ((time()-$task->start)))<1){
   


 ///submit top 
  if(isset($_POST['ans']))
  $result->answers[$practics->qn-1]= $_POST['ans']; 

 $_SESSION['practics']= serialize($practics);
 $_SESSION['res']= serialize($result);
       
 if(isset($_SESSION['practics'])&isset($_SESSION['res'])){  
   if($task->type=="practics"){
    if($result->submit()){
 header('Location: previewExam.php?c= submited succefully: see preview'); 
    }else{
       header('Location: previewExam.php?c=unable to submit call the for help do no closs the page'); 
    }
   }else{
     header('Location: previewExam.php?c= see preview'); 
   }


 exit();

}
 

}
////   ?>
        <div class="panel panel-primary">
 
    <div class="panel-body"> 

    <form class="form" method="post" >

    <div  > <label> Question <?php  echo  $practics->qn ; ?>  </label>
 
<div align="right">
      <input type="submit" class="btn btn-primary" value="preview" name="finish" style="color:#00FF00"> 
</div>

        <table>

    <tr> <td rowspan="6" style="padding: 10px">
    <textarea disabled="disabled"  name="Question" rows="7" cols="50" id="quest" style="border: 2; border-color:blue;" ><?php 
     if(count($practics->questions)>0&&$practics->qn<=count($practics->questions)) echo $practics->questions[$practics->qn-1]->question;?></textarea> 
 
 </td></tr>
  
 
      <?php   
for ( $i = 1; $i <= 5; $i++ ) {
  if(count($practics->questions)>0 &&count($practics->questions)>=$practics->qn){
   if( count($practics->questions[$practics->qn-1]->option)>=$i){
  ?>
  <tr>  <td  >  
<input  type="radio"     name="ans"  value='<?php echo getOption($i); ?>' 
 <?php if(isset($result->answers[$practics->qn-1])) if($result->answers[$practics->qn-1]==getOption($i) ) echo "checked='true' "; ?>     > 

<?php echo getOption($i); ?> 
 <span> :: <?php echo  $practics->questions[$practics->qn-1]->option[$i-1] ?> </span>

 </td></tr>
<?php
}} } 
?>


</table>

 </div>

  <div class="form-group col-md-12 col-md-offset-3"  > 
      <input type="submit" class="btn btn-primary" value="previous" 
       name="pre" style="color:#00FF00">
      <input type="submit" class="btn btn-primary" value="next  " name="next" 
      style="color:#00FF00" > 
    </div>
    


 
<div align="left">
   
<table width='100%'>
  <tr>
<?php
$e=0;


for($i=0;$i<count($practics->questions); $i++){
if($e==10)echo "</tr> <tr>"; 

  if(isset($result->answers[$i]))  {
  ?>

   <td > <button width='100%' style="background-color:green;width:100%"  name='question'   value='<?php echo ($i+1); ?>'>  <?php echo ($i+1); ?>  </button>  </td>
  <?php
  }else {
?>
 <td> <button  width='100%' style="background-color:red; width:100%" name='question' value=' <?php echo ($i+1); ?>'> <?php echo ($i+1); ?> </button>  </td> 
<?php }} ?> 

 
</tr>
</table>


 </div>

    </form>
    </div>
 
    
    </div>
    </div>

    </div>

    </div> 
         

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
         
          <div class="sidebar-module">
            
          </div>
         
        </div><!-- /.blog-sidebar -->

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
