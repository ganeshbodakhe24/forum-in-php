<?php

require('component/_connect.php');
require('component/_header.php');
require('component/_nav.php');
 $query=$_GET['query'];

 ?>
<div class="container">
    <h1 class="my-5"> Search Result For <i>"<?php echo $query ?> "</i></h1>
</div>
<div class="container">

    <?php
   if(isset($_GET['query'])){
    $sql="select * from `threads` where match (`thread_title`,`thread_desc`) against ('$query')";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num> 0){
        while($row=mysqli_fetch_array($result)){
            $threadTitle=$row["thread_title"];
            $threadDesc=$row["thread_desc"];
            $threadId=$row["thread_id"];
            $user_id=$row['thread_user_id'];

            echo '
            <div class="media">
            <img src="./img/thread_img/emp_2.png" width="50px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"> <a href="thread.php?threadId='.$threadId.'&userId='.$user_id.'"> '.$threadTitle.'</a> </h5>
                <p> '.$threadDesc.'
                </p>
            </div>
        </div>
        <hr>
            ';

        }

    }else{
        echo '
         <div class="container">
        <h4 class="my-5">  OOOps sorry there is no search result for <i>" '.$query.' "</i></h4>
        </div>';

    }
    }
?>
</div>

<?php

require('component/_footer.php');


?>