<?php 
require './component/_header.php';
require './component/_nav.php';
require './component/_connect.php';
$showAlertSuccess=false;
$thread_id=$_GET['threadId'];
$userId=$_GET['userId'];


// echo $id;
//find thread title and discreption
$sql="SELECT * FROM `threads` WHERE `thread_id`='$thread_id'";
$result=mysqli_query($conn ,$sql);
   $row=mysqli_fetch_assoc($result);
   $threadTitle=$row['thread_title'];
   $threadDesc=$row['thread_desc'];
//    echo $threadTitle;

?>
<!-- thread discreption -->
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4"> <?php echo $threadTitle ; ?></h1>
        <p class="lead"><?php echo $threadDesc ?></p>
      
        <?php   
                 //print who post the thread
                 $sql="SELECT `user_name` FROM  `users` WHERE `sr_no`='$userId'";
                 $result1=mysqli_query($conn,$sql);
                 $row1=mysqli_fetch_assoc($result1);
                 $userName=$row1['user_name'];
                 echo '<p><b>Posted by - '.$userName.'</b></p>';
        ?>
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


<!-- TO INSERT THREADS commentS BY USENG FORM In DATABASE  -->
<?php 
$showAlertSuccess=false;
    $method=$_SERVER['REQUEST_METHOD'];
     if($method=='POST'){
        $comment=$_POST['comment'];
        $user_id_of_comment=$_SESSION['user_id'];
        $comment=str_replace("<", "&le;" ,$comment);
        $comment=str_replace(">", "&gt;",$comment);
         $sql=" INSERT INTO  `comments` (`comment_content`,`thread_id`,`user_id`,`comment_time`) 
         VALUES ('  $comment','$thread_id',' $user_id_of_comment', current_timestamp())";
         $result=mysqli_query($conn,$sql);
         $showAlertSuccess=true;
     }
   
?>
<!-- this is alert msg successful to threads question is insert successfully -->
<?php

if($showAlertSuccess){
    echo '
    <div class="alert alert-success" role="alert">
  Your Comment Posted Successfuly;
    </div>
    <br><br>
    ';
}
?>

<!--question submit form -->
<!-- if you are logged in then only you can post your comment  -->
<div class="container">
    <h1> Start Your Discussion</h1>
<?php
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
        echo'
        <form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
        <div class="form-group">
            <label for="comment">Pose Your Comment Here</label>
            <textarea name="comment" class="form-control" id="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    ';
    }
    else{
        echo '<p> Log in to post your comment. </p>';
    }
 
?>
   
</div>

<br>
<hr>
<br>

<!-- comments  -->

<div class="container " style="min-height:400px">

    <?php
$sql="SELECT * FROM `comments` WHERE `thread_id`='$thread_id'";
$result=mysqli_query($conn ,$sql);
$num=mysqli_num_rows($result);
// echo $num;
if($num <1){
    echo '<h1>No Comment Present !!!</h1>';
}
else{
    echo '<h1>Comments</h1>';
    $result=mysqli_query($conn ,$sql);
     while($row=mysqli_fetch_assoc($result)){
    $comment_content=$row['comment_content'];
    $commentTime=$row['comment_time'];
    $user_id=$row['user_id'];
    // $threadDesc=$row['thread_desc'];


    //finding data who post this comment
    $sql="SELECT `user_name` FROM  `users` WHERE `sr_no`='$user_id'";
    $result1=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_assoc($result1);
    $userName=$row1['user_name'];
   
    echo'
    <div class="media">
        <img src="./img/thread_img/emp_2.png" width="50px" class="mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0"> <a >'.$userName.' | ' .$commentTime.'</a></h5>
            <p>'.$comment_content.'
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

