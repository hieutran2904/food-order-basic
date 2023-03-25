<?php include('./partials-front/menu.php') ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
  <div class="container">

    <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
      <input type="search" name="search" placeholder="Search for Food.." required>
      <input type="submit" name="submit" value="Search" class="btn btn-primary">
    </form>

  </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
  <div class="container">
    <h2 class="text-center">Food Menu</h2>
    <?php
    // Tổng số bản ghi trong cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    // Số bản ghi hiển thị trên mỗi trang
    $recordsPerPage = 6;

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
    $sql = "SELECT * FROM tbl_food WHERE active='Yes' LIMIT $start, $recordsPerPage";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];
    ?>
        <div class="food-menu-box">
          <div class="food-menu-img">
            <?php
            if ($image_name == "") {
              echo "<div class='error'>Image not available.</div>";
            } else {
            ?>
              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve img-fixed-food">
            <?php
            }
            ?>
          </div>

          <div class="food-menu-desc">
            <h4><?php echo $title; ?></h4>
            <p class="food-price"><?php echo "$" . $price ?></p>
            <p class="food-detail">
              <?php echo $description; ?>
            </p>
            <br>

            <a href="<?php echo SITEURL; ?>order.php?food_id=<?= $id ?>" class="btn btn-primary">Order Now</a>
          </div>
        </div>
    <?php
      }
    } else {
      echo "<div class='error'>Food not available.</div>";
    }
    ?>
    <div class="clearfix"></div>
  </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('./partials-front/footer.php') ?>