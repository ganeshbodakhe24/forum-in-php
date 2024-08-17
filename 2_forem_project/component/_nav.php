<?php
require './component/_signup.php';
require './component/_login.php';
require './component/_connect.php';
// echo "hii";
// session_start();

echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu">';

                //  to get limited category in dropdown list

                $sql="SELECT `category_name` ,`category_id` FROM   `categories` LIMIT 4";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
                   echo' <a class="dropdown-item" href="threadList.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
                }
                   echo'
                </div>
            </li>
            <li class="nav-item">
                <a muted class="nav-link" href="#">Contact-9356297133</a>
            </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" action="search.php" method ="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

        </form>';

        // in this nav bar we have condition to show and hide login and sign up buttons according to condition 

        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']== true){
            echo ' <p class="mb-0 mx-2 text-light"> Welcome '.substr($_SESSION['userName'],0,7).'...</p>
            <a class="btn btn-outline-info ml-2" d" href="_logout.php">LogOut</a>';
        }
        else{
            echo ' <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#login">Login</button>
            <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#signUp">SignUp</button>';
        }
        
        
       echo '
    </div>
</nav>';


?>

<!-- sign up success message -->
<?php
if (isset($_GET['signupSuccess']) && $_GET['signupSuccess']==true) {
    echo '<div class="alert alert-success mb-0" role="alert">
  Sign up  Successuly.  logIn now<a href="#" class="alert-link"></a>.
  </div>'; 
}
if (isset($_GET['error']) && $_GET['error']==true) {
    echo '<div class="alert alert-danger mb-0" role="alert">
  Cheack Password and <a href="#" class="alert-link"></a> Try again
  </div>'; 
}
if (isset($_GET['userPresent']) && $_GET['userPresent']==true) {
    echo '<div class="alert alert-danger mb-0" role="alert">
  This Email Present already  <a href="#" class="alert-link"></a> Sign Up with another account
  </div>'; 
}
// <!-- login message  success message -->


if (isset($_GET['loginSuccess']) && $_GET['loginSuccess']==true) {
    echo '<div class="alert alert-success mb-0" role="alert">
  Login Successul<a href="#" class="alert-link"></a>.
  </div>'; 
}
if (isset($_GET['loginErrorPass']) && $_GET['loginErrorPass']==true) {
    echo '<div class="alert alert-danger mb-0" role="alert">
  Cheack Password and <a href="#" class="alert-link"></a> Try again
  </div>'; 
}
if (isset($_GET['loginErrorEmail']) && $_GET['loginErrorEmail']==true) {
    echo '<div class="alert alert-danger mb-0" role="alert">
  This Email not present   <a href="#" class="alert-link"></a> Enter valid email
  </div>'; 
}
?>