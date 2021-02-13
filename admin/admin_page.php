<?php

session_start();
include 'database.php';

if(!$_SESSION['admin']){
  header('location: index.php');
}


?>

<!DOCTYPE html>
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
     <?php include('includes/nav.php'); ?>

   </header>
   <section>
     <div class="admin_homepage">
       <h2>Welcome Admin</h2>
       <?php
          include('includes/task.php');
       ?>

     </div>

   </section>
</body>
</html>
