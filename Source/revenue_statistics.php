<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
</head>

<body>
    <!-- HEADER -->
    <?php
        include "header.php";
        session_start();
        if (!isset($_SESSION['admin']))
        {
            echo "<script>alert('Bạn không có quyền truy cập')</script>";
            echo "<script>window.location = '../index.php';</script>";
        }
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col card_revenue">
                <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Doanh thu tháng</div>
                </div>
                <div class="card_revenue-value">
                    <?php
                        include "connect.php";
                        $currentMonth = date('m');
                        $currentYear = date('Y');
                        $lastMonth = date('m') - 1;
                        $sql1 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE MONTH(NGHD) = $currentMonth AND YEAR(NGHD) = $currentYear";
                        $sql2 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE MONTH(NGHD) = $lastMonth AND YEAR(NGHD) = $currentYear";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();

                        echo number_format($row1[0],0,',','.');
                        echo "</div>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than last month</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than last month</div>";
                            }
                        }
                    ?>
            </div>
            <div class="col card_revenue">
            <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Người dùng mới trong một ngày</div>
                </div>
                <div class="card_revenue-value">
                    <?php
                        $today = date('Y-m-d');
                        $yesterday = date('Y-m-d', strtotime('-1 day'));
                        
                        $sql1 = "SELECT COUNT(*) FROM `useraccount` WHERE DATE(ngay_dk) = '$today'";
                        $sql2 = "SELECT COUNT(*) FROM `useraccount` WHERE DATE(ngay_dk) = '$yesterday'";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();
                        
                        echo number_format($row1[0],0,',','.');
                        echo "<br>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than yesterday</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than yesterday</div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col card_revenue">
                <div class="card_revenue-logo">
                    <div><img src="https://cello.vn/image/catalog/logo.png"
                        title="Cello"
                        alt="Cello"
                        class="img-responsive">
                    </div>
                    <div class="card_revenue-title">Doanh thu theo ngày</div>
                </div>
                
                <div class="card_revenue-value">
                    <?php
                        $today = date('Y-m-d');
                        $yesterday = date('Y-m-d', strtotime('-1 day'));
                        $sql1 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE DATE(NGHD) = '$today'";
                        $sql2 = "SELECT SUM(TRIGIA) FROM `hoadon` WHERE DATE(NGHD) = '$yesterday'";
                        $result1 = $connect->query($sql1);
                        $row1 = $result1->fetch_row();
                        $result2 = $connect->query($sql2);
                        $row2 = $result2->fetch_row();

                        echo number_format($row1[0],0,',','.');
                        echo "<br>";
                        if ($row2[0] != 0)
                        {
                            $temp = $row1[0] / $row2[0];
                            if (1 - $temp >= 0)
                            {
                                $temp = round((1 - $temp) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_minus'>-$temp%</span> than yesterday</div>";
                            }
                            else
                            {
                                $temp = round(($temp - 1) * 100, 2);
                                echo "<div class='card_revenue-text'><span class='card_revenue-percentage_plus'>+$temp%</span> than yesterday</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>