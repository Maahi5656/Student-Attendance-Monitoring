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
              <th>Student ID</th>
              <th>Student Login Time</th>
              <th>Date</th>
            </tr>
         </thead>
         <tbody>
           <?php
             include 'database.php';

             $query = "select * from attendance";

             $result = mysqli_query($connection, $query);
             if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result) ){
        echo  "<tr>";
        echo     "<td>".$row["StudentID"]."</td>";
        echo     "<td>".$row["LoginTime"]."</td>";
        echo     "<td>".$row["Date"]."</td>";
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
