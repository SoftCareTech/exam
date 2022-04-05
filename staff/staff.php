
<?php 
/**
 * 
 */
class Staff  
{
	
	 

public $id, $name, $pass, $role, $phone, $address, $user, $dateCreated, $married, $dBirth, $blocked, $createdBy, $email, $gender, $case, $blockMsg;
public function setAll($id, $name, $pass, $role, $phone, $address, $user, $dateCreated, $married, $dBirth, $blocked, $createdBy, $email, $gender, $case, $blockMsg){



$this->id=$id;$this->name= $name;$this->pass=$pass;
$this->role=$role;
$this->phone=$phone;
$this->address= $address;$this->user= $user;
$this->dateCreated= $dateCreated;$this->married=$married;
$this->dBirth=$dBirth;$this->blocked= $blocked;$this->createdBy=$createdBy;$this->email=$email;$this->gender=$gender;$this->case=$case;$this->blockMsg=$blockMsg;

}



public function submit(){
 include ("kon.php");   
      $query ="insert into staff values
      ('$this->id',
      '$this->name',
      '$this->pass',
	 '$this->role',
      '$this->phone',
      '$this->address',
      '$this->user',
      '$this->dateCreated',
      '$this->married',
      '$this->dBirth',
      '$this->blocked',
      '$this->createdBy',
      '$this->email',
      '$this->gender',
      '$this->case',
      '$this->blockMsg'
    )";

      if(mysqli_query($db,$query)){
           
         //echo"<mark> cerated succefully </mark>";

           echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "Created succefully", "success");' ,
     '</script>' ;

         return true;
        }
      else{
        
       echo" <mark>error occure in staff.php </mark>   ";
       return false;
        }  
    
}


public function submitUpdate(){
 include ("kon.php");   
      $query ="UPDATE staff SET
      id= '$this->id',
      name= '$this->name',
     pass= '$this->pass',
	role= '$this->role',
    phone=  '$this->phone',
    address=  '$this->address',
    user=  '$this->user',
     dateCreated= '$this->dateCreated',
    married=  '$this->married',
     dBirth= '$this->dBirth',
     blocked= '$this->blocked',
     createdBy= '$this->createdBy',
     email= '$this->email',
     gender= '$this->gender',
      `case` ='$this->case',
      blockMsg= '$this->blockMsg'
          where user='$this->user' and pass='$this->pass'  ";

      if(mysqli_query($db,$query)){
            

         return true;
        }
      else{ 
       return false;
        }  
    
}


public function submitUpdate1($id){
 include ("kon.php");   
      $query ="UPDATE staff SET
      id= '$this->id',
      name= '$this->name',
     pass= '$this->pass',
	role= '$this->role',
    phone=  '$this->phone',
    address=  '$this->address',
    user=  '$this->user',
     dateCreated= '$this->dateCreated',
    married=  '$this->married',
     dBirth= '$this->dBirth',
     blocked= '$this->blocked',
     createdBy= '$this->createdBy',
     email= '$this->email',
     gender= '$this->gender',
      `case` ='$this->case',
      blockMsg= '$this->blockMsg'
          where id='".$id."'";
  
      if(mysqli_query($db,$query)){
           
           echo '<script type="text/javascript">',
     'sweetAlert("Succcess", "Updated succefully", "success");' ,
     '</script>' ;

       //  echo"<mark> updated succefully </mark>";
         return true;
        }
      else{
        
       echo" <mark>error occure in staff.php </mark>   ";
       return false;
        }  
    
}
}


function getStaffById($id){
  include("kon.php"); 
 $sql="SELECT  * FROM staff   where id = '$id' ";   
$stmt = mysqli_query($db, $sql);  
 
$e=null;
while ($row = $stmt->fetch_assoc() ){ 
$e= new Staff(); 
//id, name, pass, role, phone, address, user, dateCreated, married, dBirth, blocked, createdBy, email, gender, case, blockMsg
$e->setAll(
$row["id"], $row["name"],
$row["pass"],$row["role"],$row["phone"], 
$row["address"],$row["user"], 
$row["dateCreated"],
$row["married"],
$row["dBirth"],
$row["blocked"],
$row["createdBy"],
$row["email"],
$row["gender"],
$row["case"],
$row["blockMsg"]
) ;
    
   
}   
return $e;

}
 ?>