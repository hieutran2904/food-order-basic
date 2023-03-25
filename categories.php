<?php include('./partials-front/menu.php') ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
  <div class="container">
    <h2 class="text-center">Explore Foods</h2>
    <?php
    // Tổng số bản ghi trong cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
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

    // Code để thực hiện câu lệnh SQL và hiển thị dữ liệu

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
    <?php
    $sql = "SELECT * FROM tbl_category WHERE active='Yes' LIMIT $start, $recordsPerPage";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
    ?>
        <a href="category-foods.php?category_id=<?= $id ?>">
          <div class="box-3 float-container">
            <?php
            if ($image_name == "") {
              echo "<div class='error'>Image not available.</div>";
            } else {
            ?>
              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve img-fixed" />
            <?php
            }
            ?>
            <h3 class="float-text text-white"><?php echo $title; ?></h3>
          </div>
        </a>
    <?php
      }
    } else {
      echo "<div class='error'>Category not added.</div>";
    }
    ?>


    <div class="clearfix"></div>
  </div>
</section>
<!-- Categories Section Ends Here -->

<?php include('./partials-front/footer.php') ?>