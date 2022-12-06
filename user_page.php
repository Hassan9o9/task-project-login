<?php
error_reporting(0);

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="hero">
   <nav>
      <img src="images/logo.png" class="logo">
      <ul>
         <li><a href="#">Home</a></li>
         <li><a href="#">Features</a></li>
         <li><a href="#">About</a></li>
         <li><a href="#">Contact</a></li>
      </ul>
      <img src="images/user.png" class="user-pic" onclick="toggleMenu()">

      <div class="sub-menu-wrap" id="subMenu">
         <div class="sub-menu">
            <div class="user-info">
               <img src="images/user.png">
               <h2>Hassan Ali</h2>
            </div>
            <hr>

            <a href="#" class="sub-menu-link">
               <img src="images/profile.png" >
               <p>Edit profile</p>
               <span></span>
            </a>
            <a href="#" class="sub-menu-link">
               <img src="images/setting.png" >
               <p>Settings & Privacy</p>
               <span></span>
            </a>
            <a href="#" class="sub-menu-link">
               <img src="images/help.png" >
               <p>Help & Support</p>
               <span></span>
            </a>
            <a href="#" class="sub-menu-link">
               <img src="images/logout.png" >
               <p>Logout</p>
               <span></span>
            </a>
         </div>
      </div>
   </nav>
</div>
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

<script>
      let subMenu = document.getElementById("subMenu");

      function toggleMenu(){
         subMenu.classList.toggle("open-menu");
      }
</script>

</body>
</html>