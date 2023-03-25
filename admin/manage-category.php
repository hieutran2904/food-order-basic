<?php include('./partials/menu.php'); ?>

<!-- Main content section starts -->
<div class="main-content">
  <div class="wrapper">
    <h1 class="heading">Manage Category</h1>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if (isset($SESSION['remove'])) {
      echo $SESSION['remove'];
      unset($SESSION['remove']);
    }
    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if(isset($_SESSION['no-category-found'])){
      echo $_SESSION['no-category-found'];
      unset($_SESSION['no-category-found']);
    }
    if(isset($_SESSION['update'])){
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    if(isset($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    if(isset($SESSION['failed-remove'])){
      echo $SESSION['failed-remove'];
      unset($SESSION['failed-remove']);
    }
    ?>
    <?php
    // Tổng số bản ghi trong cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_category";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    // Số bản ghi hiển thị trên mỗi trang
    $recordsPerPage = 3;

    // Tính tổng số trang
    $totalPages = ceil($count / $recordsPerPage);

    // Xác định trang hiện tại
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $totalPages) {
      $currentPage = $_GET['page'];
    } else {
      $currentPage = 1;
    }

    // Tính vị trí của bản ghi đầu tiên trên trang hiện tại
    $start = ($currentPage - 1) * $recordsPerPage;

    // Hiển thị các nút phân trang
    echo '<ul class="pagination">';
    if ($totalPages > 1) {
      if ($currentPage > 1) {
        echo '<li><a href="?page=' . ($currentPage - 1) . '">Prev</a></li>';
      }
      for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
          echo '<li class="active"><span>' . $i . '</span></li>';
        } else {
          echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
      }
      if ($currentPage < $totalPages) {
        echo '<li><a href="?page=' . ($currentPage + 1) . '">Next</a></li>';
      }
    }
    echo '</ul>';
    ?>
    <a href="./add-category.php" class="btn-primary">Add Category</a><br><br>
    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
      <?php
      $sql = "SELECT * FROM tbl_category ORDER BY id DESC LIMIT $start, $recordsPerPage";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      $sn = 1;
      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];
      ?>
          <tr>
            <td><?php echo $sn++; ?>. </td>
            <td><?php echo $title; ?></td>
            <td>
              <?php
              if ($image_name != "") {
              ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
              <?php
              } else {
                echo "<div class='error'>Image not added.</div>";
              }
              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
              <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
            </td>
          </tr>
        <?php
        }
      } else {
        ?>
        <tr>
          <td colspan="6" class="error">Category not added yet.</td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</div>
<!-- Main content section end -->

<?php include('./partials/footer.php'); ?>