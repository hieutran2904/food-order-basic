<?php include('./partials/menu.php'); ?>
<div class="main-content">
  <div class="wrapper">
    <h1 class="heading">Add Admin</h1>
    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full Name: </td>
          <td><input type="text" name="full_name" placeholder="Enter your name"></td>
        </tr>
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username" placeholder="Your username"></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input type="password" name="password" placeholder="Your password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-primary">
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include('./partials/footer.php'); ?>

<?php
//check submit button is clicked or not
  if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with md5

    //sql query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'";

    $res = mysqli_query($conn, $sql);
    if($res == true){
      $_SESSION['add'] = "<div class='success'>Admin added successfully.</div>";
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
      $_SESSION['add'] = "<div class='error'>Failed to add admin.</div>";
      header("location:".SITEURL.'admin/add-admin.php');
    }

  }   
?>
