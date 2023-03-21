<?php include('./partials/menu.php'); ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1 class="heading">Manage Food</h1>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if(isset($_SESSION['remove'])){
      echo $_SESSION['remove'];
      unset($_SESSION['remove']);
    }
    if(isset($_SESSION['unauthorize'])){
      echo $_SESSION['unauthorize'];
      unset($_SESSION['unauthorize']);
    }
    if(isset($_SESSION['no-food-found'])){
      echo $_SESSION['no-food-found'];
      unset($_SESSION['no-food-found']);
    }
    if(isset($_SESSION['update'])){
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    if(isset($_SESSION['failed-remove'])){
      echo $_SESSION['failed-remove'];
      unset($_SESSION['failed-remove']);
    }
    if(isset($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    ?>
    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a><br><br>
    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
        <th>Category</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
      <?php
      $sql = "SELECT * FROM tbl_food";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      $sn = 1;
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $description = $row['description'];
          $image_name = $row['image_name'];
          $category_id = $row['category_id'];
          $featured = $row['featured'];
          $active = $row['active'];
      ?>
          <tr>
            <td><?php echo $sn++; ?>. </td>
            <td><?php echo $title; ?></td>
            <td><?php echo $price ?></td>
            <td><?php echo $description ?></td>
            <td>
              <?php
              if ($image_name != "") {
              ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
              <?php
              } else {
                echo "<div class='error'>Image not added.</div>";
              }
              ?>
            </td>
            <td>
              <?php
              $sql2 = "SELECT title FROM tbl_category WHERE id=$category_id";
              $res2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($res2);
              $category_title = $row2['title'];
              echo $category_title;
              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td style="padding-right: 20px;">
              <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
              <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
            </td>
          </tr>
        <?php
        }
      } else {
        ?>
        <tr>
          <td colspan="8" class="error">Food not added yet.</td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</div>
<!-- Main content section end -->

<?php include('./partials/footer.php'); ?>