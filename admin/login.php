<?php

$inputError = "";

$username = "";
$password = "";

$_SESSION['admin'] = 'false';

if(isset($_POST['admin_login'])){

  include('database.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password) ){
    $inputError = "Please Enter The Missing Field";
  }else{

    $query = "select * from admin where AdminUsername ='$username' and Password ='$password' ";

    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){

      session_start();

      //create session variable
      $_SESSION['admin'] = 'true';
      $_SESSION['username'] = $username;

      header('location:admin_page.php');
    }else{
      $inputError = "* Wrong Username Or Password! Please Try Again";
    }
  }

}


?>


<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
  <!--
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Attendance Management</title>
  <link rel="stylesheet" href="../assets/css/style.css">
-->
</head>
<body>
   <header>

     <?php
     include('includes/nav.php');
     ?>
   </header>
   <section>
      <form method="post" class="AdminLoginForm">
         <h2>Admin Login Form</h2>
         <fieldset>
           <span class="error" style="color: red; font-size: 12px;"><?php echo $inputError;  ?></span>
         </fieldset>
         <fieldset>
             <input type="text" name="username" placeholder="username">
         </fieldset>
         <fieldset>
             <input type="password" name="password" placeholder="password">
         </fieldset>
         <fieldset>
             <button type="submit" class="btn btn-primary" name="admin_login">Login</button>
         </fieldset>
      </form>
   </section>
</body>
</html>
