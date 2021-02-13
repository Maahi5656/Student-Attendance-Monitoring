<?php
session_start();

if(!$_SESSION['admin']){
  header('location: index.php');
}

include 'database.php';

 $studentName = $guardianName = $guardianContactNumber = $studentContactNumber = $studentGradeLevel = "";

 $errors = array();

 if(isset($_POST['submit'])){

   if( empty($_POST['student_name']) ){
     $errors['studentName'] = "Please Enter The Name Of The Student";
   }
   elseif( !preg_match("/^[a-zA-Z]*$/", $_POST['student_name']) ){
     $errors['studentName'] = "Error! No Numbers Allowed";
   }else{
     $studentName = $_POST['student_name'];
   }

   if( empty($_POST['guardian_name']) ){
     $errors['guardianName'] = "Please Enter The Name Of Your Father or Mother";
   }elseif( !preg_match("/^[a-zA-Z]*$/", $_POST['guardian_name']) ){
      $errors['guardianName'] = "Error! No Numbers Allowed";
   }else {
     $guardianName = $_POST['guardian_name'];
   }

   if( empty($_POST['guardian_contact']) ){
     $errors['guardianContactNumber'] = "Please Enter Your Guardian Contact Number";
   }elseif ( !is_numeric($_POST['guardian_contact']) ) {
     $errors['guardianContactNumber'] = "Error! No Letters Allowed";
   }else{
     $guardianContactNumber = $_POST['guardian_contact'];
   }

   if( empty($_POST['student_contact']) ){
     $errors['studentContactNumber'] = "Please Enter Your Personal Contact Number";
   }elseif ( !is_numeric($_POST['student_contact']) ) {
     $errors['studentContactNumber'] = "Error! No Letters Allowed";
   }else{
     $studentContactNumber = $_POST['student_contact'];
   }

   if($_POST['grade_level'] == "NULL"){
     $errors['studentGradeLevel'] = "Please Enter Your Grade Level";
   }else{
     $studentGradeLevel = $_POST['grade_level'];
   }

   if( !$errors ){
          $query = "insert into student(StudentName, Guardian, GuardianContact, StudentContact, GradeLevel) values ('$studentName','$guardianName','$guardianContactNumber','$studentContactNumber','$studentGradeLevel')";

          $result = mysqli_query($connection, $query);

          if($result){
            echo "Successfully Inserted New Student";
          }else{
            echo mysqli_error($connection);
          }
          header('Location: student_form.php');
   }



 }

mysqli_close($connection);
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

       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="AdminLoginForm">
          <h2>Add New Student</h2>
          <fieldset>
            <?php
               if(isset($success['success'])){
                 echo "<span class='ok'>".$success['success']."</span>";
               }

               if(isset($errors['fail'])){
                  echo "<span class='error'>".$errors['fail']."</span>";
               }
            ?>
          </fieldset>
          <fieldset>
             <input type="text" name="student_name" placeholder="Student Name">

               <?php
                if(isset($errors['studentName'])){
                  echo "<span class='error'>".$errors['studentName']."</span>";
                }
                ?>

          </fieldset>
          <fieldset>
               <input type="text" name="guardian_name" placeholder="Guardian Name">

               <?php
                if(isset($errors['guardianName'])){
                  echo "<span class='error'>".$errors['studentName']."</span>";
                }
                ?>

          </fieldset>
          <fieldset>
             <input type="text" name="guardian_contact" placeholder="Guardian Contact Number">
             <?php
              if(isset($errors['guardianContactNumber'])){
                echo "<span class='error'>".$errors['guardianContactNumber']."</span>";
              }
              ?>
          </fieldset>
          <fieldset>
               <input type="text" name="student_contact" placeholder="Student Contact Number">
               <?php
                if(isset($errors['studentContactNumber'])){
                  echo "<span class='error'>".$errors['studentContactNumber']."</span>";
                }
                ?>
          </fieldset>
           <fieldset>
               <select name="grade_level" id="grade_level">
                  <option value="NULL" hidden>--Grade Level--</option>
                  <option value="kg">Kindergarten</option>
                  <option value="cl1">Class - 1</option>
                  <option value="cl2">Class - 2</option>
                  <option value="cl3">Class - 3</option>
              </select>
              <?php
               if(isset($errors['studentGradeLevel'])){
                 echo "<span class='error'>".$errors['studentGradeLevel']."</span>";
               }
               ?>
           </fieldset>



          <input type="submit" name="submit" value="Add">
       </form>
     </div>

   </section>
</body>
</html>
