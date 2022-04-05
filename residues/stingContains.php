<?php




$t2="a";
$t1="A";

if(strcasecmp($t1, $t2))
echo " Not Equal is true";
else
echo "  Equal  ";





echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";

function timeClashed($time1, $duration1, $time2, $duration2 ){
  
  if($time1< $time2) if (strtotime("+".$duration1." minutes",strtotime($time1) )> strtotime($time2)){
 return true; 
  }
 if($time2 < $time1) if (strtotime("+".$duration2." minutes",strtotime($time2))>strtotime($time1)){

 	echo date("m-d-Y h:i:sa", strtotime("+".$duration2." minutes",strtotime($time2)))."<br>";
 return true;
  }
  return false;
}


$t2="2020-03-03T01:01";
$t1="2020-03-03T01:40";

if($t1<$t2)
echo "string";





echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";
if(timeClashed($t1,50, $t2,50)){
	echo "Clash found";
}else{
echo "Fine";	
}
echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";echo "<bR>";

$s="stu008";
$a='rtyy0008';
if(strpos($s ,'stu')!==false)
echo "yes";
else
echo "<br>";



echo time()/60;
echo "<br>";

echo mktime();
echo "<br>";
echo date('h:i:s');
echo "h<br>";

echo microtime();














?>