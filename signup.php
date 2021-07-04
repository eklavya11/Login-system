
<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'dbconnect.php';
$user = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
//$exits = false;
$existSql = "SELECT * FROM `users` WHERE username = '$user'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showerror = "Username Already Exists";
    }
    else{

if($cpassword==$password){
  
  $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$user', '$password', current_timestamp())"; 
  $result = mysqli_query($con,$sql);
  if($result){
    $showalert = "Passwords do not match";
  }
}
else{
  $showerror = true;
}

}
}



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>signup</title>
  </head>
  <body>
    <?php include 'nav.php';?>
    <?php
    if($showalert){echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Yipeeee!</strong> Your account is created.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
if($showerror){echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong>'. $showerror.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
      <div class="container my-4" style="align-items:center">
     <h1 class="text-center">Signup to our website</h1>
     <form action="/Login_system/signup.php" method="post" >
        <div class="form-group col-md-6" style="align-items:center">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group col-md-6 ">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group col-md-6">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary col-md-6">SignUp</button>
     </form>
    </div>
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
