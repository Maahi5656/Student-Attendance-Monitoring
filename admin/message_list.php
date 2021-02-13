<?php
session_start();

if(!$_SESSION['admin']){
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>

</head>
<body>
   <header>
     <?php
        include('includes/nav.php');
      ?>

   </header>
   <section>
     <div class="admin_homepage">

       <h2>Welcome Admin</h2>
       <?php
          include('includes/task.php');
       ?>
       <div class="container">


       <table class="table table-striped table-hover table-bordered">
         <thead class="thead-dark">
            <tr>
              <th>Message To</th>
              <th>Message From</th>
              <th>Message Text</th>
              <th>Send Time</th>
              <th>User Info</th>
            </tr>
         </thead>
         <tbody>
           <?php
             include 'database.php';

             $query = "select * from message";

             $result = mysqli_query($connection, $query);
             if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result) ){
        echo  "<tr>";
        echo     "<td>".$row["MessageTo"]."</td>";
        echo     "<td>".$row["MessageFrom"]."</td>";
        echo     "<td>".$row["MessageText"]."</td>";
        echo     "<td>".$row["SendTime"]."</td>";
        echo     "<td>".$row["UserInfo"]."</td>";
        echo   "</tr>";
             }
           }
           ?>
       </div>
         </tbody>
       </table>

     </div>

   </section>
</body>
</html>
