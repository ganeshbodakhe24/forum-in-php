<?php
   if($_SERVER['REQUEST_METHOD']=='POST')
    { 
    require "component/_connect.php";
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cPassword=$_POST['cPassword'];
    $userName=$_POST['userName'];
    echo $email;
    echo $password;
    echo $cPassword;

    $sql="SELECT `user_email` FROM  `users` WHERE `user_email`='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        header("Location:index.php?userPresent=true");
        exit();
    }
    else{
        if($password==$cPassword){
            $password=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO  `users` (`user_name`,`user_email`,`user_pass`)
            VALUES ('$userName','$email','$password')";
            $result=mysqli_query($conn,$sql);
            header("Location:index.php?signupSuccess=true");
            exit();
        }
       else{
        echo "Provide Valid Password";
       }
    }
    header("Location:index.php?error=true");
    }
?>