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
<!DOCTYPE html > 
<html  >
    <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SoftCare Tech">
    <link rel="icon" href="../../../../favicon.ico">

    <title> Staff  |</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template --> 
     
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
  <body   >
      
        <?php include("sch.html");  ?>
<div align="center">
   <div class="col-md-10 col-md-offset-1" > 

 
    
        <h5>    <a href= 'create.php'  > Create a Staff </a>  </h5> 
<form class="form" method="post">

    <div class="form-group">
     <label>  Search Query</label>
    <input  placeholder="type keyword name" type="text"    name="query" ><input   type="submit"    name="go" value="go" >
    </div>
</form>

<table >
   <thead >
   <tr >
    <td> id </td>
 <td> Name </td>
  <td>  Role </td>
   <td> Created by </td>
   <td  <?php echo $action; ?> colspan="4" > Actions </td>
      </tr> 
   </thead>
 
<?php 

 $results= getStaff();
 $count=0; 
 if($results!="x")
  foreach($results as $staff){
    $count=$count+1;
   ?> 
<tr>   
 <td>  <?php echo  $staff->id; ?>  </td>
  <td> <strong>   <?php echo  $staff->name; ?> </strong> </td>
    <td> <strong>  <?php echo  $staff->role; ?>  </strong> </td>  
    <td>    <?php echo  getCreator($staff->id); ; ?>  </td>
   
    <td> 

      <a href= 'view.php?c=<?php echo$staff->id ?>'  > view  
      </a> 
    </td>
    <td> 
<a href= 'edit.php?c=<?php echo$staff->id?>'  > edit 
      </a> 
       </td>


    <td> 
<?php if($staff->block=="no")
{  ?>
      <button  onclick='swal({
  title: "Block <?php echo$staff->name ?> ",
  text: "Type block message ",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
  animation: "slide-from-top",
   confirmButtonText: "Yes, block!",
  inputPlaceholder: "Write something" 

},
function(inputValue){
  var   xmlhttp;
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }
 
   xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ) { 

        if(xmlhttp.responseText.trim()=="true"){
           
swal({
  title: "Success",
  text: "You block <?php echo $staff->name ?>",
  type: "success",  
  closeOnConfirm: false
},
function(){
location.reload();
});


        } else{

          swal("Error ", " Error Occurd. check network connection and try again... " + xmlhttp.responseText, "error");
        }
                 
     }else if (xmlhttp.readyState == 4 || xmlhttp.status == 400 ) {
         swal("Error ", " Error Occurd. Check network connection and try again... " + inputValue, "error");  
                               
            }

        };

      xmlhttp.open("GET","block.php?msg=" + inputValue+"& block=block& c="+"<?php echo$staff->id ?>", true);
     xmlhttp.send(); 
});
  
  
' >block  </button >




<?php } if($staff->block=="yes") {?>
  <button    onclick='swal({
  title: "Are you sure?",
  text: " You will enable <?php echo $staff->name ?> to work on the system again",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes,Unblock!",
  cancelButtonText: "No, go back!",
    showLoaderOnConfirm: true,
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {

var     xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      window.console.log(xmlhttp.readyState+"  change     "+xmlhttp.status);
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200 ) { 

        if(xmlhttp.responseText.trim()=="true"){
         //   swal("Success ", "You Unblock <?php echo $staff->name ?>"  , "success"); 
            
swal({
  title: "Success",
  text: "You Unblock <?php echo $staff->name ?>",
  type: "success",  
  closeOnConfirm: false
},
function(){
location.reload();
});



        }else{
          swal("Error ", " Error Occurd. Check network connection and try again... "+ xmlhttp.responseText , "error"); 
        }
                 
     }else if (xmlhttp.readyState == 4 || xmlhttp.status == 400 ) {
         swal("Error ", " Error Occurd. check network connection and try again... " , "error");  
                               
            }

        };

      xmlhttp.open("GET","block.php?msg= <closs by <?php echo $user->id.$user->name ?>>" +"& block=blocked& c="+"<?php echo $staff->id ?>", true);
     xmlhttp.send();
    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
  } else {
    swal("Cancelled", "<?php echo $staff->name ?> is NOT blocked ", "error");
  }
});'>
    
Unblock 
  </button>

<?php }?>


       </td>
    <td> 
      <a href= '#'  > delete    
      </a> 
    </td>

      <?php   ?> 
</tr>
     
     

<?php } else 
echo "No Record Found"; ?>
</table> 



    </div> 
    </div>

     
    
<?php  include("../class/footer.html"); ?>

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
