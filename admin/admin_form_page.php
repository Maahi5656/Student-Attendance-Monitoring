<?php
    session_start();

    if(!$_SESSION['admin']){
      header('location: index.php');
    }

    include 'database.php';

    $adminName = $adminEmail = $adminUsername = $adminPassword = $adminConfirmPassword = "";
    $errors = array();
    $success = array();

    if(isset($_POST['add_member'])){

      //admin name
      if(empty($_POST['admin_name'])){
        $errors['adminName'] = "Please Enter Your Name";
      }elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['admin_name'])) {
        $errors['adminName'] = "Error! No Numbers Allowed";
      }else {
        $adminName = $_POST['admin_name'];
      }

      //admin Username
      if(empty($_POST['admin_username'])){
        $errors['adminUsername'] = "Please Enter Your Username";
      }elseif ( !preg_match("/^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]+$/", $_POST['admin_username'])) {
        $errors['adminUsername'] = "Username should contain both numbers and letters";
      }else{
        $adminUsername = $_POST['admin_username'];
      }

      //admin email
      if(empty($_POST['admin_email'])){
        $errors['adminEmail'] = "Please Enter The Email";
      }elseif ( !filter_var($_POST['admin_email'],FILTER_VALIDATE_EMAIL) ) {
        $errors['adminEmail'] = "Invalid Email Address";
      }else{
        $adminEmail = $_POST['admin_email'];
      }

      //admin password
      if(empty($_POST['admin_password'])){
        $errors['adminPassword'] = "Please Enter The Password";
      }else{
        $adminPassword = $_POST['admin_password'];
      }

      //admin confirm password
      if(empty($_POST['admin_confirm_password'])){
        $errors['adminConfirmPassword'] = "Please Confirm The Password";
      }elseif ( ($_POST['admin_password'])!=($_POST['admin_confirm_password']) ) {
        $errors['adminConfirmPassword'] = "Passwords Not Matching!";
      }else{
        $adminConfirmPassword = $_POST['admin_confirm_password'];
      }

      if( !$errors ){
             $query = "insert into admin(AdminName, AdminUsername, Email, Password) values ('$adminName','$adminUsername','$adminEmail','$adminPassword')";

             $result = mysqli_query($connection, $query);

             if($result){
            //   header('Location: admin_form_page.php');
               $success['success'] = "New Admin Inserted";
             }else{
              // echo mysqli_error($connection);
               $errors['fail'] = "Error : ".mysqli_error($connection);
             }

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
          <h2>Add New Admin</h2>
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
              <input type="text" name="admin_name" placeholder="Admin Full Name">
              <?php
               if(isset($errors['adminName'])){
                 echo "<span class='error'>".$errors['adminName']."</span>";
               }
               ?>
          </fieldset>
          <fieldset>
              <input type="text" name="admin_username" placeholder="Admin Username">
              <?php
               if(isset($errors['adminUsername'])){
                 echo "<span class='error'>".$errors['adminUsername']."</span>";
               }
               ?>
          </fieldset>
          <fieldset>
              <input type="email" name="admin_email" placeholder="Admin Email">
              <?php
               if(isset($errors['adminEmail'])){
                 echo "<span class='error'>".$errors['adminEmail']."</span>";
               }
               ?>
          </fieldset>
          <fieldset>
              <input type="password" name="admin_password" placeholder="Password">
              <?php
               if(isset($errors['adminPassword'])){
                 echo "<span class='error'>".$errors['adminPassword']."</span>";
               }
               ?>
          </fieldset>
          <fieldset>
              <input type="password" name="admin_confirm_password" placeholder="Confirm Password">
              <?php
               if(isset($errors['adminConfirmPassword'])){
                 echo "<span class='error'>".$errors['adminConfirmPassword']."</span>";
               }
               ?>
          </fieldset>

          <input type="submit" name="add_member" value="ADD">
       </form>
     </div>

   </section>
</body>
</html>
