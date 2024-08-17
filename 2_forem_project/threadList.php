<?php 
require './component/_header.php';
require './component/_nav.php';
require './component/_connect.php';

$id=$_GET['catid'];
$userId=0;
// echo $id;

$sql="SELECT * FROM `categories` WHERE `category_id`='$id'";
$result=mysqli_query($conn ,$sql);
   $row=mysqli_fetch_assoc($result);
   $categoryName=$row['category_name'];
   $categoryDesc=$row['category_discription'];

//    echo $categoryName;
//    echo $categoryDesc;

?>


<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?php echo $categoryName; ?> forums</h1>
        <p class="lead"><?php echo $categoryDesc ?></p>
        <hr class="my-4">
        <h3> Forums Rule</h3>
        <p> No Spam / Advertising / Self-promote in the forums.
            Do not post copyright-infringing material.
            Do not post “offensive” posts, links or images.
            Do not cross post questions.
        </p>
        <a class="btn btn-primary btn-lg" href="https://opentuition.com/forums/forum-rules/" role="button">Learn
            more</a>
    </div>
</div>

<br>
<hr>
<br>

<!-- TO INSERT THREADS QUESTIONS BY USENG FORM IB DATABASE  -->
<?php 
$showAlertSuccess=false;
    $method=$_SERVER['REQUEST_METHOD'];
     if($method=='POST'){
        $tName=$_POST['threadTitle'];
        $tDesc=$_POST['threadDesc'];
        
        // echo $tName;
        $userId=$_SESSION['user_id'];

         $sql=" INSERT INTO  `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`,`timestamp`) 
         VALUES ('  $tName','$tDesc','$id','$userId', current_timestamp())";
         $result=mysqli_query($conn,$sql);
         $showAlertSuccess=true;
     }
   
?>
<!-- this is alert msg successful to threads question is insert successfully -->
<?php

if($showAlertSuccess){
    echo '
    <div class="alert alert-success" role="alert">
   Thread Send Successfuly ;
    </div>
    <br><br>
    ';
}
?>

<!--question submit form -->
<div class="container">
    <h1> Start a Discussion</h1>
</div>

<div class="container">
    <!-- to check is yousr log in or not if logged in then 
only you can ask and put your question  -->
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

    // set user id
    $userId=$_SESSION['user_id'];
    echo '
<form action="'. $_SERVER['REQUEST_URI'] .' " method="POST">
<div class="form-group">
    <label for="threadTitle">Problem Title</label>
    <input type="text" class="form-control" name="threadTitle" id="threadTitle" aria-describedby="threadTitle" required>
    <small id="threadTitle" class="form-text text-muted">Keep Your title as short as possible.</small>
</div>
<div class="form-group">
    <label for="threadDesc">Ellaborate Your Concern</label>
    <textarea name="threadDesc" class="form-control" id="threadDesc" rows="3" required></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
';
}
else{
    echo "<p> Log in to to put your questions.</p>";
}

?>
  
</div>
<br>
<hr>
<br>


<!-- question  -->

<div class="container " style="min-height:400px">
   
    <?php
$sql="SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
$result=mysqli_query($conn ,$sql);
$num=mysqli_num_rows($result);
// echo $num;
if($num <1){
    echo '<h1>No Question present</h1>';
}
else{
echo ' <h1>Browse Questions</h1>';
$result=mysqli_query($conn ,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $threadId=$row['thread_id'];
    $threadTitle=$row['thread_title'];
    $threadDesc=$row['thread_desc'];
    $userId=$row['thread_user_id'];
    $threadTime=$row['timestamp'];
    // find out user name who post this question 
    $sql="SELECT `user_name` FROM  `users` WHERE `sr_no`='$userId'";
    $result1=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_assoc($result1);
    $userName=$row1['user_name'];
   
    echo'
    <div class="media">
        <img src="./img/thread_img/emp_2.png" width="50px" class="mr-3" alt="...">
        <div class="media-body">
            <p class="text-right"><b>'.$userName.' | '.$threadTime.'</b></p>
            <h5 class="mt-0"> <a href="thread.php?threadId='.$threadId.'&userId='.$userId.'">'.$threadTitle.'</a> </h5>
            <p>'.$threadDesc.'
            </p>
        </div>
    </div>
    <hr>';
  }
}


?>

</div>


<?php
require './component/_footer.php';
?>