<?php

 include 'database.php';

 $_SESSION['admin'] = 'false';

 $message = "your child has arrived in school !";
 $messageFrom = 'admin';

 $theDate = date("Y-m-d h:i:s", time());
 //$stringDate = $theDate->format('H:i:s');

 $currentTime = date("h:i:s",time());
 $currentDate = date("Y-m-d");

 $error = array();
 $studentPass = array();

 if(isset($_POST['submit'])){



  if(empty($_POST['id'])){

    $error['student_id'] ="Please Enter Your Student ID";
  }else{

    $studentId = $_POST['id'];
    $query = "select GuardianContact from student where StudentID = '$studentId'";

    $result = mysqli_query($connection, $query);

    if($result){

      if( mysqli_num_rows($result)>0 )
      {

        $row = mysqli_fetch_array($result);

        $query2 = "insert into message(MessageTo, MessageFrom, MessageText, SendTime) values('$row[0]', '$messageFrom', '$message','$theDate')";

        $result2 = mysqli_query($connection, $query2);

        if($result2){

      //   header('Location: index.php');
           $query3 = "insert into attendance(StudentID, LoginTime, Date) values('$studentId','$currentTime ','$currentDate')";
          $result3 = mysqli_query($connection, $query3);
            if($result3){
              $studentPass['ok'] = "You Are A Valid Student! You Can Go Now. Message Has Been Sent To Parent";
            }

        }else{
          echo "Error";
        }

      }
      else{
        $error['student_id'] ="Invalid Student ID! You Are Not Allowed";
      }

    }

  }

 /*$dblink = mysqli_connect("localhost", "root", "");

 if(mysqli_connect_error()){
   echo "Error";
   exit();
 }

 $sql = "select number from user_info";
 if($result = mysqli_query($dblink, $sql)){

   while ($row = mysqli_fetch_assoc($result)) {
     // code...
     $number = $row['mobile']
     $to = "$number, $to";
   }
 }*/

/*
 $number = $_POST['mobile'];
 $text = $_POST['message'];

 $to = $number;
 $token = "e434b753c0d0f04081e2c1c9bd1af627";
 $message = $text;

 $url = "http://api.greenweb.com.bd/api.php?json";


 $data= array(
 'to'=>"$to",
 'message'=>"$message",
 'token'=>"$token"
 ); // Add parameters in key value
 $ch = curl_init(); // Initialize cURL
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_ENCODING, '');
 curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $smsresult = curl_exec($ch);

 //Result
 echo $smsresult;

 //Error Display
 echo curl_error($ch);

 */





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
    <div class="container">

     <form method="post">
      <h2 class="text-center">Student Attendance </h2>
      <div class="form-group">
        <fieldset>
          <label for="email">Student ID: </label>
          <input type="number" class="form-control" placeholder="Enter Your Student ID" name="id">
          <?php
            if(isset($error['student_id'])){
            echo "<span class='error'>".$error['student_id']."</span>";
            }

            if(isset($studentPass['ok'])){
            echo "<span class='ok'>".$studentPass['ok']."</span>";
            }
         ?>
       </fieldset>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  </section>
</body>
</html>
