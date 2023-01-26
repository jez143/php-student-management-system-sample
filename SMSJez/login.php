<?php 
if(!isset($_SESSION)){
    session_start();
}

include_once("connection/connection.php");
$con = connection();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

   $sql = "SELECT * FROM studentlist WHERE username = '$username' AND password = '$password'";
   $user = $con->query($sql) or die ($con->error);
   $row = $user->fetch_assoc();
   $total = $user->num_rows;

   if($total > 0){
    $_SESSION['UserLogin'] = $row ['username'];
    $_SESSION['Access'] = $row['access'];
    $_SESSION['idNumber'] = $row['id_number'];
    echo header("Location: index.php");
   
   }else{
    echo "No user found.";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student Information</title>
</head>
<body>


<div class="center">
<h1>Login</h1>
    <img src="img/profile.jpg" alt="">
  

   <form action="" method="POST">

   <div class="login-field">
   <input type="text" name="username" id="username" placeholder="Username" >
   <i class="fa fa-user fa-lg logo" aria-hidden="true"></i> 
   </div>

  
   
   <div class="login-field1">
   <input type="password" name="password" id="password" placeholder="Password">
   <i class="fa fa-key fa-lg logo " aria-hidden="true"></i>
   </div>

    <button type="submit" class="login-page" name="login">Login</button>
   </form>

   </div>


</body>
</html>