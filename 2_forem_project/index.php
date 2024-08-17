<?php 
require './component/_header.php';
require './component/_nav.php';
require './component/_connect.php';
?>

<!-- caroaL -->
<div id="carouselExampleIndicators" class="carousel slide group" data-ride="carousel" style=" margin:auto; width:100%">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/slider-1.jpg" class="d-block w-100" height="600px" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/slider-2.jpg" class="d-block w-100" height="600px" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/slider-3.jpg" class="d-block w-100" height="600px" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<!-- TEXT OF WEB SITE -->


<h1 class="text-center m-3 my-5">iDiscuss -Categories</h1>

<!-- iDiscuss -Categories -->
<div class="  m-5 " style=" display:inline-block; margin-auto;">
<?php
     $sql='SELECT * FROM `categories`';
     $result=mysqli_query($conn,$sql);
     $num=mysqli_num_rows($result);
     if($num>0){
      while($row=mysqli_fetch_array($result)){
        $id=$row['category_id'];
        // echo $id;
        $categoryName=$row['category_name'];
        $categoryDiscription=$row['category_discription'];
        
        // <img src="./img/'.$categoryName.'.jpeg" class="card-img-top "  alt="...">
        
        echo ' <div class="card m-5 float-left" style="width: 18rem;">
        <div class=" text-center" style="width:200px;">
       
        <img src="./img/'.$categoryName.'.jpeg" class="card-img-top ml-5 mt-3"  alt="...">
    </div>
       
        <div class="card-body">
            <h5 class="card-title"> <a href="threadList.php?catid='.$id.'">'.$categoryName.'</a></h5>
            <p class="card-text">'.substr($categoryDiscription,0,150).'...</p>
            <a href="threadList.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
        </div>
    </div>';
      }
     }
     else{
      echo "<h1 text-center> No Data Found</h1>";
     }
?>



</div>

<?php
require './component/_footer.php';
?>