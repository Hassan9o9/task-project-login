<?php
error_reporting(0);
@include 'config.php';

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $filename = $_FILES["submitfile"]["name"];
    $tempname = $_FILES["submitfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "user_db");

    $sql = "INSERT INTO image (filename) VALUES ('$filename')";
    mysqli_query($db, $sql);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }

    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }

}
;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
if (isset($error)) {
    foreach ($error as $error) {
        echo '<span class="error-msg">' . $error . '</span>';
    }
    ;
}
;
?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
      <input type="password" name="cpassword" required placeholder="confirm your password"  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
      <input type="file" id="image-preview" name="image" required oninvalid="this.setCustomValidity('Select an image')" oninput="this.setCustomValidity('')">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>