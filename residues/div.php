<!DOCTYPE html>
<html>
<head>
	<title> div test</title>

<script type="text/javascript">
	
	function copyText(){
document.getElementById("t").value=document.getElementById("d").innerHTML ;
	}
</script>
</head>
<?php
if(isset($_POST['s'])){
	echo  " submit pressed<br>";
if(isset($_POST['t'])){
	echo   $_POST['t'];
}

}

 ?>

<body>
<form method="post">
	<input type="text" name="t" id="t"  style="display: none;">	
<div id="d"  name="d"  >
	Who love me? the? the childern, or those who smile opten <b>THis is what cause fight</b> . if you<br> know, you won't disturb life
</div>

<input type="submit" name="s"   onmouseenter="copyText()">	
</form>

 
</body>
</html>