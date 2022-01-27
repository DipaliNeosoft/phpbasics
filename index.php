<?php
error_reporting(0);
session_start();
if(!empty($_SESSION['sid'])){
  header('location:welfeedback.php');
}
$user=$_POST['user'];
$pass=$_POST['password'];
$username="test_user";
$password=123456;
$errMessage=$userError=$passError='';
if(isset($_POST['login'])){
  if(empty($user))  {
    $userError="This field is required";
  }
     if(empty($pass)){
        $passError="This field is required";
      }
    
     if(trim($pass)==$password && $user==$username){
          $_SESSION['sid']=$user;
          header("location:welfeedback.php");
        }
        else{
          $errMessage="Enter valid username and password";
        }
      }
     

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Login page</title>
    <style>
      .error{
        color: red;
      }
    </style>
  </head>
  <body>
<header class="jumbotron bg-warning container">
<h1 class="text-center text-white">Login panel</h1>
</header>
<div class="container">
    <?php

  if(!empty($errMessage) ){
    ?>
    <div class="alert alert-danger"><?php echo $errMessage; ?></div>

 <?php   

}
?>

   
<form method="post">
  <div class="form-group">
    <label for="user" class="font-weight-bold">User name</label>
    <input type="text" class="form-control" name="user" id="user" placeholder="Enter user name"><span class="error"><?php echo $userError; ?></span>
  </div>


  <div class="form-group ">
    <label for="password"  class="font-weight-bold">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password"><span class="error"><?php echo $passError; ?></span>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember">
      <label class="form-check-label" for="remember">
        Remember me
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
 
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>