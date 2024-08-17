<?php
    require "component/_connect.php";
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $email=$_POST['email'];
        $password=$_POST['password'];
        // echo $email;
        // echo $password;
       $sql="SELECT * FROM `users` WHERE `user_email`='$email'";
       $result=mysqli_query($conn,$sql);
       $num=mysqli_num_rows($result);
       if($num>0){
        $row=mysqli_fetch_assoc($result);
       if(password_verify($password,$row['user_pass'])){
            $userName=$row['user_name'];
            $userId=$row['sr_no'];
            echo $userId;
           session_start();
        //    setting the session to get this value in other page also by session 
           $_SESSION['loggedin']=true;
           $_SESSION['userEmail']=$email;
           $_SESSION['userName']=$userName;
           $_SESSION['user_id']=$userId;


           header('Location:index.php?loginSuccess=true');
       }
       else{
        header('Location:index.php?loginErrorPass=true');
       }
       }
       else{
        header('Location:index.php?loginErrorEmail=true');
       }
    }
?>