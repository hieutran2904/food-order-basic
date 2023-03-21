<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <title>Login-Food Order System</title>
</head>

<body>
  <div class="login">
    <h1 class="text-center">Login</h1>
    <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }
      if (isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
      }
    ?>
    <!-- Login form start here -->
    <form action="" method="POST" class="text-center">
      <table class="tbl-login">
        <tr>
          <td>Username:</td>
          <td><input type="text" name="username" placeholder="Enter Username"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" placeholder="Enter Password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Login" class="btn-primary btn-full">
          </td>
        </tr>
      </table>
    </form>
    <!-- Login form end here -->

    <p class="text-center">Created by - <a href="#">Tran Trung Hieu</a></p>
  </div>
</body>

</html>

<?php
  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    if($res == true){
      $count = mysqli_num_rows($res);
      if ($count == 1) {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;
        header('location:' . SITEURL . 'admin/');
      } else {
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        header('location:' . SITEURL . 'admin/login.php');
      }
    }
  }
?>