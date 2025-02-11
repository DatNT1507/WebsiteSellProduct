<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <script src="jquery.js"></script>
  <meta content="width=device-width, initial-scale=1.0"
    name="viewport">
  <title>IS207-PersonalBlog</title>
  <?php include "header.php"; ?>
</head>

<body>

<?php include "topbar.php"; ?>

  <main>

    <br>

    <!-- Filter các loại điện thoại -->
    <div class="container">
      <h2>Sắp xếp theo</h2>
      <div class="filter-button-group button-group">
        <a class="btn btn-outline-secondary" href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'desc'])); ?>">Giá cao xuống thấp</a>
        <a class="btn btn-outline-secondary" href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'asc'])); ?>">Giá thấp lên cao</a>
      </div>

      <!-- Card -->
      <div class="filterable_card"
        id="phone_list">
        <?php
          include "connect.php";
          $sp = $_GET['brand_id'];
          $loaiSp =$_GET['category_id'];
          if (isset($_GET['sort'])) {
            if ($_GET['sort'] === 'desc') {
              $sortOrder = 'DESC';
            } else {
              $sortOrder = 'ASC';
            }
            $sql = "SELECT * FROM `sp` WHERE brand_id='$sp' AND category_id='$loaiSp' ORDER BY GIA $sortOrder";
          } else{
            $sql = "SELECT * FROM `sp` WHERE brand_id='$sp' AND category_id='$loaiSp'";
          }
          $results = $connect->query($sql);
          while($rows = $results->fetch_assoc()){
            echo '<a href="product_detail.php?masp=' . $rows['MASP'] . '">';
            echo '<div class="card ' . $rows['category_id'] . '" type="' . $rows['MASP'] . '">';
            echo '<img src="' . $rows['HINHANH'] . '" alt="">';
            echo '<div class="card_body">';
            echo '<h6 class="card_title">' . $rows['TENSP'] . '</h6>';
            echo '<h5 class="card_value">' . number_format($rows['GIA'], 0, ',', '.') . '</h5>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
          }
          $connect->close();
        ?>
      </div>
  </main>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="#"
          onclick="window.open('https://github.com/IS207-P12-PersonalPlog/IS207-PersonalBlog')"
          class="me-4 text-reset">
          <i class="fa fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>CELLO
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!"
                class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">React</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!"
                class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!"
                class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i>Thành phố Hồ Chí Minh, Việt Nam</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  </footer>
  <!-- Footer -->

  <!-- Scroll to the top of page -->
  <button class="scrollup scr_btn"><i class="fa fa-angle-up"
            style="font-size: 20px;"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  <script src="app.js"></script>

</body>

</html>