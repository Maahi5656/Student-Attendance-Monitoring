<nav>
   <ul>

     <?php
     if($_SESSION['admin'] == 'false')
     {
       echo "<li><a href=\"index.php\">Home</a></li>";
       echo "<li><a href=\"login.php\">Login</a></li>";
     }else{
       echo "<li><a href=\"logout.php\">Logout</a></li>";
     }
    ?>
   </ul>
</nav>
