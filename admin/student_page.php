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
              <th>Student Name</th>
              <th>Parent/Guardian</th>
              <th>Parent Contact Number</th>
              <th>Contact</th>
              <th>Grade Level</th>
            </tr>
         </thead>
         <tbody>
           <?php
             include 'database.php';

             $query = "select * from student";

             $result = mysqli_query($connection, $query);
             if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result) ){
        echo  "<tr>";
        echo     "<td>".$row["StudentID"]."</td>";
        echo     "<td>".$row["StudentName"]."</td>";
        echo     "<td>".$row["Guardian"]."</td>";
        echo     "<td>".$row["GuardianContact"]."</td>";
        echo     "<td>".$row["StudentContact"]."</td>";
        echo     "<td>".$row["GradeLevel"]."</td>";
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
