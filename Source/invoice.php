<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="app.js"></script>
</head>

<body>
    <!-- HEADER -->
    <?php
        include "header.php";
        include "topbar.php";
    ?>
    
    <div class="container">
        <br>
        <?php
            include "connect.php"; 
            if (isset($_SESSION['user_id']))
            {
                $user_id = $_SESSION['user_id']; 
                $sql1 = "SELECT * FROM hoadon
                        JOIN useraccount ON hoadon.user_id = useraccount.user_id
                        WHERE useraccount.user_id = $user_id";
                $result = $connect->query($sql1);
                $temp = $result->fetch_row();
                if ($temp)
                {
                    echo "<h3>Hóa đơn muốn in</h3>";
                    echo "<select class='form-select ds_hoadon'>";
                    echo "<option value='$temp[0]'>$temp[0]</option>";
                    while ($row = $result->fetch_row())
                    {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    echo "</select>";
                    echo "<button class='btn btn-primary in_hd'>In hóa đơn</button>";
                }
                else
                {
        ?>
                    <div class="container block-info mt-3">
                        <div class="nothing-in-cart">
                        <img src="https://cdn2.cellphones.com.vn/x,webp/media/cart/Cart-empty-v2.png" alt="Hóa đơn rỗng">
                        <span class="my-3">
                            Hóa đơn của bạn đang trống. 
                            <br>
                            Hãy chọn thêm sản phẩm để mua sắm nhé
                        </span>
                        </div>
                    </div>
        <?php
                }
            }
        ?>
        <div class="hd"></div>
        <hr>
        <?php
            include "connect.php"; 
            if (isset($_SESSION['user_id']))
            {
                $user_id = $_SESSION['user_id']; 
                $sql1 = "SELECT * FROM hoadon
                        JOIN useraccount ON hoadon.user_id = useraccount.user_id
                        WHERE useraccount.user_id = $user_id";
                $result = $connect->query($sql1);
                while ($row1 = $result->fetch_row())
                {
                    $sohd1 = $row1[0];
                    echo "<div class='row'>";
                    echo "<div class='col-md-2'></div>";
                    echo "<div class='col-md-8 hoadon$row1[0]'>";
                    echo "Số hóa đơn: $sohd1<br>";
                    echo "Khách hàng: $row1[5]<br><br>";
                    echo "<table style='width:100%'><tr>";
                    echo "<th>Sản phẩm</th>";
                    echo "<th>Số lượng</th>";
                    echo "<th>Đơn giá</th>";
                    echo "<th>Thành tiền</th>";
                    echo "</tr>";
                    $sql2 = "SELECT * FROM cthd
                            JOIN hoadon on cthd.SOHD = hoadon.SOHD
                            JOIN sp on sp.MASP = cthd.MASP
                            WHERE hoadon.SOHD = $sohd1";
                    $result2 = $connect->query($sql2);
                    while ($row2 = $result2->fetch_row())
                    {
                        echo "<tr><td>$row2[10]</td>";
                        echo "<td>$row2[2]</td>";
                        echo "<td>" . number_format($row2[11], 0, '.', '.') . "</td>";
                        $thanhtien = $row2[2] * $row2[11];
                        echo "<td>" . number_format($thanhtien, 0, '.', '.') . "</td></tr>";
                    }
                    echo "<tr>";
                    echo "<td colspan='3'><b>Tổng cộng: </b></td>";
                    echo "<td>" . number_format($row1[3], 0, '.', '.') . "</td>";
                    echo "</tr></table>";
                    echo "<br><hr></div>";
                    echo "<div class='col-md-2'></div></div>";
                }
            }
            else
            {
        ?>
                <div class="container block-info mt-3">
                <div class="nothing-in-cart">
                <img src="https://cdn2.cellphones.com.vn/x,webp/media/cart/Cart-empty-v2.png" alt="Giỏ hàng rỗng">
                <span class="my-3">
                    Hóa đơn của bạn đang trống. 
                    <br>
                    Hãy chọn thêm sản phẩm để mua sắm nhé
                </span>
                </div>
                </div>
        <?php
            }
        ?>
    </div>

    <!-- FOOTER -->
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

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>