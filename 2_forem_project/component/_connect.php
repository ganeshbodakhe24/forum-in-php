<?php 
$server="localhost";
$username="root";
$password= "";
$database="idiscuss";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
   die("connection error".mysqli_connect_error());
}
else{
    // echo"connection successfull";
}
?>

<!-- 1. all user password is start from user name and only first name is considered 
      for password storage password hashing is used hance take care of it 

    2.  the image name of category should be name of category 
-->